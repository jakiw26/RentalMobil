<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicle';
    protected $fillable = [
        'brand',
        'model',
        'plate_number',
        'year',
        'status',
        'price_per_day',
    ];
}
