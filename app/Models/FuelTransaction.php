<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuelTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vehicle_id',
        'litres',
        'price_per_litre',
        'total_amount',
        'transaction_date',
        'status',
        'notes',
    ];

    protected $casts = [
        'transaction_date' => 'date',
        'litres' => 'decimal:2',
        'price_per_litre' => 'decimal:2',
        'total_amount' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
