<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Rentals;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function index()
    {
        $payments = Payment::with([
            'rental.customer',
            'rental.vehicle'
        ])->get();


        $rentals = Rentals::with([
            'customer',
            'vehicle'
        ])->get();


        return view('admin.payment.index', compact(
            'payments',
            'rentals'
        ));
    }

    public function store(Request $request)
    {
        Payment::create([
            'rental_id' => $request->rental_id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'payment_date' => $request->payment_date,
        ]);
        return redirect('/customer/payments');
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::find($id);
        $payment->update([
            'status' => $request->status
        ]);
        return redirect('/admin/payments');
    }

    public function destroy($id)
    {
        $payment = Payment::find($id);
        $payment->delete();
        return redirect('/customer/payments');
    }

    public function customer()
    {
        $customer = Customer::where('user_id', Auth::id())->first();

        $payments = Payment::with([
            'rental.customer',
            'rental.vehicle'
        ])
            ->whereHas('rental', function ($query) use ($customer) {
                $query->where('customer_id', $customer->id);
            })
            ->get();

        $rentals = Rentals::with([
            'customer',
            'vehicle'
        ])
            ->where('customer_id', $customer->id)
            ->get();

        return view('customer.payment.index', compact(
            'payments',
            'rentals'
        ));
    }

    public function updatecust(Request $request, $id)
    {
        $request->validate([
            'rental_id' => 'required',
            'amount' => 'required|numeric',
            'payment_method' => 'required',
            'proof' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $payment = Payment::findOrFail($id);

        $data = [
            'rental_id' => $request->rental_id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
        ];

        $payment->update($data);

        return redirect('/customer/payments')
            ->with('success', 'Payment berhasil diperbarui!');
    }
}
