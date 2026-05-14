<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Returns extends Model
{
    protected $table = 'return';
    protected $fillable = [
        'rental_id',
        'return_date',
        'late_days',
        'fine'
    ];
}
