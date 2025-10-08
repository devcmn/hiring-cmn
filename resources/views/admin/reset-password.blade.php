@extends('layouts.app')
@section('title', 'Reset Passwordd - Hiring - CMN')
@section('page-title', 'Reset Password')
@section('page-subtitle', 'Manage user passwords securely')

@section('content')
    <div
        class="min-h-screen flex items-start justify-center bg-gradient-to-br from-primary-50 to-white py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl w-full grid md:grid-cols-2 gap-8 items-start">

            <!-- Left Side - Info -->
            <div class="hidden md:block">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-primary-500 rounded-2xl mb-6 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 11c0 1.657-1.343 3-3 3S6 12.657 6 11s1.343-3 3-3 3 1.343 3 3zm7.707 8.707a1 1 0 01-1.414 0L16 17.414l-2.293 2.293a1 1 0 01-1.414-1.414L14.586 16l-2.293-2.293a1 1 0 111.414-1.414L16 14.586l2.293-2.293a1 1 0 011.414 1.414L17.414 16l2.293 2.293a1 1 0 010 1.414z" />
                    </svg>
                </div>
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Reset User Password</h1>
                <p class="text-lg text-gray-600 mb-8">Change or reset any user’s password securely through the admin panel.
                </p>

                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div
                            class="flex-shrink-0 w-6 h-6 bg-primary-100 rounded-full flex items-center justify-center mt-0.5">
                            <svg class="w-4 h-4 text-primary-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Secure Update</h3>
                            <p class="text-sm text-gray-600">All passwords are encrypted automatically</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div
                            class="flex-shrink-0 w-6 h-6 bg-primary-100 rounded-full flex items-center justify-center mt-0.5">
                            <svg class="w-4 h-4 text-primary-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Instant Access</h3>
                            <p class="text-sm text-gray-600">User can log in immediately after reset</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Form Card -->
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <!-- Mobile Header -->
                <div class="md:hidden text-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-900">Reset Password</h1>
                    <p class="mt-1 text-gray-600">Change any user’s password easily</p>
                </div>

                <form action="{{ route('admin.reset-password.submit') }}" method="POST" class="space-y-5">
                    @csrf

                    <!-- Select User -->
                    <div>
                        <label for="user_id" class="block text-sm font-medium text-gray-700 mb-2">
                            Select User
                        </label>
                        <select name="user_id" id="user_id"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-700 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors appearance-none bg-white cursor-pointer @error('user_id') border-red-500 @enderror">
                            <option value="">-- Choose a user --</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- New Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            New Password
                        </label>
                        <input type="password" name="password" id="password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('password') border-red-500 @enderror"
                            placeholder="Enter new password" required>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                            Confirm New Password
                        </label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                            placeholder="Confirm new password" required>
                    </div>

                    <!-- Submit -->
                    <button type="submit"
                        class="w-full bg-primary-600 text-white font-semibold py-3 rounded-lg hover:bg-primary-700 focus:ring-4 focus:ring-primary-300 transition-all">
                        Update Password
                    </button>

                    <!-- Divider -->
                    <div class="mt-6">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">Add new user?</span>
                            </div>
                        </div>
                    </div>

                    <!-- Back Button -->
                    <div class="text-center">
                        <a href="{{ route('admin.add-user') }}"
                            class="w-full inline-flex justify-center items-center px-4 py-3 border border-primary-500 rounded-lg text-primary-500 bg-white hover:bg-primary-50 font-semibold transition-colors">
                            Add User
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
