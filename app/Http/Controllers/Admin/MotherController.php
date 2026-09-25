<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mother;
use App\Models\User;
use App\Http\Requests\StoreMotherRequest;
use App\Http\Requests\UpdateMotherRequest;
use App\Models\Appointment;
use App\Models\Infant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MotherController extends Controller
{
    /**
     * Display a listing of mothers.
     */
    public function index()
    {
        $status = request('status');

        $query = Mother::latest();
        if ($status && $status !== 'All') {
            $query->where('status', $status);
            }
            
            $mothers = $query->paginate(10);
            $totalMothers = Mother::count();
            $pregnantMothers = Mother::where('status', 'Pregnant')->count();
            $deliveredMothers = Mother::where('status', 'Delivered')->count();
            $referredMothers = Mother::where('status', 'Referred')->count();
            $upcomingAppointments = Appointment::where('appointment_date', '>=', now())->count();
            $totalInfants = Infant::count();
            
            return view('admin.mothers.index', compact(
                'mothers', 'status', 'totalMothers', 'pregnantMothers',
                'deliveredMothers', 'referredMothers', 'upcomingAppointments', 'totalInfants'
                ));
                
    }

    /**
     * Show the form for creating a new mother.
     */
    public function create()
    {
        return view('admin.mothers.create');
    }

    /**
     * Store a newly created mother.
     */
    public function store(StoreMotherRequest $request)
    {
         DB::transaction(function () use ($request) {

        // Create Mother User Account
        $user = User::create([

            
    'username' => $request->username,

    'first_name' => $request->first_name,

    'middle_name' => $request->middle_name,

    'last_name' => $request->last_name,

    'contact_number' => $request->contact_number,

    'name' => trim(
        $request->first_name . ' ' .
        ($request->middle_name ? $request->middle_name . ' ' : '') .
        $request->last_name
    ),

    'email' => null,

    'password' => Hash::make($request->password),

    'role' => 'Mother',

    'is_active' => true,


        ]);

        // Generate Mother Code
        $motherCode = 'MTH-' . str_pad(
            Mother::max('id') + 1,
            6,
            '0',
            STR_PAD_LEFT
        );

        // Create Mother Profile
        Mother::create([

            'user_id' => $user->id,

            'mother_code' => $motherCode,

            'first_name' => $request->first_name,

            'middle_name' => $request->middle_name,

            'last_name' => $request->last_name,

            'birth_date' => $request->birth_date,

            'contact_number' => $request->contact_number,

            'address' => $request->address,

            'barangay' => $request->barangay,

            'blood_type' => $request->blood_type,

            'civil_status' => $request->civil_status,

            'occupation' => $request->occupation,

            'philhealth_number' => $request->philhealth_number,

            'height' => $request->height,

            'weight' => $request->weight,

            'last_menstrual_period' => $request->last_menstrual_period,

            'expected_delivery_date' => $request->expected_delivery_date,

            'pregnancy_number' => $request->pregnancy_number,

            'status' => 'Pregnant',

            

        ]);

    });

    return redirect()
        ->route('mothers.index')
        ->with('success', 'Mother registered successfully!');
    }

    /**
     * Display the specified mother.
     */
    public function show(string $id)
    {
         $mother = Mother::with('prenatalCheckups')->findOrFail($id);

    return view('admin.mothers.show', compact('mother'));
    }

    /**
     * Show the form for editing the specified mother.
     */
    public function edit(string $id)
    {
         $mother = Mother::findOrFail($id);

    return view('admin.mothers.edit', compact('mother'));
    }

    /**
     * Update the specified mother.
     */
    public function update(UpdateMotherRequest $request, string $id)
    {
         $mother = Mother::findOrFail($id);

    // Update the linked user account
    $mother->user->update([

        'first_name' => $request->first_name,

        'middle_name' => $request->middle_name,

        'last_name' => $request->last_name,

        'contact_number' => $request->contact_number,

        'name' => trim(
            $request->first_name . ' ' .
            ($request->middle_name ? $request->middle_name . ' ' : '') .
            $request->last_name
        ),

    ]);

    // Update mother profile
    $mother->update([

        'first_name' => $request->first_name,

        'middle_name' => $request->middle_name,

        'last_name' => $request->last_name,

        'birth_date' => $request->birth_date,

        'contact_number' => $request->contact_number,

        'address' => $request->address,

        'barangay' => $request->barangay,

        'blood_type' => $request->blood_type,

        'civil_status' => $request->civil_status,

        'occupation' => $request->occupation,

        'philhealth_number' => $request->philhealth_number,

        'height' => $request->height,

        'weight' => $request->weight,

        'last_menstrual_period' => $request->last_menstrual_period,

        'expected_delivery_date' => $request->expected_delivery_date,

        'pregnancy_number' => $request->pregnancy_number,
        'status' => $request->status,

    ]);

    return redirect()
        ->route('mothers.index')
        ->with('success', 'Mother updated successfully!');
    }

    /**
     * Remove the specified mother.
     */
    public function destroy(string $id)
    {
        //
    }
}