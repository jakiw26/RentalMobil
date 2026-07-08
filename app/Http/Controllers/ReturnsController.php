<?php

namespace App\Http\Controllers;

use App\Models\Returns;
use App\Models\Rentals;

use Illuminate\Http\Request;

class ReturnsController extends Controller
{

    public function index()
    {
        $returns = Returns::all();

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
}
