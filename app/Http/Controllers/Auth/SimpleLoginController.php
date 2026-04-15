<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SimpleLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.simple-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        // Check for sample credentials first
        if ($credentials['username'] === 'admin@reputabletours.com' && $credentials['password'] === 'reputable2024') {
            // Create or find admin user
            $user = User::where('email', 'admin@reputabletours.com')->orWhere('username', 'admin@reputabletours.com')->first();
            
            if (!$user) {
                $user = User::create([
                    'name' => 'System Administrator',
                    'username' => 'admin@reputabletours.com',
                    'email' => 'admin@reputabletours.com',
                    'password' => Hash::make('reputable2024'),
                ]);
            }
            
            Auth::login($user);
            $request->session()->regenerate();
            Session::put('logged_in_username', $user->username);
            return redirect()->route('admin.dashboard');
        }

        // Find user by username instead of email
        $user = User::where('username', $credentials['username'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
                'username' => 'Invalid credentials. Please try again.',
            ])->onlyInput('username');
        }

        Auth::login($user);
        $request->session()->regenerate();

        // Store username in session for potential future use
        Session::put('logged_in_username', $user->username);

        // Redirect to dashboard (you can change this route as needed)
        return redirect()->route('admin.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('simple.login');
    }
}
