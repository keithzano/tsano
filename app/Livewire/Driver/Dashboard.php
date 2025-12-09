<?php

namespace App\Livewire\Driver;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $user = auth()->user();
        $stats = [
            'status' => $user->status,
            'has_documents' => $user->driverDocument()->exists(),
            'total_vehicles' => $user->vehicles()->count(),
            'approved_vehicles' => $user->vehicles()->where('status', 'approved')->count(),
            'pending_vehicles' => $user->vehicles()->where('status', 'pending')->count(),
            'total_transactions' => $user->fuelTransactions()->count(),
            'total_fuel' => $user->fuelTransactions()->sum('litres'),
            'total_spent' => $user->fuelTransactions()->sum('total_amount'),
            'can_request_fuel' => $user->canRequestFuel(),
        ];

        return view('livewire.driver.dashboard', compact('stats'))
            ->layout('layouts.driver');
    }
}
