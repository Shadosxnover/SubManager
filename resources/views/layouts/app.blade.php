<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'SubManager')</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chart.js/3.7.0/chart.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
    <div class="flex h-screen overflow-hidden">
        @include('layouts.sidebar')
        
        {{-- Main Content - Remove lg:ml-72 and adjust flex --}}
        <main class="flex-1 relative">
            {{-- Add padding for mobile header only --}}
            <div class="pt-16 lg:pt-0 h-full overflow-auto">
                @yield('content')
            </div>
        </main>
    </div>

    {{-- Global JavaScript for Mobile Menu --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const closeMobileMenuButton = document.getElementById('close-mobile-menu');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileMenuContent = document.getElementById('mobile-menu-content');

            function openMobileMenu() {
                mobileMenu.classList.remove('hidden');
                setTimeout(() => {
                    mobileMenuContent.classList.remove('-translate-x-full');
                }, 10);
            }

            function closeMobileMenu() {
                mobileMenuContent.classList.add('-translate-x-full');
                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                }, 300);
            }

            mobileMenuButton?.addEventListener('click', openMobileMenu);
            closeMobileMenuButton?.addEventListener('click', closeMobileMenu);
            
            mobileMenu?.addEventListener('click', (e) => {
                if (e.target === mobileMenu) {
                    closeMobileMenu();
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>