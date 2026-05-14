<?php

namespace App\Models;

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
}
