<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\Vehicle;

use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index()
    {
        $maintenances = Maintenance::all();

        $vehicles = Vehicle::all();

        return view('admin.maintenance.index', compact(
            'maintenances',
            'vehicles'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([

            'vehicle_id' => 'required',
            'description' => 'required',
            'cost' => 'required|numeric',
            'service_date' => 'required|date',
            'status' => 'required|in:process,completed'

        ]);


        Maintenance::create([

            'vehicle_id' => $request->vehicle_id,
            'description' => $request->description,
            'cost' => $request->cost,
            'service_date' => $request->service_date,
            'status' => $request->status

        ]);


        return redirect('/admin/maintenance')
            ->with('success', 'Maintenance berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {

        $request->validate([

            'vehicle_id' => 'required',
            'description' => 'required',
            'cost' => 'required|numeric',
            'service_date' => 'required|date',
            'status' => 'required|in:process,completed'

        ]);


        $maintenance = Maintenance::findOrFail($id);


        $maintenance->update([

            'vehicle_id' => $request->vehicle_id,
            'description' => $request->description,
            'cost' => $request->cost,
            'service_date' => $request->service_date,
            'status' => $request->status

        ]);


        return redirect('/admin/maintenance')
            ->with('success', 'Maintenance berhasil diperbarui');
    }

    public function destroy($id)
    {
        $maintenance = Maintenance::find($id);
        $maintenance->delete();
        return redirect('/admin/maintenance');
    }

    public function customer()
    {
        $maintenances = Maintenance::all();

        $vehicles = Vehicle::all();

        return view('customer.maintenance.index', compact(
            'maintenances',
            'vehicles'
        ));
    }
}
