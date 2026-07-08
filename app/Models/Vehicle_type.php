<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle_type extends Model
{
    protected $table = 'vehicle_type';
    protected $fillable = [
        'name',
    ];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
