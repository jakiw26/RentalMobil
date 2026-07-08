<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Customer;

class Users extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }
}
