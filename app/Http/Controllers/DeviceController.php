<?php

namespace App\Http\Controllers;
use App\Models\Device;
use Illuminate\Http\Request;



class DeviceController extends Controller
{
   public function index()
{
    $devices = Device::all();

    return view('devices.index', compact('devices'));
}

public function create()
{
    return view('devices.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'device_name' => 'required',
        'device_type' => 'required',
        'quantity' => 'required|integer|min:0',
    ]);

    Device::create($validated);

    return redirect('/devices');
}
}
