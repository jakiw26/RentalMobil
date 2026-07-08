<?php

namespace App\Http\Controllers;

use App\Models\Vehicle_type;

use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
    public function index()
    {
        $vehicle_types = Vehicle_type::all();
        return view('admin.vehicletype.index', compact('vehicle_types'));
    }

    public function store(Request $request)
    {
        Vehicle_type::create([
            'name' => $request->name,
        ]);
        return redirect('/admin/vehicle_types');
    }

    public function update(Request $request, $id)
    {
        $vehicle_type = Vehicle_type::find($id);

        $vehicle_type->update([
            'name' => $request->name,
        ]);

        return redirect('/admin/vehicle_types');
    }

    public function destroy($id)
    {
        $vehicle_type = Vehicle_type::find($id);
        $vehicle_type->delete();
        return redirect('/admin/vehicle_types');
    }
}
