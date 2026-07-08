<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Rentals;

class Customer extends Model
{
    protected $table = 'customer';

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'address',
        'identity_number',
    ];

    // customer milik user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // customer mempunyai banyak rental
    public function rentals()
    {
        return $this->hasMany(Rentals::class);
    }
}
