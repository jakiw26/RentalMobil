<?php

namespace App\Http\Controllers;

use App\Models\Returns;
use App\Models\Rentals;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ReturnsController extends Controller
{

    public function index()
    {
        // Cek rental yang sudah melewati batas pengembalian
        $expiredRentals = Rentals::whereDate('return_date', '<', now())
            ->whereDoesntHave('return')
            ->get();

        foreach ($expiredRentals as $rental) {

            $lateDays = Carbon::parse($rental->return_date)
                ->diffInDays(now());

            $fine = $lateDays * 50000; // Denda Rp50.000 per hari

            Returns::create([
                'rental_id'  => $rental->id,
                'return_date' => now()->toDateString(), // atau null jika kolom boleh kosong
                'late_days'  => $lateDays,
                'fine'       => $fine,
            ]);
        }

        $returns = Returns::with([
            'rental.customer',
            'rental.vehicle'
        ])->get();

        $rentals = Rentals::with([
            'customer',
            'vehicle'
        ])->get();

        return view('admin.returns.index', compact(
            'returns',
            'rentals'
        ));
    }

    public function store(Request $request)
    {
        Returns::create([
            'rental_id' => $request->rental_id,
            'return_date' => $request->return_date,
            'late_days' => $request->late_days,
            'fine' => $request->fine
        ]);
        return redirect('/admin/returns');
    }

    public function update(Request $request, $id)
    {
        $return = Returns::find($id);
        $return->update([
            'rental_id' => $request->rental_id,
            'return_date' => $request->return_date,
            'late_days' => $request->late_days,
            'fine' => $request->fine
        ]);
        return redirect('/admin/returns');
    }

    public function destroy($id)
    {
        $return = Returns::find($id);
        $return->delete();
        return redirect('/admin/returns');
    }

    public function customer()
    {
        $returns = Returns::all();

        $rentals = Rentals::with([
            'customer',
            'vehicle'
        ])->get();

        $returns = Returns::with('rental.customer')->get();

        return view('customer.returns.index', compact(
            'returns',
            'rentals'
        ));
    }
}
