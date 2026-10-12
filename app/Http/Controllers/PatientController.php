<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();

        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required',
            'phone' => 'required',
            'email' => 'nullable|email',
            'address' => 'nullable',
            'date_of_birth' => 'nullable|date',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'username' => $validated['username'],
            'password' => $validated['password'],
            'role' => 'patient',
        ]);

        Patient::create([
            'user_id' => $user->id,
            'full_name' => $validated['full_name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'] ?? null,
            'address' => $validated['address'] ?? null,
            'date_of_birth' => $validated['date_of_birth'] ?? null,
        ]);

        return redirect('/patients');
    }
}