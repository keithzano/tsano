<?php

namespace App\Livewire\Driver;

use Livewire\Component;
use App\Models\FuelTransaction;

class RequestFuel extends Component
{
    public $vehicle_id;
    public $litres;
    public $price_per_litre;
    public $transaction_date;
    public $notes;

    protected $rules = [
        'vehicle_id' => 'required|exists:vehicles,id',
        'litres' => 'required|numeric|min:0.01|max:1000',
        'price_per_litre' => 'required|numeric|min:0.01|max:1000',
        'transaction_date' => 'required|date|before_or_equal:today',
        'notes' => 'nullable|string|max:500',
    ];

    public function mount()
    {
        $this->transaction_date = date('Y-m-d');
    }

    public function save()
    {
        $this->validate();

        // Verify vehicle belongs to user and is approved
        $vehicle = auth()->user()->vehicles()
            ->where('id', $this->vehicle_id)
            ->where('status', 'approved')
            ->firstOrFail();

        $total_amount = $this->litres * $this->price_per_litre;

        FuelTransaction::create([
            'user_id' => auth()->id(),
            'vehicle_id' => $this->vehicle_id,
            'litres' => $this->litres,
            'price_per_litre' => $this->price_per_litre,
            'total_amount' => $total_amount,
            'transaction_date' => $this->transaction_date,
            'status' => 'completed',
            'notes' => $this->notes,
        ]);

        session()->flash('message', 'Fuel request recorded successfully!');
        $this->reset(['litres', 'price_per_litre', 'notes']);
        $this->transaction_date = date('Y-m-d');
        $this->dispatch('fuel-requested');
    }

    public function render()
    {
        $approvedVehicles = auth()->user()->vehicles()
            ->where('status', 'approved')
            ->get();

        return view('livewire.driver.request-fuel', compact('approvedVehicles'))
            ->layout('layouts.driver');
    }
}
