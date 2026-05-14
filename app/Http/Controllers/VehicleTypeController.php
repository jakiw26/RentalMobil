<?php

namespace App\Http\Controllers;

use App\Models\VehicleType;

use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
    public function index()
    {
        $vehicle_types = VehicleType::all();
        return view('admin.vehicletype.index', compact('vehicle_types'));
    }

    public function store(Request $request)
    {
        VehicleType::create([
            'name' => $request->name,
        ]);
        return redirect('/admin/vehicle_types');
    }

    public function update(Request $request, $id)
    {
        $vehicle_type = VehicleType::find($id);

        $vehicle_type->update([
            'name' => $request->name,
        ]);

        return redirect('/admin/vehicle_types');
    }

    public function destroy($id)
    {
        $vehicle_type = VehicleType::find($id);
        $vehicle_type->delete();
        return redirect('/admin/vehicle_types');
    }
}
