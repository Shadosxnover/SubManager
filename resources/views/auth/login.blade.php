<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SubManager</title>
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
                <a href="/register" class="text-white hover:text-blue-400 transition-colors duration-200 font-medium">
                    Don't have an account? Sign up
                </a>
            </div>
        </nav>
    </header>

    <!-- Login Form -->
    <main class="flex-grow container mx-auto px-6 pt-32 pb-20">
        <div class="max-w-md mx-auto bg-white rounded-xl shadow-2xl p-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">Welcome Back</h1>

            @if($errors->any())
                <div class="bg-red-50 text-red-500 p-4 rounded-lg mb-6">
                    <ul class="list-disc pl-4">
                        @foreach($errors->all() as $error)
                            <li class="text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/login" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-colors duration-200"
                    >
                </div>

                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <a href="/forgot-password" class="text-sm text-blue-600 hover:text-blue-700">Forgot password?</a>
                    </div>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-colors duration-200"
                    >
                </div>

                <div class="flex items-center">
                    <input 
                        type="checkbox" 
                        id="remember" 
                        name="remember" 
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                    >
                    <label for="remember" class="ml-2 block text-sm text-gray-700">
                        Remember me
                    </label>
                </div>

                <button 
                    type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transform hover:scale-105 transition-all duration-200 font-medium shadow-lg hover:shadow-blue-500/50"
                >
                    Sign In
                </button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    New to SubManager? 
                    <a href="/register" class="text-blue-600 hover:text-blue-700 font-medium">
                        Create an account
                    </a>
                </p>
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