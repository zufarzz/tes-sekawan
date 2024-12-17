<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Http\Requests\StorePemesananRequest;
use App\Http\Requests\UpdatePemesananRequest;
use App\Models\Kendaraan;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_menu = "pemesanan";
        $pemesanan = Pemesanan::with(['id_kendaraans', 'drivers', 'atasan1s', 'atasan2s', 'asals', 'tujuans'])->paginate(10);
        return view('pemesanan.index', compact('pemesanan', 'type_menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type_menu = "pemesanan";

        $kendaraan = Kendaraan::all();
        $driver = User::where('level', 4)->get();
        $atasan2 = User::where('level', 3)->get();
        $atasan1 = User::where('level', 2)->get();
        $region = Region::all();


        return view('pemesanan.create', compact('type_menu', 'kendaraan', 'driver', 'atasan2' , 'atasan1' , 'region' ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'id_kendaraan' => 'required', 
        'driver' => 'required', 
        'atasan1' => 'required', 
        'atasan2' => 'required', 
        'tanggal_mulai'=> 'required',
        'tanggal_akhir'=> 'required',
        'asal' => 'required',
        'tujuan'=>'required', 

        ]);

        pemesanan::create($validatedData);
        return redirect(route('pemesanan.index'));
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemesanan $pemesanan)
    {
        $type_menu = "pemesanan";

        $kendaraan = Kendaraan::all();
        $driver = User::where('level', 4)->get();
        $atasan2 = User::where('level', 3)->get();
        $atasan1 = User::where('level', 2)->get();
        $region = Region::all();
        
        return view('pemesanan.edit', compact('type_menu','pemesanan' , 'kendaraan', 'driver', 'atasan2' , 'atasan1' , 'region' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        $validatedData = $request->validate([
        'id_kendaraan' => 'required', 
        'driver' => 'required', 
        'atasan1' => 'required', 
        'atasan2' => 'required', 
        'tanggal_mulai'=> 'required',
        'tanggal_akhir'=> 'required',
        'asal' => 'required',
        'tujuan'=>'required',

        ]);

        $pemesanan->update($validatedData);
        return redirect(route('pemesanan.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemesanan $pemesanan)
    {
        $pemesanan->delete();
        return redirect()->route('pemesanan.index');
    }
}
