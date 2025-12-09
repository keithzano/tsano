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
                <label class="block text-gray-700 text-sm font-bold mb-2">Make *</label>
                <input type="text" wire:model="make" class="w-full p-2 border rounded" placeholder="e.g., Toyota">
                @error('make') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Model *</label>
                <input type="text" wire:model="model" class="w-full p-2 border rounded" placeholder="e.g., Corolla">
                @error('model') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Registration Number *</label>
                <input type="text" wire:model="registration_number" class="w-full p-2 border rounded" placeholder="e.g., ABC123">
                @error('registration_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Year *</label>
                <input type="number" wire:model="year" class="w-full p-2 border rounded" placeholder="e.g., 2020">
                @error('year') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Document Upload Section -->
        <div class="mt-6 border-t pt-6">
            <h3 class="text-lg font-semibold mb-4">Vehicle Documents (Optional)</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Registration Document</label>
                    <input type="file" wire:model="registration_document" class="w-full p-2 border rounded" accept=".pdf,.jpg,.jpeg,.png">
                    @error('registration_document') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    <div wire:loading wire:target="registration_document" class="text-sm text-gray-500 mt-1">Uploading...</div>
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Insurance Document</label>
                    <input type="file" wire:model="insurance_document" class="w-full p-2 border rounded" accept=".pdf,.jpg,.jpeg,.png">
                    @error('insurance_document') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    <div wire:loading wire:target="insurance_document" class="text-sm text-gray-500 mt-1">Uploading...</div>
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Roadworthy Certificate</label>
                    <input type="file" wire:model="roadworthy_certificate" class="w-full p-2 border rounded" accept=".pdf,.jpg,.jpeg,.png">
                    @error('roadworthy_certificate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    <div wire:loading wire:target="roadworthy_certificate" class="text-sm text-gray-500 mt-1">Uploading...</div>
                </div>
            </div>

            <p class="text-sm text-gray-500 mt-2">Accepted formats: PDF, JPG, JPEG, PNG (Max: 2MB each)</p>
        </div>

        <button type="submit" class="mt-6 bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600" wire:loading.attr="disabled">
            <span wire:loading.remove wire:target="save">Add Vehicle</span>
            <span wire:loading wire:target="save">Adding...</span>
        </button>
    </form>
</div>