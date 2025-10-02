<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Flash success
            session()->flash('success', 'Logged in successfully!');

            // Role-based redirect
            $role = Auth::user()->role;
            if ($role === 'hr') {
                return redirect()->route('hr.jobs');
            } elseif ($role === 'candidate') {
                return redirect()->route('candidate.jobs');
            } else {
                return redirect('/'); // fallback
            }
        }

        // Invalid credentials
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->with('error', 'Login failed! Check your credentials.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
