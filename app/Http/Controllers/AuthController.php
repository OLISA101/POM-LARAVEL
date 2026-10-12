<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',

            
        ]);

        

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->role === 'admin') {
                return redirect('/dashboard');
            }

            return redirect('/patient');
        }

        return back()->withErrors([
            'username' => 'Invalid username or password.',
        ])->onlyInput('username');
    }
    
    public function logout(Request $request)
{
    auth()->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
}
}

