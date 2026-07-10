<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\Payment;
use App\Models\Return;

use Illuminate\Database\Eloquent\Model;

class Rentals extends Model
{
    protected $table = 'rentals';
    protected $fillable = [
        'customer_id',
        'vehicle_id',
        'driver_id',
        'rent_date',
        'return_date',
        'total_price',
        'status'
    ];

    // Rental milik satu customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }



    // Rental menggunakan satu kendaraan
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }



    // Rental menggunakan driver (optional)
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }



    // Rental memiliki satu pembayaran
    public function payment()
    {
        return $this->hasOne(Payment::class, 'rental_id');
    }



    // Rental memiliki satu pengembalian
    public function return()
    {
        return $this->hasOne(Returns::class, 'rental_id');
    }
}
