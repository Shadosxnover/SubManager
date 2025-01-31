<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between h-16">
            <div class="flex">
                <a href="/" class="flex items-center">
                    <span class="text-xl font-bold">Sub<span class="text-blue-500">Manager</span></span>
                </a>
            </div>

            <div class="flex items-center">
                @auth
                    <a href="{{ route('profile.index') }}" class="text-gray-700 hover:text-gray-900 px-3 py-2">
                        Profile
                    </a>
                    <a href="/logout" class="text-gray-700 hover:text-gray-900 px-3 py-2">
                        Logout
                    </a>
                @else
                    <a href="/login" class="text-gray-700 hover:text-gray-900 px-3 py-2">
                        Login
                    </a>
                    <a href="/register" class="text-gray-700 hover:text-gray-900 px-3 py-2">
                        Register
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>