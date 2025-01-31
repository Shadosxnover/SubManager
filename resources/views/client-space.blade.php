@extends('layouts.app')

@section('content')
<div class="flex-1 bg-gray-50">
    <main class="p-6 lg:p-8">
        <!-- Stats Overview -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-xl transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-500 text-sm font-medium">Active Subscriptions</h3>
                    <span class="p-2 bg-green-100 rounded-xl">
                        <i class="fas fa-check text-green-600"></i>
                    </span>
                </div>
                <p class="text-3xl font-bold text-gray-900">{{ $activeCount }}</p>
                <p class="text-sm text-gray-600 mt-2">Total: ${{ number_format($activeTotal, 2) }}/month</p>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-xl transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-500 text-sm font-medium">Due This Week</h3>
                    <span class="p-2 bg-yellow-100 rounded-xl">
                        <i class="fas fa-clock text-yellow-600"></i>
                    </span>
                </div>
                <p class="text-3xl font-bold text-gray-900">{{ $dueThisWeekCount }}</p>
                <p class="text-sm text-yellow-600 mt-2">Total: ${{ number_format($dueThisWeekTotal, 2) }} due</p>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-xl transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-500 text-sm font-medium">Paid This Month</h3>
                    <span class="p-2 bg-blue-100 rounded-xl">
                        <i class="fas fa-receipt text-blue-600"></i>
                    </span>
                </div>
                <p class="text-3xl font-bold text-gray-900">${{ number_format($paidThisMonthTotal, 2) }}</p>
                <p class="text-sm text-green-600 mt-2">{{ $paidThisMonthCount }} subscriptions</p>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-xl transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-500 text-sm font-medium">Paused</h3>
                    <span class="p-2 bg-yellow-100 rounded-xl">
                        <i class="fas fa-pause text-yellow-600"></i>
                    </span>
                </div>
                <p class="text-3xl font-bold text-gray-900">{{ $pausedCount }}</p>
                <p class="text-sm text-gray-600 mt-2">Total: ${{ number_format($pausedTotal, 2) }}/month</p>
            </div>
        </div>

        <!-- Active Subscriptions -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 mb-8 hover:shadow-xl transition-all duration-300">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-semibold text-gray-900">Active Subscriptions</h3>
                <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transform hover:scale-105 transition-all duration-200 shadow-lg hover:shadow-blue-500/50">
                    <i class="fas fa-plus mr-2"></i>Add New
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Service</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Plan</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Price</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Next Due</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Status</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <img src="" alt="Netflix" class="w-8 h-8 rounded-lg mr-3">
                                    <span class="font-medium text-gray-900">Netflix</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Premium</td>
                            <td class="px-6 py-4 text-sm text-gray-600">$19.99/mo</td>
                            <td class="px-6 py-4 text-sm text-gray-600">Feb 15, 2025</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm font-medium">Paid</span>
                            </td>
                            <td class="px-6 py-4">
                                <button class="text-blue-600 hover:text-blue-800 mr-4 transition-colors duration-200">Edit</button>
                                <button class="text-red-600 hover:text-red-800 transition-colors duration-200">Cancel</button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <img src="#" alt="Spotify" class="w-8 h-8 rounded-lg mr-3">
                                    <span class="font-medium text-gray-900">Spotify</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Family</td>
                            <td class="px-6 py-4 text-sm text-gray-600">$14.99/mo</td>
                            <td class="px-6 py-4 text-sm text-gray-600">Feb 12, 2025</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-600 rounded-full text-sm font-medium">Due Soon</span>
                            </td>
                            <td class="px-6 py-4">
                                <button class="text-blue-600 hover:text-blue-800 mr-4 transition-colors duration-200">Edit</button>
                                <button class="text-red-600 hover:text-red-800 transition-colors duration-200">Cancel</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-xl transition-all duration-300">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-semibold text-gray-900">Monthly Spending</h3>
                    <select class="bg-gray-50 border border-gray-200 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option>Last 6 months</option>
                        <option>Last year</option>
                    </select>
                </div>
                <canvas id="spendingChart" height="200"></canvas>
            </div>

            <!-- Upcoming Payments -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-xl transition-all duration-300">
                <h3 class="text-xl font-semibold text-gray-900 mb-6">Upcoming Payments</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-200">
                        <div class="flex items-center space-x-4">
                            <img src="#" alt="Spotify" class="w-8 h-8 rounded-lg">
                            <div>
                                <p class="font-medium text-gray-900">Spotify</p>
                                <p class="text-sm text-gray-500">Due in 2 days</p>
                            </div>
                        </div>
                        <p class="font-medium text-gray-900">$14.99</p>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-200">
                        <div class="flex items-center space-x-4">
                            <img src="#" alt="Adobe" class="w-8 h-8 rounded-lg">
                            <div>
                                <p class="font-medium text-gray-900">Adobe CC</p>
                                <p class="text-sm text-gray-500">Due in 5 days</p>
                            </div>
                        </div>
                        <p class="font-medium text-gray-900">$52.99</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@push('scripts')
<script>
    // Mobile menu functionality
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const closeMobileMenuButton = document.getElementById('close-mobile-menu');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuContent = document.getElementById('mobile-menu-content');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.remove('hidden');
        setTimeout(() => {
            mobileMenuContent.classList.remove('-translate-x-full');
        }, 10);
    });

    closeMobileMenuButton.addEventListener('click', () => {
        mobileMenuContent.classList.add('-translate-x-full');
        setTimeout(() => {
            mobileMenu.classList.add('hidden');
        }, 300);
    });

    mobileMenu.addEventListener('click', (e) => {
        if (e.target === mobileMenu) {
            mobileMenuContent.classList.add('-translate-x-full');
            setTimeout(() => {
                mobileMenu.classList.add('hidden');
            }, 300);
        }
    });

    // Spending Chart
    const ctx = document.getElementById('spendingChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Sep', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb'],
            datasets: [{
                label: 'Monthly Spending',
                data: [85, 95, 90, 120, 110, 145],
                borderColor: '#2563eb',
                backgroundColor: 'rgba(37, 99, 235, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        borderDash: [2],
                        color: 'rgba(0, 0, 0, 0.1)'
                    },
                    ticks: {
                        callback: function(value) {
                            return '$' + value;
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
</script>
@endpush
@endsection