<?php

namespace App\Models;
use App\Models\Maintenance;
use App\Models\Rentals;
use App\Models\VehicleType;



use Illuminate\Database\Eloquent\Model;


class Vehicle extends Model
{
    protected $table = 'vehicle';
    protected $fillable = [
        'vehicle_type_id',
        'brand',
        'model',
        'plate_number',
        'year',
        'status',
        'price_per_day',
    ];

    // kendaraan punya satu tipe
    public function vehicleType()
    {
        return $this->belongsTo(
            Vehicle_type::class
        );
    }



    // kendaraan memiliki banyak rental
    public function rentals()
    {
        return $this->hasMany(
            Rentals::class
        );
    }

    // kendaraan memiliki banyak maintenance
    public function maintenances()
    {
        return $this->hasMany(
            Maintenance::class
        );
    }
}
