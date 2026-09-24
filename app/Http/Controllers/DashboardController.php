<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mother;
use App\Models\Infant;
use App\Models\Appointment;

class DashboardController extends Controller
{
    public function index()
    {
        $midwives = User::where('role', 'Midwife')->count();

        $mothers = Mother::count();

        $infants = Infant::count();

        $appointments = Appointment::count();

        return view('dashboard', compact(
            'midwives',
            'mothers',
            'infants',
            'appointments'
        ));
    }
}