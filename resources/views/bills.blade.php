@extends('layouts.app')

@section('content')
<script>
    function updatePaymentStatus(subscriptionId, status) {
        if (confirm('Mark this subscription as ' + status + '?')) {
            fetch(`/bills/${subscriptionId}/update-status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ status: status })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to update payment status. Please try again.');
            });
        }
    }
</script>

<div class="flex h-screen overflow-hidden bg-white">
    <div class="flex-1 flex flex-col overflow-hidden">
        {{-- Fixed Header Section --}}
        <div class="flex-none bg-white z-20 px-4 lg:px-6 py-6">
            {{-- Page Title --}}
            <div class="text-center mb-6">
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Payment Tracking</h1>
                <div class="w-20 h-1 bg-blue-600 mx-auto"></div>
            </div>
        </div>

        {{-- Table Container with Fixed Height --}}
        <div class="flex-1 overflow-hidden px-4 lg:px-6 pb-6">
            <div class="h-full bg-white rounded-xl border-2 border-gray-100 hover:border-blue-500 transition-all duration-300 shadow-lg">
                <div class="overflow-auto h-full">
                    <table class="w-full min-w-[800px]">
                        <thead class="bg-gray-50 border-b sticky top-0 z-10">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Next Payment</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Days Left</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment Status</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($bills as $bill)
                            <tr class="hover:bg-blue-50 transition-colors duration-200">
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                            <i class="fas fa-{{ $bill->subscription->getServiceIcon() }} text-blue-600"></i>
                                        </div>
                                        <span class="text-sm sm:text-base">{{ $bill->subscription->service_name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900">
                                    ${{ number_format($bill->subscription->price, 2) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $bill->next_payment_date }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $bill->days_until_due }} days
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $statusColors = [
                                            'paid' => 'bg-green-100 text-green-800',
                                            'due_soon' => 'bg-yellow-100 text-yellow-800',
                                            'overdue' => 'bg-red-100 text-red-800'
                                        ];
                                        $color = $statusColors[$bill->payment_status] ?? 'bg-gray-100 text-gray-800';
                                        $status = str_replace('_', ' ', ucfirst($bill->payment_status));
                                    @endphp
                                    <span class="px-2 py-1 {{ $color }} rounded-full text-xs">
                                        {{ $status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        @if($bill->payment_status !== 'paid')
                                            <button onclick="updatePaymentStatus({{ $bill->id }}, 'paid')"
                                                class="text-green-600 hover:text-green-900 transition-colors">
                                                <i class="fas fa-check-circle"></i>
                                                Mark as Paid
                                            </button>
                                        @else
                                            <button onclick="updatePaymentStatus({{ $bill->id }}, 'due_soon')"
                                                class="text-yellow-600 hover:text-yellow-900 transition-colors">
                                                <i class="fas fa-undo"></i>
                                                Mark as Unpaid
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                    <div class="flex flex-col items-center justify-center py-12">
                                        <i class="fas fa-file-invoice-dollar text-4xl text-gray-300 mb-4"></i>
                                        <p class="text-xl">No bills to track yet!</p>
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
@endsection
