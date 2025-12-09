<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\FuelTransaction;

class Dashboard extends Component
{
    public function render()
    {
        $stats = [
            'total_drivers' => User::where('role', 'driver')->count(),
            'pending_drivers' => User::where('role', 'driver')->where('status', 'pending')->count(),
            'approved_drivers' => User::where('role', 'driver')->where('status', 'approved')->count(),
            'total_vehicles' => Vehicle::count(),
            'pending_vehicles' => Vehicle::where('status', 'pending')->count(),
            'approved_vehicles' => Vehicle::where('status', 'approved')->count(),
            'total_transactions' => FuelTransaction::count(),
            'total_fuel' => FuelTransaction::sum('litres'),
            'total_amount' => FuelTransaction::sum('total_amount'),
        ];

        return view('livewire.admin.dashboard', compact('stats'));
    }
}
