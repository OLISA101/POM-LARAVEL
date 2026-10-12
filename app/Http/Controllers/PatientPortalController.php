<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class PatientPortalController extends Controller
{
    public function index()
{
    $patient = Auth::user()->patient;

    $prescriptions = $patient->prescriptions()
        ->with('device', 'order')
        ->get();

    $appointments = $patient->appointments()->get();

    return view('patient.index', compact(
        'patient',
        'prescriptions',
        'appointments'
    ));
}
}