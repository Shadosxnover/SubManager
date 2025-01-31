<div class="bg-white w-11/12 md:w-1/2 lg:w-1/3 rounded-lg p-6 shadow-lg">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Edit Subscription</h2>
        <button onclick="closeEditModal()" class="text-gray-500 hover:text-gray-700">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <form id="edit-subscription-form" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" id="edit-subscription-id" name="id">
        
        <div class="space-y-4">
            <div>
                <label for="edit-service_name" class="block text-sm font-medium text-gray-700">Service Name</label>
                <input type="text" id="edit-service_name" name="service_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500">
            </div>

            <div>
                <label for="edit-subscription_tier" class="block text-sm font-medium text-gray-700">Subscription Tier</label>
                <input type="text" id="edit-subscription_tier" name="subscription_tier" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500">
            </div>

            <div>
                <label for="edit-price" class="block text-sm font-medium text-gray-700">Price</label>
                <input type="number" step="0.01" id="edit-price" name="price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500">
            </div>

            <div>
                <label for="edit-next_payment_date" class="block text-sm font-medium text-gray-700">Next Payment Date</label>
                <input type="date" id="edit-next_payment_date" name="next_payment_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500">
            </div>

            <div>
                <label for="edit-billing_cycle" class="block text-sm font-medium text-gray-700">Billing Cycle</label>
                <select id="edit-billing_cycle" name="billing_cycle" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500">
                    <option value="monthly">Monthly</option>
                    <option value="annually">Annually</option>
                </select>
            </div>

            <div>
                <label for="edit-service_status" class="block text-sm font-medium text-gray-700">Status</label>
                <select id="edit-service_status" name="service_status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500">
                    <option value="active">Active</option>
                    <option value="paused">Paused</option>
                    <option value="expired">Expired</option>
                </select>
            </div>
        </div>

        <div class="flex justify-end mt-6 space-x-3">
            <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
                Cancel
            </button>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Update
            </button>
        </div>
    </form>
</div>