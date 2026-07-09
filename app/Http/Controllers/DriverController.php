<?php

namespace App\Http\Controllers;

use App\Models\Driver;

use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::all();
        return view('admin.drivers.index', compact('drivers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'license_number' => 'required|unique:driver,license_number',
            'status' => 'required'
        ]);


        Driver::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'license_number' => $request->license_number,
            'status' => $request->status
        ]);


        return redirect('/admin/drivers')
            ->with('success', 'Driver berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'name' => 'required',

            'phone' => 'required',

            'license_number' =>
            'required|unique:driver,license_number,' . $id,

            'status' => 'required'

        ]);


        $driver = Driver::findOrFail($id);


        $driver->update([

            'name' => $request->name,

            'phone' => $request->phone,

            'license_number' => $request->license_number,

            'status' => $request->status

        ]);


        return redirect('/admin/drivers')
            ->with('success', 'Driver berhasil diperbarui');
    }

    public function destroy($id)
    {
        $driver = Driver::find($id);
        $driver->delete();
        return redirect('/admin/drivers');
    }

    public function customer()
    {
        $drivers = Driver::all();
        return view('customer.drivers.index', compact('drivers'));
    }
}
