<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'drivers_licence',
        'id_document',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
