<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $table = 'maintenance';
    protected $fillable = [
        'vehicle_id',
        'description',
        'cost',
        'service_date',
        'status'
    ];

    public function vehicle()
    {
        return $this->belongsTo(
            Vehicle::class
        );
    }
}
