<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('patient')->get();
        $patients = Patient::all();

        return view('appointments.index', compact(
            'appointments',
            'patients'
        ));
    }
    public function store(Request $request)
{
    $validated = $request->validate([
        'patient_id' => 'required|exists:patients,id',
        'appointment_date' => 'required|date',
        'appointment_time' => 'required',
        'purpose' => 'required',
    ]);

    Appointment::create([
        'patient_id' => $validated['patient_id'],
        'appointment_date' => $validated['appointment_date'],
        'appointment_time' => $validated['appointment_time'],
        'purpose' => $validated['purpose'],
        'status' => 'upcoming',
    ]);

    return redirect('/appointments');
}
public function edit(Appointment $appointment)
{
    return view('appointments.edit', compact('appointment'));
}
public function update(Request $request, Appointment $appointment)
{
    $validated = $request->validate([
        'status' => 'required',
    ]);

    $appointment->update([
        'status' => $validated['status'],
    ]);

    return redirect('/appointments');
}
}