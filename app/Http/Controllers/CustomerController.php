<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Users;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

        $request->validate(
            [
                'identity_number' => 'required|unique:customer,identity_number',
            ],
            [
                'identity_number.unique' => 'Nomor KTP sudah terdaftar.',
                'identity_number.required' => 'Nomor KTP wajib diisi.',
            ]
        );

        Customer::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'identity_number' => $request->identity_number
        ]);

        return redirect('/customer/alamat')->with('success', 'Alamat berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {

        $request->validate(
            [
                'identity_number' => 'required|unique:customer,identity_number',
            ],
            [
                'identity_number.unique' => 'Nomor KTP sudah terdaftar.',
                'identity_number.required' => 'Nomor KTP wajib diisi.',
            ]
        );
        
        $customer = Customer::find($id);

        $customer->update([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'identity_number' => $request->identity_number
        ]);

        return redirect('/customer/alamat')->with('success', 'Alamat berhasil diubah');
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect('/customer/alamat');
    }

    public function customer()
    {
        $customers = Customer::with('user')
            ->where('user_id', Auth::id())
            ->get();

        $users = Users::where('role', 'customer')->get();

        return view('customer.alamat.index', compact(
            'customers',
            'users'
        ));
    }
}
