<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class DriverApproval extends Component
{
    public function approve($userId)
    {
        $user = User::findOrFail($userId);
        $user->update(['status' => 'approved']);
        session()->flash('message', 'Driver approved successfully!');
    }

    public function reject($userId)
    {
        $user = User::findOrFail($userId);
        $user->update(['status' => 'rejected']);
        session()->flash('message', 'Driver rejected.');
    }

    public function render()
    {
        $drivers = User::where('role', 'driver')
            ->with('driverDocument')
            ->latest()
            ->get();

        return view('livewire.admin.driver-approval', compact('drivers'));
    }
}
