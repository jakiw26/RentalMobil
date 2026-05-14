<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rentals extends Model
{
    protected $table = 'rentals';
    protected $fillable = [
        'customer_id',
        'vehicle_id',
        'rent_date',
        'return_date',
        'total_price',
        'status'
    ];
}
