<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        $user = User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => $data['password'],
            'role' => 'candidate',
        ]);

        Auth::login($user);

        // Role-based redirect
        return match ($user->role) {
            'hr' => redirect()->route('hr.jobs'),
            'candidate' => redirect()->route('candidate.jobs'),
            default => redirect('/'),
        };
    }

    public function addUsers()
    {
        return view('admin.add-user');
    }

    public function storeUser(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:6'],
            'role' => ['required', 'in:admin,hr,candidate'],
        ]);

        User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => $data['password'],
            'role' => $data['role'],
        ]);

        return redirect()->back()->with('success', 'User created successfully!');
    }

    public function showResetPasswordForm()
    {
        $users = User::all();
        return view('admin.reset-password', compact('users'));
    }

    public function resetPassword(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::findOrFail($validated['user_id']);
        $user->update([
            'password' => $validated['password'],
        ]);
        return back()->with('success', 'Password has been successfully updated for ' . $user->name . '!');
    }
}
