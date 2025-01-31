@extends('layouts.app')

@section('content')
<script>
    function openModal() {
        const modal = document.getElementById('add-subscription-modal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeModal() {
        const modal = document.getElementById('add-subscription-modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    function openEditModal(subscriptionId) {
        const modal = document.getElementById('edit-subscription-modal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        
        fetch(`/subscriptions/${subscriptionId}/edit`)
            .then(response => response.json())
            .then(subscription => {
                document.getElementById('edit-subscription-id').value = subscription.id;
                document.getElementById('edit-service_name').value = subscription.service_name;
                document.getElementById('edit-subscription_tier').value = subscription.subscription_tier;
                document.getElementById('edit-price').value = subscription.price;
                document.getElementById('edit-next_payment_date').value = subscription.next_payment_date;
                document.getElementById('edit-billing_cycle').value = subscription.billing_cycle;
                document.getElementById('edit-service_status').value = subscription.service_status;
                
                const form = document.getElementById('edit-subscription-form');
                form.action = `/subscriptions/${subscriptionId}`;
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to load subscription details. Please try again later.');
            });
    }

    function closeEditModal() {
        // Close the modal
        const modal = document.getElementById('edit-subscription-modal');
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        } else {
            console.error('Edit subscription modal not found!');
        }

        // Clear the form fields (optional for a cleaner reset)
        const form = document.getElementById('edit-subscription-form');
        if (form) {
            form.reset(); // Reset all input fields to their default values
            form.action = ''; // Clear form action URL
        }
    }

    function deleteSubscription(subscriptionId) {
        if (confirm('Are you sure you want to delete this subscription?')) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/subscriptions/${subscriptionId}`;
            
            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'DELETE';
            
            const tokenInput = document.createElement('input');
            tokenInput.type = 'hidden';
            tokenInput.name = '_token';
            tokenInput.value = '{{ csrf_token() }}';
            
            form.appendChild(methodInput);
            form.appendChild(tokenInput);
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>

<div class="flex h-screen overflow-hidden bg-white">
    {{-- Main Content Area --}}
    <div class="flex-1 flex flex-col overflow-hidden">
        {{-- Fixed Header Section --}}
        <div class="flex-none bg-white z-20 px-4 lg:px-6 py-6">
            {{-- Add New Subscription Button --}}
            <div class="flex justify-end mb-6">
                <button
                    onclick="openModal()"
                    class="bg-blue-600 text-white px-4 sm:px-6 py-2 rounded-lg hover:bg-blue-700 transform hover:scale-105 transition-all duration-200 shadow-lg hover:shadow-blue-500/50">
                    Add New Subscription
                </button>
            </div>

            {{-- Page Title --}}
            <div class="text-center mb-6">
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">My Subscriptions</h1>
                <div class="w-20 h-1 bg-blue-600 mx-auto"></div>
            </div>
        </div>

        {{-- Table Container with Fixed Height --}}
        <div class="flex-1 overflow-hidden px-4 lg:px-6 pb-6">
            <div class="h-full bg-white rounded-xl border-2 border-gray-100 hover:border-blue-500 transition-all duration-300 shadow-lg">
                <div class="overflow-auto h-full">
                    <table class="w-full min-w-[800px]">
                        <thead class="bg-gray-50 border-b sticky top-0 z-10">
                            @php
                            $headers = [
                            'Service Name', 'Subscription Tier', 'Price',
                            'Next Payment', 'Billing Cycle', 'Status', 'Actions'
                            ];
                            @endphp
                            @foreach($headers as $header)
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{ $header }}
                            </th>
                            @endforeach
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($subscriptions as $subscription)
                            <tr class="hover:bg-blue-50 transition-colors duration-200">
                                {{-- Service Name Column - Always visible --}}
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                            <i class="fas fa-{{ $subscription->getServiceIcon() }} text-blue-600"></i>
                                        </div>
                                        <span class="text-sm sm:text-base">{{ $subscription->service_name }}</span>
                                    </div>
                                </td>

                                {{-- Other columns - Horizontally scrollable on mobile --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">
                                        {{ $subscription->subscription_tier }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900">
                                    ${{ number_format($subscription->price, 2) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $subscription->next_payment_date }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-sm text-gray-600">
                                        {{ ucfirst($subscription->billing_cycle) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                    $statusColors = [
                                    'active' => 'bg-green-100 text-green-800',
                                    'paused' => 'bg-yellow-100 text-yellow-800',
                                    'cancelled' => 'bg-red-100 text-red-800'
                                    ];
                                    $color = $statusColors[strtolower($subscription->service_status)] ?? 'bg-gray-100 text-gray-800';
                                    @endphp
                                    <span class="px-2 py-1 {{ $color }} rounded-full text-xs">
                                        {{ ucfirst($subscription->service_status) }}
                                    </span>
                                </td>

                                {{-- Actions Column - Sticky on the right --}}
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2 sticky right-0 bg-white shadow-l">
                                    <button onclick="openEditModal({{ $subscription->id }})"
                                        class="text-blue-600 hover:text-blue-900 transition-colors">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="deleteSubscription({{ $subscription->id }})"
                                        class="text-red-600 hover:text-red-900 transition-colors">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                    <div class="flex flex-col items-center justify-center py-12">
                                        <i class="fas fa-boxes text-4xl text-gray-300 mb-4"></i>
                                        <p class="text-xl">No subscriptions found. Start tracking!</p>
                                        <button
                                            onclick="openModal()"
                                            class="mt-4 bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                                            Add First Subscription
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal for Adding Subscription --}}
<div id="add-subscription-modal"
    class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <x-add-subscription />
</div>

{{-- Edit Subscription Modal --}}
<div id="edit-subscription-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <x-edit-subscription />
</div>
@endsection