<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Device;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
   public function index()
{
    $patients = Patient::all();
    $devices = Device::all();

    $prescriptions = \App\Models\Prescription::with(
        'patient',
        'device',
        'order'
    )->get();

    return view('prescriptions.index', compact(
        'patients',
        'devices',
        'prescriptions'
    ));
}
    public function store(Request $request)
{
    $validated = $request->validate([
        'patient_id' => 'required|exists:patients,id',
        'device_id' => 'required|exists:devices,id',
        'date_prescribed' => 'required|date',
        'notes' => 'nullable',
    ]);

    $device = Device::findOrFail($validated['device_id']);

    if ($device->quantity < 1) {
        return back()->withErrors([
            'device_id' => 'This device is out of stock.',
        ])->withInput();
    }

    $prescription = \App\Models\Prescription::create($validated);

    $device->decrement('quantity');

    \App\Models\Order::create([
        'prescription_id' => $prescription->id,
        'order_status' => 'pending',
        'fitting_status' => 'pending',
        'last_updated' => now(),
    ]);

    return redirect('/prescriptions');
}
}