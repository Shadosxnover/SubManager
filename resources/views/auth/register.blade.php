<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - SubManager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-b from-gray-900 via-blue-900 to-blue-800 min-h-screen flex flex-col">
    <!-- Header -->
    <header class="w-full bg-gray-900 z-50 border-b border-gray-800">
        <nav class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold text-white">Sub<span class="text-blue-500">Manager</span></a>
                </div>
                <a href="/login" class="text-white hover:text-blue-400 transition-colors duration-200 font-medium">
                    Already have an account? Login
                </a>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-6 py-12">
        <div class="max-w-md mx-auto bg-white rounded-xl shadow-2xl p-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">Create Your Account</h1>

            @if($errors->any())
                <div class="bg-red-50 text-red-500 p-4 rounded-lg mb-6">
                    <ul class="list-disc pl-4">
                        @foreach($errors->all() as $error)
                            <li class="text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="bg-green-50 text-green-500 p-4 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <form action="/register" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                    <input 
                        type="text" 
                        id="first_name" 
                        name="first_name" 
                        value="{{ old('first_name') }}" 
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-colors duration-200"
                    >
                    @error('first_name')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                    <input 
                        type="text" 
                        id="last_name" 
                        name="last_name" 
                        value="{{ old('last_name') }}" 
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-colors duration-200"
                    >
                    @error('last_name')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-colors duration-200"
                    >
                    @error('email')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-colors duration-200"
                    >
                    @error('password')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                    <input 
                        type="password" 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-colors duration-200"
                    >
                </div>

                <button 
                    type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transform hover:scale-105 transition-all duration-200 font-medium shadow-lg hover:shadow-blue-500/50"
                >
                    Create Account
                </button>
            </form>

            <div class="mt-6 text-center text-sm text-gray-600">
                By signing up, you agree to our 
                <a href="#" class="text-blue-600 hover:text-blue-700">Terms of Service</a> and 
                <a href="#" class="text-blue-600 hover:text-blue-700">Privacy Policy</a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-8 mt-auto">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; 2025 SubManager. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
