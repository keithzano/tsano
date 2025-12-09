<div class="space-y-6">
    <h2 class="text-3xl font-bold">Driver Dashboard</h2>

    <!-- Status Alert -->
    @if($stats['status'] === 'pending')
        <div class="p-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700">
            <p class="font-bold">Account Pending Approval</p>
            <p class="text-sm">Your account is awaiting admin approval. You'll be notified once approved.</p>
            @if(!$stats['has_documents'])
                <p class="text-sm mt-2">Please upload your ID documents to speed up the approval process.</p>
            @endif
        </div>
    @elseif($stats['status'] === 'rejected')
        <div class="p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
            <p class="font-bold">Account Rejected</p>
            <p class="text-sm">Your account has been rejected. Please contact support for more information.</p>
        </div>
    @elseif($stats['status'] === 'approved')
        <div class="p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
            <p class="font-bold">✓ Account Approved</p>
            @if(!$stats['can_request_fuel'])
                <p class="text-sm">You need at least one approved vehicle to request fuel.</p>
            @endif
        </div>
    @endif

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="p-6 bg-white rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-4">My Vehicles</h3>
            <div class="space-y-2">
                <p><span class="font-medium">Total:</span> {{ $stats['total_vehicles'] }}</p>
                <p><span class="font-medium text-green-600">Approved:</span> {{ $stats['approved_vehicles'] }}</p>
                <p><span class="font-medium text-yellow-600">Pending:</span> {{ $stats['pending_vehicles'] }}</p>
            </div>
        </div>

        <div class="p-6 bg-white rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-4">Fuel Usage</h3>
            <div class="space-y-2">
                <p><span class="font-medium">Transactions:</span> {{ $stats['total_transactions'] }}</p>
                <p><span class="font-medium">Total Fuel:</span> {{ number_format($stats['total_fuel'], 2) }} L</p>
            </div>
        </div>

        <div class="p-6 bg-white rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-4">Total Credit</h3>
            <div class="space-y-2">
                <p class="text-3xl font-bold text-blue-600">${{ number_format($stats['total_spent'], 2) }}</p>
                <p class="text-sm text-gray-600">Total amount on credit</p>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="p-6 bg-blue-50 rounded-lg">
        <h3 class="text-xl font-semibold mb-4">Quick Actions</h3>
        <div class="space-y-2">
            @if(!$stats['has_documents'])
                <a href="{{ route('driver.upload-documents') }}" class="block text-blue-600 hover:underline">→ Upload ID Documents</a>
            @endif
            <a href="{{ route('driver.vehicles') }}" class="block text-blue-600 hover:underline">→ Manage My Vehicles</a>
            @if($stats['can_request_fuel'])
                <a href="{{ route('driver.request-fuel') }}" class="block text-blue-600 hover:underline font-semibold">→ Request Fuel</a>
            @endif
            <a href="{{ route('driver.fuel-history') }}" class="block text-blue-600 hover:underline">→ View Fuel History</a>
        </div>
    </div>
</div>