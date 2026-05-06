@extends('layouts.admin')

@section('title', 'Security Settings')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Security Settings</h1>
        <p class="text-gray-600">Manage your password and account security</p>
    </div>

    <!-- Password Change Section -->
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6 border border-gray-100">
        <h2 class="text-xl font-semibold text-gray-900 mb-6">Change Password</h2>
        
        <form action="{{ route('admin.settings.security.update') }}" method="POST" class="space-y-6">
            @csrf
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-lg">
                    <p class="text-green-800 font-medium">{{ session('success') }}</p>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                    <ul class="text-red-800 text-sm space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Current Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                <input type="password" name="current_password" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                       placeholder="Enter your current password">
                @error('current_password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- New Password -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                    <input type="password" name="new_password" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="Enter new password">
                    @error('new_password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="Confirm new password">
                    @error('new_password_confirmation')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Password Requirements -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <h3 class="text-sm font-medium text-blue-900 mb-2">Password Requirements:</h3>
                <ul class="text-sm text-blue-800 space-y-1">
                    <li>• At least 8 characters long</li>
                    <li>• Contains uppercase and lowercase letters</li>
                    <li>• Contains at least one number</li>
                    <li>• Contains at least one special character</li>
                </ul>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="px-6 py-3 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors font-medium">
                    Update Password
                </button>
            </div>
        </form>
    </div>

    <!-- Security Tips -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
        <h2 class="text-xl font-semibold text-gray-900 mb-6">Security Tips</h2>
        
        <div class="space-y-4">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 bg-emerald-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <i class="ph ph-lock text-emerald-600"></i>
                </div>
                <div>
                    <h3 class="font-medium text-gray-900 mb-1">Use Strong Passwords</h3>
                    <p class="text-sm text-gray-600">Create unique passwords that include numbers, symbols, and mixed case letters.</p>
                </div>
            </div>

            <div class="flex items-start gap-3">
                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <i class="ph ph-shield-check text-blue-600"></i>
                </div>
                <div>
                    <h3 class="font-medium text-gray-900 mb-1">Enable Two-Factor Authentication</h3>
                    <p class="text-sm text-gray-600">Add an extra layer of security to your account with 2FA.</p>
                </div>
            </div>

            <div class="flex items-start gap-3">
                <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <i class="ph ph-clock text-purple-600"></i>
                </div>
                <div>
                    <h3 class="font-medium text-gray-900 mb-1">Regular Updates</h3>
                    <p class="text-sm text-gray-600">Update your password regularly to maintain account security.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
