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
            session()->regenerate();
            session()->flash('success', 'Logged in successfully!');

            $role = Auth::user()->role;
            return $role === 'hr'
                ? redirect()->route('hr.jobs')
                : redirect()->route('candidate.jobs');
        }

        return back()->with('error', 'Invalid credentials.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        session()->flash('success', 'You have logged out successfully.');
        return redirect()->route('login');
    }
}
