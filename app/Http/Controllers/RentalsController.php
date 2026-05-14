<?php

namespace App\Http\Controllers;

use App\Models\Rentals;
use Illuminate\Http\Request;

class RentalsController extends Controller
{
    public function index()
    {
        $rentals = Rentals::all();
        return view('admin.rental.index', compact('rentals'));
    }

    public function store(Request $request)
    {
        Rentals::create([
            'customer_id' => $request->customer_id,
            'vehicle_id' => $request->vehicle_id,
            'rent_date' => $request->rent_date,
            'return_date' => $request->return_date,
            'total_price' => $request->total_price,
            'status' => $request->status,
        ]);
        return redirect('/admin/rentals');
    }

    public function update(Request $request, $id)
    {
        $rental = Rentals::find($id);
        $rental->update([
            'customer_id' => $request->customer_id,
            'vehicle_id' => $request->vehicle_id,
            'rent_date' => $request->rent_date,
            'return_date' => $request->return_date,
            'total_price' => $request->total_price,
            'status' => $request->status,
        ]);
        return redirect('/admin/rentals');
    }

    public function destroy($id)
    {
        $rental = Rentals::find($id);
        $rental->delete();
        return redirect('/admin/rentals');
    }
}
