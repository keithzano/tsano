<?php

namespace App\Livewire\Driver;

use Livewire\Component;
use App\Models\Vehicle;

class AddVehicle extends Component
{
    public $make;
    public $model;
    public $registration_number;
    public $year;

    // Define rules as a method
    public function rules()
    {
        return [
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'registration_number' => 'required|string|unique:vehicles,registration_number|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
        ];
    }

    public function save()
    {
        $this->validate();

        Vehicle::create([
            'user_id' => auth()->id(),
            'make' => $this->make,
            'model' => $this->model,
            'registration_number' => strtoupper($this->registration_number),
            'year' => $this->year,
            'status' => 'pending',
        ]);

        session()->flash('message', 'Vehicle added successfully! Waiting for admin approval.');
        $this->reset(['make', 'model', 'registration_number', 'year']);
        $this->dispatch('vehicle-added');
    }

    public function render()
    {
        return view('livewire.driver.add-vehicle')
            ->layout('layouts.driver');
    }
}
