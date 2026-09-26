<?php

namespace App\Console\Commands;

use App\Models\Appointment;
use App\Models\SmsNotification;
use App\Services\TextBeeService;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SendAppointmentReminders extends Command
{
    protected $signature = 'app:send-appointment-reminders';
    protected $description = "Send SMS reminders for tomorrow's appointments";

    public function handle(TextBeeService $textBee): int
    {
        $appointments = Appointment::with('mother')
            ->whereDate('appointment_date', Carbon::tomorrow())
            ->where('status', 'Scheduled')
            ->get();

        Log::info("REMINDER RUN: Today is " . Carbon::now()->toDateTimeString()
            . " | Tomorrow is " . Carbon::tomorrow()->toDateString()
            . " | Found {$appointments->count()} appointment(s).");

        $this->info("Found {$appointments->count()} appointment(s) to process.");

        foreach ($appointments as $appointment) {

            $mother = $appointment->mother;

            if (!$mother) {
                Log::warning("Appointment #{$appointment->id} has no mother.");
                continue;
            }

            if (empty($mother->contact_number)) {
                Log::warning("Mother {$mother->first_name} has no contact number.");
                continue;
            }

            $smsNotification = SmsNotification::where('appointment_id', $appointment->id)
                ->where('status', 'Pending')
                ->first();

            if (!$smsNotification) {
                Log::warning("No pending SMS found for Appointment #{$appointment->id}");
                continue;
            }

            $appointmentType = $appointment->appointment_type;
            $appointmentDate = Carbon::parse($appointment->appointment_date)->format('F d, Y');
            $appointmentTime = Carbon::parse($appointment->appointment_time)->format('g:i A');

            $message =
                "Good day {$mother->first_name}!\n\n"
                . "This is a reminder that you have a "
                . "{$appointmentType} appointment.\n\n"
                . "Date: {$appointmentDate}\n"
                . "Time: {$appointmentTime}\n\n"
                . "Please arrive on time.\n\n"
                . "-Irosin RHU";

            $result = $textBee->send($mother->contact_number, $message);

            if ($result['success']) {
                $smsNotification->update([
                    'status' => 'Sent',
                    'sent_at' => now(),
                    'error_message' => null,
                    'message' => $message,
                ]);

                Log::info("SMS sent successfully for {$mother->first_name} (Appointment #{$appointment->id})");
                continue;
            }

            $error = $result['error'] ?? 'Unknown SMS gateway error.';
            if (is_array($error)) {
                $error = $error['message'] ?? json_encode($error);
            }
            $error = (string) $error;

            $smsNotification->update([
                'status' => 'Failed',
                'error_message' => $error,
                'sent_at' => null,
                'message' => $message,
            ]);

            Log::error("Failed to send SMS to {$mother->first_name} (Appointment #{$appointment->id}): {$error}");
        }

        Log::info('Appointment reminder process completed.');
        return self::SUCCESS;
    }
}