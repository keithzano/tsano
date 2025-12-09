<div class="p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4">Add New Vehicle</h2>

    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Make</label>
                <input type="text" wire:model="make" class="w-full p-2 border rounded" placeholder="e.g., Toyota">
                @error('make') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Model</label>
                <input type="text" wire:model="model" class="w-full p-2 border rounded" placeholder="e.g., Corolla">
                @error('model') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Registration Number</label>
                <input type="text" wire:model="registration_number" class="w-full p-2 border rounded" placeholder="e.g., ABC123">
                @error('registration_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Year</label>
                <input type="number" wire:model="year" class="w-full p-2 border rounded" placeholder="e.g., 2020">
                @error('year') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Add Vehicle
        </button>
    </form>
</div>