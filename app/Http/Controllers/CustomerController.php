<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Users;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        $customers = Customer::with('user')->get();
        return view('admin.customers.index', compact('customers'));
    }

    public function store(Request $request)
    {
        Customer::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'identity_number' => $request->identity_number
        ]);

        return redirect('/customer/alamat');
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);

        $customer->update([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'identity_number' => $request->identity_number
        ]);

        return redirect('/customer/alamat');
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect('/customer/alamat');
    }

    public function customer()
    {

        $customers = Customer::with('user')->get();
        $users = Users::where('role', 'customer')->get();

        return view('customer.alamat.index', compact(
            'customers',
            'users'
        ));
    }
}
