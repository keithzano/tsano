<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\FuelTransaction;
use Livewire\WithPagination;

class AllTransactions extends Component
{
    use WithPagination;

    public function render()
    {
        $transactions = FuelTransaction::with(['user', 'vehicle'])
            ->latest('transaction_date')
            ->paginate(15);

        $totalAmount = FuelTransaction::sum('total_amount');
        $totalLitres = FuelTransaction::sum('litres');

        return view('livewire.admin.all-transactions', compact('transactions', 'totalAmount', 'totalLitres'));
    }
}
