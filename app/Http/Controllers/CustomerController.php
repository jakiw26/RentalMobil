<?php

namespace App\Http\Controllers;

use App\Models\Customer;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customers.index', compact('customers'));
    }

    public function store(Request $request)
    {
        Customer::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'identity_number' => $request->identity_number
        ]);

        return redirect('/admin/customers');
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        
        $customer->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'identity_number' => $request->identity_number
        ]);

        return redirect('/admin/customers');
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect('/admin/customers');
    }
}
