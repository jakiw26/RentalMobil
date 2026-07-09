<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Rentals;

class LaporanController extends Controller
{
     public function index()
    {
        $rentals = Rentals::all();
        $rentals = Rentals::with([
            'customer',
            'vehicle',
            'driver',
            'return'
        ])->get();
        return view('admin.laporan.index', compact('rentals'));
    }
}
