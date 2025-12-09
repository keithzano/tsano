<div class="p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4">Driver Approval</h2>

    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('message') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Documents</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($drivers as $driver)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $driver->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $driver->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                @if($driver->status === 'approved') bg-green-100 text-green-800
                                @elseif($driver->status === 'rejected') bg-red-100 text-red-800
                                @else bg-yellow-100 text-yellow-800 @endif">
                                {{ ucfirst($driver->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            @if($driver->driverDocument)
                                @if($driver->driverDocument->drivers_licence)
                                    <a href="{{ Storage::url($driver->driverDocument->drivers_licence) }}" target="_blank" class="text-blue-600 hover:underline">Licence</a>
                                @endif
                                @if($driver->driverDocument->id_document)
                                    <a href="{{ Storage::url($driver->driverDocument->id_document) }}" target="_blank" class="text-blue-600 hover:underline ml-2">ID</a>
                                @endif
                            @else
                                <span class="text-gray-400">No documents</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            @if($driver->status === 'pending')
                                <button wire:click="approve({{ $driver->id }})" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 mr-2">
                                    Approve
                                </button>
                                <button wire:click="reject({{ $driver->id }})" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                    Reject
                                </button>
                            @else
                                <span class="text-gray-400">{{ ucfirst($driver->status) }}</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">No drivers found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>