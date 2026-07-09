<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\Customer;
use App\Models\Vehicle;
use App\Models\Rentals;
use App\Models\Return;
use App\Models\Driver;
use App\Models\Maintenance;
use App\Models\Payment;


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

        $rentalChart = DB::table('rentals')
            ->join('vehicle', 'rentals.vehicle_id', '=', 'vehicle.id')
            ->select(
                DB::raw("CONCAT(vehicle.brand,' ',vehicle.model) as vehicle"),
                DB::raw('COUNT(rentals.id) as total')
            )
            ->groupBy('vehicle.brand', 'vehicle.model')
            ->get();

        $maintenanceChart = DB::table('maintenance')
            ->join('vehicle', 'maintenance.vehicle_id', '=', 'vehicle.id')
            ->select(
                DB::raw("CONCAT(vehicle.brand,' ',vehicle.model) as vehicle"),
                DB::raw('COUNT(maintenance.id) as total')
            )
            ->groupBy('vehicle.brand', 'vehicle.model')
            ->get();
        return view('admin.index', compact('totalCustomers', 'totalVehicles', 'activeRentals', 'pendingReturns', 'rentalChart', 'maintenanceChart'));
    }

    public function customer()
    {
        $totalVehicles = Vehicle::count();
        $totalDrivers = Driver::count();
        $totalMaintenance = Maintenance::count();
        $BelumLunas = Payment::where('status', 'pending')->count();

        return view('customer.index', compact('totalVehicles', 'totalDrivers', 'totalMaintenance', 'BelumLunas'));
    }
}
