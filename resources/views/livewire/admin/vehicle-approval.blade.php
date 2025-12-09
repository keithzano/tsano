<div class="p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4">Vehicle Approval</h2>

    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('message') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Driver</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Vehicle</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Registration</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Year</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Documents</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($vehicles as $vehicle)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $vehicle->user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $vehicle->make }} {{ $vehicle->model }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $vehicle->registration_number }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $vehicle->year }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            @if($vehicle->registration_document)
                                <a href="{{ Storage::url($vehicle->registration_document) }}" target="_blank" class="text-blue-600 hover:underline block">📄 Registration</a>
                            @endif
                            @if($vehicle->insurance_document)
                                <a href="{{ Storage::url($vehicle->insurance_document) }}" target="_blank" class="text-blue-600 hover:underline block">📄 Insurance</a>
                            @endif
                            @if($vehicle->roadworthy_certificate)
                                <a href="{{ Storage::url($vehicle->roadworthy_certificate) }}" target="_blank" class="text-blue-600 hover:underline block">📄 Roadworthy</a>
                            @endif
                            @if(!$vehicle->registration_document && !$vehicle->insurance_document && !$vehicle->roadworthy_certificate)

                            <span class="text-gray-400">No documents</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            @if($vehicle->status === 'approved') bg-green-100 text-green-800
                            @elseif($vehicle->status === 'rejected') bg-red-100 text-red-800
                            @else bg-yellow-100 text-yellow-800 @endif">
                            {{ ucfirst($vehicle->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        @if($vehicle->status === 'pending')
                            <button wire:click="approve({{ $vehicle->id }})" 
                                class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 mb-2">
                                Approve
                            </button>
                            <div class="mt-2">
                                <input type="text" 
                                    wire:model="rejectionReason.{{ $vehicle->id }}" 
                                    placeholder="Reason for rejection"
                                    class="w-full p-1 border rounded text-sm mb-1">
                                @error("rejectionReason.{$vehicle->id}") 
                                    <span class="text-red-500 text-xs">{{ $message }}</span> 
                                @enderror
                                <button wire:click="reject({{ $vehicle->id }})" 
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 w-full">
                                    Reject
                                </button>
                            </div>
                        @else
                            <span class="text-gray-400">{{ ucfirst($vehicle->status) }}</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-6 py-4 text-center text-gray-500">No vehicles found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</div>