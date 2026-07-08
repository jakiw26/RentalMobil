<?php

namespace App\Models;
use App\Models\Rentals;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';
    protected $fillable = [
        'rental_id',
        'amount',
        'payment_method',
        'payment_date',
        'status'
    ];

    public function rental()
    {
        return $this->belongsTo(
            Rentals::class
        );
    }

}
