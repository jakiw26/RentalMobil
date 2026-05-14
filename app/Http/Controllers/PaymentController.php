<?php

namespace App\Http\Controllers;

use App\Models\Payment;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    
    public function index()
    {
        $payments = Payment::all();
        return view('admin.payment.index', compact('payments'));
    }

    public function store(Request $request)
    {
        Payment::create([
            'rental_id' => $request->rental_id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'payment_date' => $request->payment_date,
            'status' => $request->status
        ]);
        return redirect('/admin/payments');
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::find($id);
        $payment -> update([
            'rental_id' => $request->rental_id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'payment_date' => $request->payment_date,
            'status' => $request->status
        ]);
        return redirect('/admin/payments');
    }

    public function destroy($id)
    {
        $payment = Payment::find($id);
        $payment->delete();
        return redirect('/admin/payments');
    }

}
