<?php

namespace App\Livewire\Driver;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class FuelHistory extends Component
{
    use WithPagination;

    #[On('fuel-requested')]
    public function refreshHistory()
    {
        $this->resetPage();
    }

    public function render()
    {
        $transactions = auth()->user()->fuelTransactions()
            ->with('vehicle')
            ->latest('transaction_date')
            ->paginate(10);

        return view('livewire.driver.fuel-history', compact('transactions'));
    }
}
