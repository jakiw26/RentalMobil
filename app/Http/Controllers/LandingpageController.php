<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Vehicle;
use App\Models\Rentals;
use App\Models\Return;

use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function admin()
    {
        $totalCustomers = Customer::count();
        $totalVehicles = Vehicle::count();
        $pendingReturns = Rentals::doesntHave('return')->count();

        $activeRentals = Rentals::whereIn('status', [
            'pending',
            'approved'
        ])->count();

        return view('admin.index', compact('totalCustomers', 'totalVehicles', 'activeRentals', 'pendingReturns'));
    }

    public function customer()
    {
        return view('customer.index');
    }
}
