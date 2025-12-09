<div class="p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4">Request Fuel</h2>

    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('message') }}
        </div>
    @endif

    @if($approvedVehicles->isEmpty())
        <div class="p-4 bg-yellow-100 text-yellow-700 rounded">
            You don't have any approved vehicles yet. Please add a vehicle and wait for approval.
        </div>
    @else
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Select Vehicle</label>
                    <select wire:model="vehicle_id" class="w-full p-2 border rounded">
                        <option value="">Choose a vehicle</option>
                        @foreach($approvedVehicles as $vehicle)
                            <option value="{{ $vehicle->id }}">
                                {{ $vehicle->make }} {{ $vehicle->model }} ({{ $vehicle->registration_number }})
                            </option>
                        @endforeach
                    </select>
                    @error('vehicle_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Transaction Date</label>
                    <input type="date" wire:model="transaction_date" class="w-full p-2 border rounded">
                    @error('transaction_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Litres</label>
                    <input type="number" step="0.01" wire:model="litres" class="w-full p-2 border rounded" placeholder="e.g., 50.00">
                    @error('litres') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Price per Litre ($)</label>
                    <input type="number" step="0.01" wire:model="price_per_litre" class="w-full p-2 border rounded" placeholder="e.g., 1.50">
                    @error('price_per_litre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="md:col-span-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Notes (Optional)</label>
                    <textarea wire:model="notes" class="w-full p-2 border rounded" rows="3" placeholder="Any additional information..."></textarea>
                    @error('notes') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            @if($litres && $price_per_litre)
                <div class="mt-4 p-4 bg-blue-50 rounded">
                    <p class="text-lg font-semibold">Total Amount: ${{ number_format($litres * $price_per_litre, 2) }}</p>
                </div>
            @endif

            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Submit Fuel Request
            </button>
        </form>
    @endif
</div>