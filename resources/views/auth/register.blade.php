@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto mt-20 bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Register</h1>

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-700">Name</label>
                <input type="text" name="name" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <div>
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <div>
                <label class="block text-gray-700">Password</label>
                <input type="password" name="password" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <div>
                <label class="block text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" class="w-full px-4 py-2 border rounded-lg" required>
            </div>

            <button type="submit"
                class="w-full bg-primary-500 hover:bg-primary-600 text-white py-2 rounded-lg font-semibold transition-colors">
                Register
            </button>
        </form>

        <p class="mt-4 text-sm text-gray-600">
            Already have an account? <a href="{{ route('login') }}" class="text-primary-500">Login</a>
        </p>
    </div>
@endsection
