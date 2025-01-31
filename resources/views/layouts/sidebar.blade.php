{{-- Mobile Navigation Header --}}
<div class="fixed top-0 left-0 right-0 lg:hidden bg-gray-900 text-white shadow-lg z-20">
    <div class="flex justify-between items-center px-6 py-4">
        <button id="mobile-menu-button" class="text-white">
            <i class="fas fa-bars text-xl"></i>
        </button>
        <span class="text-2xl font-bold">Sub<span class="text-blue-500">Manager</span></span>
        <img src="https://i.pinimg.com/736x/55/1f/73/551f73dfa1743f5b5c9bc45226d91954.jpg" alt="Profile" class="rounded-full w-8 h-8">
    </div>
</div>

{{-- Desktop Sidebar --}}
<div class="hidden lg:flex lg:w-72 bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 text-white flex-col h-screen">
    <!-- Logo Section -->
    <div class="flex-none p-8">
        <span class="text-2xl font-bold">Sub<span class="text-blue-500">Manager</span></span>
    </div>
    
    <!-- Navigation Section - Allow scroll only if content overflows -->
    <nav class="flex-1 px-6 space-y-3 overflow-y-auto">
        <a href="/client-space" class="flex items-center px-4 py-3 rounded-xl {{ request()->is('client-space') ? 'bg-blue-600' : 'hover:bg-white/10' }} transition-colors duration-200">
            <i class="fas fa-home mr-3"></i> Dashboard
        </a>
        <a href="{{ route('subscriptions.index') }}" class="flex items-center px-4 py-3 rounded-xl hover:bg-white/10 transition-colors duration-200">
            <i class="fas fa-calendar-alt mr-3"></i> My Subscriptions
        </a>
        <a href="{{ route('bills.index') }}" class="flex items-center px-4 py-3 rounded-xl hover:bg-white/10 transition-colors duration-200">
            <i class="fas fa-file-invoice-dollar mr-3"></i> Bills
        </a>
        <a href="{{ route('profile.index') }}" class="flex items-center px-4 py-3 rounded-xl {{ request()->is('profile') ? 'bg-blue-600' : 'hover:bg-white/10' }} transition-colors duration-200">
            <i class="fas fa-user mr-3"></i> Profile
        </a>
    </nav>
    
    <!-- Profile Section -->
    <div class="flex-none p-6 border-t border-gray-700">
        <div class="flex items-center space-x-4">
            <img src="https://i.pinimg.com/736x/55/1f/73/551f73dfa1743f5b5c9bc45226d91954.jpg" alt="Profile" class="rounded-full w-10 h-10">
            <div>
                <p class="font-medium">{{ Auth::user()->name }}</p>
                <a href="/logout" class="text-sm text-gray-400 hover:text-white transition-colors duration-200">Logout</a>
            </div>
        </div>
    </div>
</div>

{{-- Mobile Menu Modal --}}
<div id="mobile-menu" class="fixed inset-0 bg-gray-900 bg-opacity-50 z-50 hidden">
    <div id="mobile-menu-content" class="fixed inset-y-0 left-0 w-64 bg-gray-900 text-white transform -translate-x-full transition-transform duration-300 ease-in-out">
        <!-- Logo Section -->
        <div class="flex-none p-6 border-b border-gray-800">
            <div class="flex items-center justify-between">
                <span class="text-2xl font-bold">Sub<span class="text-blue-500">Manager</span></span>
                <button id="close-mobile-menu" class="text-white">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>
        
        <!-- Navigation Section -->
        <nav class="flex-1 p-6 space-y-3 overflow-y-auto">
            <a href="/client-space" class="flex items-center px-4 py-3 rounded-xl {{ request()->is('client-space') ? 'bg-blue-600' : 'hover:bg-white/10' }} transition-colors duration-200">
                <i class="fas fa-home mr-3"></i> Dashboard
            </a>
            <a href="{{ route('subscriptions.index') }}" class="flex items-center px-4 py-3 rounded-xl hover:bg-white/10 transition-colors duration-200">
                <i class="fas fa-calendar-alt mr-3"></i> My Subscriptions
            </a>
            <a href="{{ route('bills.index') }}" class="flex items-center px-4 py-3 rounded-xl hover:bg-white/10 transition-colors duration-200">
                <i class="fas fa-file-invoice-dollar mr-3"></i> Bills
            </a>
            <a href="{{ route('profile.index') }}" class="flex items-center px-4 py-3 rounded-xl {{ request()->is('profile') ? 'bg-blue-600' : 'hover:bg-white/10' }} transition-colors duration-200">
                <i class="fas fa-user mr-3"></i> Profile
            </a>
        </nav>
        
        <!-- Profile Section -->
        <div class="flex-none p-6 border-t border-gray-800">
            <div class="flex items-center space-x-4">
                <img src="https://i.pinimg.com/736x/55/1f/73/551f73dfa1743f5b5c9bc45226d91954.jpg" alt="Profile" class="rounded-full w-10 h-10">
                <div>
                    <p class="font-medium">{{ Auth::user()->name }}</p>
                    <a href="/logout" class="text-sm text-gray-400 hover:text-white transition-colors duration-200">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>