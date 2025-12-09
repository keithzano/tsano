<div class="p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4">All Fuel Transactions</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div class="p-4 bg-blue-50 rounded">
            <p class="text-sm text-gray-600">Total Fuel Dispensed</p>
            <p class="text-2xl font-bold">{{ number_format($totalLitres, 2) }} L</p>
        </div>
        <div class="p-4 bg-green-50 rounded">
            <p class="text-sm text-gray-600">Total Amount</p>
            <p class="text-2xl font-bold">${{ number_format($totalAmount, 2) }}</p>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Driver</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Vehicle</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Litres</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price/L</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($transactions as $transaction)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->transaction_date->format('Y-m-d') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $transaction->vehicle->make }} {{ $transaction->vehicle->model }}
                            <br><span class="text-xs text-gray-500">{{ $transaction->vehicle->registration_number }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ number_format($transaction->litres, 2) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">${{ number_format($transaction->price_per_litre, 2) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap font-semibold">${{ number_format($transaction->total_amount, 2) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                @if($transaction->status === 'completed') bg-green-100 text-green-800
                                @elseif($transaction->status === 'cancelled') bg-red-100 text-red-800
                                @else bg-yellow-100 text-yellow-800 @endif">
                                {{ ucfirst($transaction->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">No transactions found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $transactions->links() }}
    </div>
</div>