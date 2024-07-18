<?php

namespace App\Http\Controllers;

use App\Models\User; // Import the correct User model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Controller for registration
    public function register(Request $request)
    {
        // Validation
        $fields = $request->validate([
            'username' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:users'],
            'password' => ['required', 'min:3', 'confirmed'],
        ]);

        // Creating user
        $user = User::create([
            'username' => $fields['username'],
            'email' => $fields['email'],
            'password' => Hash::make($fields['password']), // Hash the password
        ]);

        // Login the user
        Auth::login($user);

        // Redirect
        return redirect()->intended('dashboard');
    }

    // Controller for login
    public function login(Request $request)
    {
        // Validation
        $credentials = $request->validate([
            'email' => ['required', 'max:255' ],
            'password' => ['required'],
        ]);

                // Attempt to log the user in
         if (Auth::attempt($credentials)) {
        // Authentication was successful
             $request->session()->regenerate();
             return redirect()->intended('dashboard');
                }

         // Authentication failed
           return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
           ])->onlyInput('email');

    }
}

