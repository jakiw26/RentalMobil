<?php

namespace App\Models;

use App\Models\Rentals;

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

    public function rental()
    {
        return $this->belongsTo(Rentals::class, 'rental_id');
    }
}
