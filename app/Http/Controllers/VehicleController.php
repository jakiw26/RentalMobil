<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Vehicle_type;

use Illuminate\Http\Request;

class VehicleController extends Controller
{

    public function index()
    {
        $vehicles = Vehicle::all();
         $vehicleTypes = Vehicle_type::all();
        return view('admin.vehicle.index', compact('vehicles', 'vehicleTypes'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'vehicle_type_id' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'plate_number' => 'required',
            'year' => 'required|digits:4|integer',
            'status' => 'required',
            'price_per_day' => 'required|numeric',
        ]);

        Vehicle::create([
            'vehicle_type_id' => $request->vehicle_type_id,
            'brand' => $request->brand,
            'model' => $request->model,
            'plate_number' => $request->plate_number,
            'year' => $request->year,
            'status' => $request->status,
            'price_per_day' => $request->price_per_day
        ]);

        return redirect('/admin/vehicle');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'vehicle_type_id' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'plate_number' => 'required',
            'year' => 'required|digits:4|integer',
            'status' => 'required',
            'price_per_day' => 'required|numeric',
        ]);

        $vehicle = Vehicle::find($id);

        $vehicle->update([
            'vehicle_type_id' => $request->vehicle_type_id,
            'brand' => $request->brand,
            'model' => $request->model,
            'plate_number' => $request->plate_number,
            'year' => $request->year,
            'status' => $request->status,
            'price_per_day' => $request->price_per_day
        ]);

        return redirect('/admin/vehicle');
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
        return redirect('/admin/vehicle');
    }
}
