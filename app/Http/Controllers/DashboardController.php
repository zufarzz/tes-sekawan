<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        $type_menu = "dashboard";
        if (auth()->user()->level = 4) {
            $pemesanan = Pemesanan::where('driver', auth()->user()->id);
        } elseif (auth()->user()->level = 3) {
            $pemesanan = Pemesanan::where('atasan1', auth()->user()->id);
        } elseif (auth()->user()->level = 2) {
            $pemesanan = Pemesanan::where('atasan2', auth()->user()->id);
        } else {
            $pemesanan = Pemesanan::all();
        }
        return view('dashboard', compact('type_menu'));
    }
}
