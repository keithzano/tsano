<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Vehicle;

class VehicleApproval extends Component
{
    public $rejectionReason = [];

    public function approve($vehicleId)
    {
        $vehicle = Vehicle::findOrFail($vehicleId);
        $vehicle->update([
            'status' => 'approved',
            'rejection_reason' => null,
        ]);
        session()->flash('message', 'Vehicle approved successfully!');
    }

    public function reject($vehicleId)
    {
        $vehicle = Vehicle::findOrFail($vehicleId);

        $this->validate([
            "rejectionReason.$vehicleId" => 'required|string|max:500',
        ], [
            "rejectionReason.$vehicleId.required" => 'Please provide a reason for rejection.',
        ]);

        $vehicle->update([
            'status' => 'rejected',
            'rejection_reason' => $this->rejectionReason[$vehicleId],
        ]);

        unset($this->rejectionReason[$vehicleId]);
        session()->flash('message', 'Vehicle rejected.');
    }

    public function render()
    {
        $vehicles = Vehicle::with('user')->latest()->get();
        return view('livewire.admin.vehicle-approval', compact('vehicles'))
            ->layout('layouts.admin');
    }
}
