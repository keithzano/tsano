<div class="p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4">Upload ID Documents</h2>

    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            {{ session('error') }}
        </div>
    @endif

    @if ($hasDocuments)
        <div class="mb-4 p-4 bg-blue-100 text-blue-700 rounded">
            Documents already uploaded. You can upload new ones to replace them.
        </div>
    @endif

    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Driver's Licence
            </label>
            <input type="file" wire:model="drivers_licence" class="w-full p-2 border rounded">
            @error('drivers_licence') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            <div wire:loading wire:target="drivers_licence" class="text-sm text-gray-500">Uploading...</div>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                ID Document
            </label>
            <input type="file" wire:model="id_document" class="w-full p-2 border rounded">
            @error('id_document') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            <div wire:loading wire:target="id_document" class="text-sm text-gray-500">Uploading...</div>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" wire:loading.attr="disabled">
            Upload Documents
        </button>
    </form>
</div>