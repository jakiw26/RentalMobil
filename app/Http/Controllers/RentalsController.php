<?php

namespace App\Http\Controllers;

use App\Models\Rentals;
use App\Models\Customer;
use App\Models\Vehicle;
use App\Models\Driver;

use Illuminate\Http\Request;

class RentalsController extends Controller
{
    public function index()
    {
        $rentals = Rentals::all();
        $rentals = Rentals::with([
            'customer',
            'vehicle',
            'driver'
        ])->get();
        return view('admin.rental.index', compact('rentals'));
    }

    public function store(Request $request)
    {
        Rentals::create([
            'customer_id' => $request->customer_id,
            'driver_id' => $request->driver_id,
            'vehicle_id' => $request->vehicle_id,
            'rent_date' => $request->rent_date,
            'return_date' => $request->return_date,
            'total_price' => $request->total_price,
            'status' => $request->status,
        ]);
        return redirect('/customer/rentals');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected,finished'
        ]);


        $rental = Rentals::findOrFail($id);


        $rental->update([
            'status' => $request->status
        ]);


        return redirect('/admin/rentals')
            ->with('success', 'Status rental berhasil diperbarui');
    }

    public function destroy($id)
    {
        $rental = Rentals::find($id);
        $rental->delete();
        return redirect('/customer/rentals');
    }

    public function customer()
    {
        $rentals = Rentals::all();
        $rentals = Rentals::with([
            'customer',
            'vehicle',
            'driver'
        ])->get();

        $customers = Customer::all();
        $vehicles = Vehicle::where('status', 'available')->get();
        $drivers = Driver::where('status', 'available')->get();

        return view('customer.rental.index', compact('rentals', 'customers', 'vehicles', 'drivers'));
    }

    public function updatecust(Request $request, $id)
    {
        $request->validate([

            'customer_id' => 'required',
            'vehicle_id' => 'required',
            'driver_id' => 'nullable',
            'rent_date' => 'required|date',
            'return_date' => 'required|date',
            'total_price' => 'required|numeric',

        ]);


        $rental = Rentals::findOrFail($id);


        $rental->update([

            'customer_id' => $request->customer_id,
            'vehicle_id' => $request->vehicle_id,
            'driver_id' => $request->driver_id,
            'rent_date' => $request->rent_date,
            'return_date' => $request->return_date,
            'total_price' => $request->total_price,

        ]);


        return redirect('/customer/rentals')
            ->with('success', 'Rental berhasil diperbarui');
    }
}
