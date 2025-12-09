<div class="p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4">My Vehicles</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Make/Model</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Registration</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Year</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($vehicles as $vehicle)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $vehicle->make }} {{ $vehicle->model }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $vehicle->registration_number }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $vehicle->year }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                @if($vehicle->status === 'approved') bg-green-100 text-green-800
                                @elseif($vehicle->status === 'rejected') bg-red-100 text-red-800
                                @else bg-yellow-100 text-yellow-800 @endif">
                                {{ ucfirst($vehicle->status) }}
                            </span>
                            @if($vehicle->status === 'rejected' && $vehicle->rejection_reason)
                                <p class="text-sm text-red-600 mt-1">Reason: {{ $vehicle->rejection_reason }}</p>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">No vehicles added yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>