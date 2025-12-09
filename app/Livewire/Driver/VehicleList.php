<?php

namespace App\Livewire\Driver;

use Livewire\Component;
use Livewire\Attributes\On;

class VehicleList extends Component
{
    #[On('vehicle-added')]
    public function refreshList()
    {
        // This method will be called when a vehicle is added
    }

    public function render()
    {
        $vehicles = auth()->user()->vehicles()->latest()->get();
        return view('livewire.driver.vehicle-list', compact('vehicles'))
            ->layout('layouts.driver');
    }
}
