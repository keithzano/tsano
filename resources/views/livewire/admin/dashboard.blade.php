<div class="space-y-6">
    <h2 class="text-3xl font-bold">Admin Dashboard</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Drivers Stats -->
        <div class="p-6 bg-white rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-4">Drivers</h3>
            <div class="space-y-2">
                <p><span class="font-medium">Total:</span> {{ $stats['total_drivers'] }}</p>
                <p><span class="font-medium text-yellow-600">Pending:</span> {{ $stats['pending_drivers'] }}</p>
                <p><span class="font-medium text-green-600">Approved:</span> {{ $stats['approved_drivers'] }}</p>
            </div>
        </div>

        <!-- Vehicles Stats -->
        <div class="p-6 bg-white rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-4">Vehicles</h3>
            <div class="space-y-2">
                <p><span class="font-medium">Total:</span> {{ $stats['total_vehicles'] }}</p>
                <p><span class="font-medium text-yellow-600">Pending:</span> {{ $stats['pending_vehicles'] }}</p>
                <p><span class="font-medium text-green-600">Approved:</span> {{ $stats['approved_vehicles'] }}</p>
            </div>
        </div>

        <!-- Transactions Stats -->
        <div class="p-6 bg-white rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-4">Fuel Transactions</h3>
            <div class="space-y-2">
                <p><span class="font-medium">Total Transactions:</span> {{ $stats['total_transactions'] }}</p>
                <p><span class="font-medium">Total Fuel:</span> {{ number_format($stats['total_fuel'], 2) }} L</p>
                <p><span class="font-medium">Total Amount:</span> ${{ number_format($stats['total_amount'], 2) }}</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="p-6 bg-blue-50 rounded-lg">
            <h3 class="text-xl font-semibold mb-2">Quick Actions</h3>
            <div class="space-y-2">
                <a href="{{ route('admin.driver-approval') }}" class="block text-blue-600 hover:underline">→ Approve Drivers</a>
                <a href="{{ route('admin.vehicle-approval') }}" class="block text-blue-600 hover:underline">→ Approve Vehicles</a>
                <a href="{{ route('admin.transactions') }}" class="block text-blue-600 hover:underline">→ View All Transactions</a>
            </div>
        </div>

        <div class="p-6 bg-green-50 rounded-lg">
            <h3 class="text-xl font-semibold mb-2">System Status</h3>
            <p class="text-green-700">✓ All systems operational</p>
            <p class="text-sm text-gray-600 mt-2">Last updated: {{ now()->format('Y-m-d H:i:s') }}</p>
        </div>
    </div>
</div>