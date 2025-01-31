<div class="fixed inset-0 bg-black/50 flex items-center justify-center p-4 z-50">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-3xl relative animate-fade-in animate-duration-300">
        <!-- Close Button -->
        <button 
            onclick="closeModal()"
            class="absolute right-4 top-4 p-2 rounded-full hover:bg-gray-100 transition-colors group"
        >
            <i class="fas fa-times text-xl text-gray-500 group-hover:text-gray-700"></i>
        </button>

        <!-- Form Header -->
        <div class="px-8 py-6 border-b border-gray-200">
            <h2 class="text-2xl font-semibold text-gray-800">Add New Subscription</h2>
            <p class="text-gray-600 mt-1">Enter the details of your subscription below</p>
        </div>

        <!-- Form Content -->
        <form action="{{ route('subscriptions.store') }}" method="POST" class="p-8">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="service_name" class="block text-sm font-medium text-gray-700">
                        Service Name
                    </label>
                    <div class="relative">
                        <i class="fas fa-briefcase absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input
                            type="text"
                            name="service_name"
                            id="service_name"
                            class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-all duration-200"
                            required
                        />
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="subscription_tier" class="block text-sm font-medium text-gray-700">
                        Subscription Tier
                    </label>
                    <div class="relative">
                        <i class="fas fa-layer-group absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input
                            type="text"
                            name="subscription_tier"
                            id="subscription_tier"
                            class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-all duration-200"
                            required
                        />
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="price" class="block text-sm font-medium text-gray-700">
                        Price
                    </label>
                    <div class="relative">
                        <i class="fas fa-dollar-sign absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input
                            type="number"
                            step="0.01"
                            name="price"
                            id="price"
                            class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-all duration-200"
                            required
                        />
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="next_payment_date" class="block text-sm font-medium text-gray-700">
                        Next Payment Date
                    </label>
                    <div class="relative">
                        <i class="fas fa-calendar absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input
                            type="date"
                            name="next_payment_date"
                            id="next_payment_date"
                            class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-all duration-200"
                            required
                        />
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="billing_cycle" class="block text-sm font-medium text-gray-700">
                        Billing Cycle
                    </label>
                    <div class="relative">
                        <i class="fas fa-sync absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <select
                            name="billing_cycle"
                            id="billing_cycle"
                            class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-all duration-200"
                            required
                        >
                            <option value="monthly">Monthly</option>
                            <option value="yearly">Yearly</option>
                        </select>
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="service_status" class="block text-sm font-medium text-gray-700">
                        Service Status
                    </label>
                    <div class="relative">
                        <i class="fas fa-toggle-on absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <select
                            name="service_status"
                            id="service_status"
                            class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-all duration-200"
                            required
                        >
                            <option value="active">Active</option>
                            <option value="paused">Paused</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Form Footer -->
            <div class="flex justify-end mt-8 pt-6 border-t border-gray-200">
                <button
                    type="button"
                    onclick="closeModal()"
                    class="px-6 py-3 mr-4 text-gray-700 hover:text-gray-900 font-medium rounded-lg hover:bg-gray-100 transition-all duration-200"
                >
                    <i class="fas fa-times mr-2"></i>
                    Cancel
                </button>
                <button
                    type="submit"
                    class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transform hover:scale-105 transition-all duration-200 shadow-lg hover:shadow-blue-500/50"
                >
                    <i class="fas fa-plus mr-2"></i>
                    Add Subscription
                </button>
            </div>
        </form>
    </div>
</div>