@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    @section('content')
    <div class="min-h-screen lg:flex">
        <div class="flex-1 bg-gray-50">
            <main class="p-6 lg:p-8">
                <!-- Profile Information Section -->
                <div class="mb-8">
                    <h1 class="text-2xl font-bold text-gray-900">Profile Settings</h1>
                    <p class="text-gray-600">Manage your account information</p>
                </div>

                @if(session('success'))
                <div class="mb-6 bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-xl flex items-center justify-between">
                    <span>{{ session('success') }}</span>
                    <button class="text-green-700 hover:text-green-900" onclick="this.parentElement.remove()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                @endif

                @if(session('error'))
                <div class="mb-6 bg-red-100 border border-red-200 text-red-700 px-4 py-3 rounded-xl flex items-center justify-between">
                    <span>{{ session('error') }}</span>
                    <button class="text-red-700 hover:text-red-900" onclick="this.parentElement.remove()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                @endif

                <!-- Profile Information Form -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-xl transition-all duration-300 mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 mb-6">Personal Information</h2>
                    <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                                <input type="text"
                                    id="first_name"
                                    name="first_name"
                                    value="{{ auth()->user()->first_name }}"
                                    class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('first_name') border-red-500 @enderror"
                                    required>
                                @error('first_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                                <input type="text"
                                    id="last_name"
                                    name="last_name"
                                    value="{{ auth()->user()->last_name }}"
                                    class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('last_name') border-red-500 @enderror"
                                    required>
                                @error('last_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                            <input type="email"
                                id="email"
                                name="email"
                                value="{{ auth()->user()->email }}"
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror"
                                required>
                            @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transform hover:scale-105 transition-all duration-200 shadow-lg hover:shadow-blue-500/50">
                                Update Profile
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Password Change Form -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-xl transition-all duration-300">
                    <h2 class="text-xl font-semibold text-gray-900 mb-6">Change Password</h2>
                    <form action="{{ route('password.update') }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                            <div class="relative">
                                <input type="password"
                                    id="current_password"
                                    name="current_password"
                                    class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('current_password') border-red-500 @enderror"
                                    required>
                                <button type="button" 
                                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500"
                                    onclick="togglePasswordVisibility('current_password')">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('current_password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="new_password" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                            <div class="relative">
                                <input type="password"
                                    id="new_password"
                                    name="new_password"
                                    class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('new_password') border-red-500 @enderror"
                                    required>
                                <button type="button" 
                                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500"
                                    onclick="togglePasswordVisibility('new_password')">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('new_password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
                            <div class="relative">
                                <input type="password"
                                    id="new_password_confirmation"
                                    name="new_password_confirmation"
                                    class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    required>
                                <button type="button" 
                                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500"
                                    onclick="togglePasswordVisibility('new_password_confirmation')">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transform hover:scale-105 transition-all duration-200 shadow-lg hover:shadow-blue-500/50">
                                Update Password
                            </button>
                        </div>
                    </form>
                </div>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Make sure your new password is at least 8 characters long and contains a mix of letters, numbers, and symbols.
                    </p>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Password visibility toggle
        function togglePasswordVisibility(inputId) {
            const input = document.getElementById(inputId);
            const button = input.nextElementSibling;
            const icon = button.querySelector('i');
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // Password strength validation
        document.getElementById('new_password').addEventListener('input', function() {
            const password = this.value;
            const hasMinLength = password.length >= 8;
            const hasLetter = /[a-zA-Z]/.test(password);
            const hasNumber = /[0-9]/.test(password);
            const hasSymbol = /[^a-zA-Z0-9]/.test(password);

            if (hasMinLength && hasLetter && hasNumber && hasSymbol) {
                this.classList.add('border-green-500');
                this.classList.remove('border-red-500');
            } else {
                this.classList.add('border-red-500');
                this.classList.remove('border-green-500');
            }
        });

        // Confirm password validation
        document.getElementById('new_password_confirmation').addEventListener('input', function() {
            const password = document.getElementById('new_password').value;
            if (this.value === password) {
                this.classList.add('border-green-500');
                this.classList.remove('border-red-500');
            } else {
                this.classList.add('border-red-500');
                this.classList.remove('border-green-500');
            }
        });
    </script>
    @endsection
</body>
</html>