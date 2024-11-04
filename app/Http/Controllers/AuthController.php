<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Show the registration form
    public function showRegisterForm()
    {
        return view('register');
    }

    // Handle registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }

    // Show the login form
    public function showLoginForm()
    {
        return view('login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
// Set the login timestamp
session(['login_time' => now()]);
            // Check usertype and redirect accordingly
            if ($user->usertype === 0) {
                return redirect()->intended('dashboard')->with('success', 'Welcome back!');
            } elseif ($user->usertype === 1) {
                return redirect()->intended('admindashboard')->with('success', 'Welcome to the admin dashboard!');
            }
        }

        return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
    }

    // Handle logout
    public function logout()
    {
        $user = Auth::user();
    if ($user) {
        $loginTime = session('login_time');
        if ($loginTime) {
            $timeSpent = now()->diffInMinutes($loginTime);
            $user->increment('time_spent', $timeSpent); // Update the time spent
        }
    }
        Auth::logout();
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }
}
