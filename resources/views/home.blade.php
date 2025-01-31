<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SubManager - Control Your Subscriptions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-white">
    <!-- Header -->
    <header class="fixed w-full bg-gray-900 z-50 border-b border-gray-800">
        <nav class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <span class="text-2xl font-bold text-white">Sub<span class="text-blue-500">Manager</span></span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#features" class="text-white hover:text-blue-400 transition-colors duration-200 font-medium relative group">
                        Features
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-200"></span>
                    </a>
                    <a href="#how-it-works" class="text-white hover:text-blue-400 transition-colors duration-200 font-medium relative group">
                        How it Works
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-200"></span>
                    </a>
                    <a href="#pricing" class="text-white hover:text-blue-400 transition-colors duration-200 font-medium relative group">
                        Pricing
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-200"></span>
                    </a>
                    <a href="/login" class="text-white hover:text-blue-400 transition-colors duration-200 font-medium">Login</a>
                    <a href="/register" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transform hover:scale-105 transition-all duration-200 font-medium shadow-lg hover:shadow-blue-500/50">
                        Get Started
                    </a>
                </div>
                <button class="md:hidden text-white">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 bg-gradient-to-b from-gray-900 via-blue-900 to-blue-800">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row items-center">
                <div class="lg:w-1/2 lg:pr-16">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6 drop-shadow-lg">
                        Take Control of Your
                        <span class="text-blue-400">Subscriptions</span>
                    </h1>
                    <p class="text-lg text-gray-300 mb-8">
                        Never miss a payment or lose track of your subscriptions again. Manage all your recurring services in one place, get reminders, and save money.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/register" class="bg-blue-600 text-white px-8 py-4 rounded-lg text-center hover:bg-blue-700 font-medium transform hover:scale-105 transition-all duration-200 shadow-lg hover:shadow-blue-500/50">
                            Start Free Trial
                        </a>
                        <a href="#how-it-works" class="border border-white/30 text-white px-8 py-4 rounded-lg text-center hover:bg-white/10 font-medium backdrop-blur-sm transition-all duration-200">
                            Learn More
                        </a>
                    </div>
                </div>
                <div class="lg:w-1/2 mt-12 lg:mt-0">
                    <img src="/images/uploads/dashboard.png" alt="Dashboard Preview" class="rounded-xl shadow-2xl transform hover:scale-105 transition-all duration-500">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Everything You Need to Manage Subscriptions
                </h2>
                <div class="w-20 h-1 bg-blue-600 mx-auto mb-4"></div>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Powerful features to help you track, manage, and optimize your subscription spending.
                </p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="p-8 bg-white rounded-xl border-2 border-gray-100 hover:border-blue-500 hover:shadow-2xl transition-all duration-300 group">
                    <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 transition-colors duration-300">
                        <i class="fas fa-bell text-blue-600 text-2xl group-hover:text-white transition-colors duration-300"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-gray-900">Smart Reminders</h3>
                    <p class="text-gray-600">Never miss a payment with customizable notifications for upcoming charges.</p>
                </div>
                <div class="p-8 bg-white rounded-xl border-2 border-gray-100 hover:border-blue-500 hover:shadow-2xl transition-all duration-300 group">
                    <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 transition-colors duration-300">
                        <i class="fas fa-chart-pie text-blue-600 text-2xl group-hover:text-white transition-colors duration-300"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-gray-900">Spending Analytics</h3>
                    <p class="text-gray-600">Get detailed insights into your subscription spending with beautiful charts and reports.</p>
                </div>
                <div class="p-8 bg-white rounded-xl border-2 border-gray-100 hover:border-blue-500 hover:shadow-2xl transition-all duration-300 group">
                    <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 transition-colors duration-300">
                        <i class="fas fa-shield-alt text-blue-600 text-2xl group-hover:text-white transition-colors duration-300"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-gray-900">Secure Storage</h3>
                    <p class="text-gray-600">Your subscription data is encrypted and stored securely in our cloud database.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    How SubManager Works
                </h2>
                <div class="w-20 h-1 bg-blue-600 mx-auto mb-4"></div>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Get started in minutes and take control of your subscriptions
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-12">
                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-3xl font-bold text-blue-600">1</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Connect Your Accounts</h3>
                    <p class="text-gray-600">Securely link your payment methods and we'll automatically detect your subscriptions.</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-3xl font-bold text-blue-600">2</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Track Everything</h3>
                    <p class="text-gray-600">View all your subscriptions in one dashboard and set up custom notifications.</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-3xl font-bold text-blue-600">3</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Optimize & Save</h3>
                    <p class="text-gray-600">Get recommendations to reduce costs and manage your subscriptions efficiently.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Simple, Transparent Pricing
                </h2>
                <div class="w-20 h-1 bg-blue-600 mx-auto mb-4"></div>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Choose the plan that works best for you
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <div class="bg-white rounded-xl border-2 border-gray-100 p-8 hover:border-blue-500 hover:shadow-2xl transition-all duration-300">
                    <h3 class="text-2xl font-bold mb-4">Basic</h3>
                    <div class="text-4xl font-bold mb-6">$0<span class="text-lg text-gray-500 font-normal">/month</span></div>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <span class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center mr-2">
                                <i class="fas fa-check text-blue-600 text-sm"></i>
                            </span>
                            Up to 5 subscriptions
                        </li>
                        <li class="flex items-center">
                            <span class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center mr-2">
                                <i class="fas fa-check text-blue-600 text-sm"></i>
                            </span>
                            Basic notifications
                        </li>
                        <li class="flex items-center">
                            <span class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center mr-2">
                                <i class="fas fa-check text-blue-600 text-sm"></i>
                            </span>
                            Monthly reports
                        </li>
                    </ul>
                    <a href="/register" class="block w-full py-3 px-6 text-center bg-gray-100 hover:bg-gray-200 rounded-lg font-medium transition-colors duration-200">
                        Get Started
                    </a>
                </div>
                <div class="bg-white rounded-xl border-2 border-blue-500 p-8 shadow-2xl relative transform hover:scale-105 transition-all duration-300">
                    <div class="absolute top-0 right-0 bg-blue-500 text-white px-4 py-1 rounded-bl-lg rounded-tr-lg text-sm font-medium">
                        Popular
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Pro</h3>
                    <div class="text-4xl font-bold mb-6">$9<span class="text-lg text-gray-500 font-normal">/month</span></div>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <span class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center mr-2">
                                <i class="fas fa-check text-blue-600 text-sm"></i>
                            </span>
                            Unlimited subscriptions
                        </li>
                        <li class="flex items-center">
                            <span class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center mr-2">
                                <i class="fas fa-check text-blue-600 text-sm"></i>
                            </span>
                            Advanced analytics
                        </li>
                        <li class="flex items-center">
                            <span class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center mr-2">
                                <i class="fas fa-check text-blue-600 text-sm"></i>
                            </span>
                            Custom notifications
                        </li>
                        <li class="flex items-center">
                            <span class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center mr-2">
                                <i class="fas fa-check text-blue-600 text-sm"></i>
                            </span>
                            Priority support
                        </li>
                    </ul>
                    <a href="/register" class="block w-full py-3 px-6 text-center bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors duration-200">
                        Start Free Trial
                    </a>
                </div>
                <div class="bg-white rounded-xl border-2 border-gray-100 p-8 hover:border-blue-500 hover:shadow-2xl transition-all duration-300">
                    <h3 class="text-2xl font-bold mb-4">Enterprise</h3>
                    <div class="text-4xl font-bold mb-6">$29<span class="text-lg text-gray-500 font-normal">/month</span></div>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <span class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center mr-2">
                                <i class="fas fa-check text-blue-600 text-sm"></i>
                            </span>
                            Everything in Pro
                        </li>
                        <li class="flex items-center">
                            <span class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center mr-2">
                                <i class="fas fa-check text-blue-600 text-sm"></i>
                            </span>
                            Team collaboration
                        </li>
                        <li class="flex items-center">
                            <span class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center mr-2">
                                <i class="fas fa-check text-blue-600 text-sm"></i>
                            </span>
                            API access
                        </li>
                        <li class="flex items-center">
                            <span class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center mr-2">
                                <i class="fas fa-check text-blue-600 text-sm"></i>
                            </span>
                            24/7 support
                        </li>
                    </ul>
                    <a href="/register" class="block w-full py-3 px-6 text-center bg-gray-100 hover:bg-gray-200 rounded-lg font-medium transition-colors duration-200">
                        Contact Sales
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h4 class="text-xl font-bold mb-4">SubManager</h4>
                    <p class="text-gray-400">Take control of your subscriptions and save money.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#features" class="text-gray-400 hover:text-white transition-colors duration-200">Features</a></li>
                        <li><a href="#how-it-works" class="text-gray-400 hover:text-white transition-colors duration-200">How it Works</a></li>
                        <li><a href="#pricing" class="text-gray-400 hover:text-white transition-colors duration-200">Pricing</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Legal</h4>
                    <ul class="space-y-2">
                        <li><a href="/privacy" class="text-gray-400 hover:text-white transition-colors duration-200">Privacy Policy</a></li>
                        <li><a href="/terms" class="text-gray-400 hover:text-white transition-colors duration-200">Terms of Service</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact</h4>
                    <ul class="space-y-2">
                        <li><a href="mailto:support@submanager.com" class="text-gray-400 hover:text-white transition-colors duration-200">support@submanager.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
                <p>&copy; 2024 SubManager. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>