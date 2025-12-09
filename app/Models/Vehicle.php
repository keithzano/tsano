<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'make',
        'model',
        'registration_number',
        'year',
        'status',
        'rejection_reason',
        'registration_document',
        'insurance_document',
        'roadworthy_certificate',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fuelTransactions()
    {
        return $this->hasMany(FuelTransaction::class);
    }

    public function isApproved()
    {
        return $this->status === 'approved';
    }
}
