<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Http\Requests\StoreKendaraanRequest;
use App\Http\Requests\UpdateKendaraanRequest;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kendaraan = Kendaraan::all();
        return view('kendaraan.index', compact('kendaraan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kendaraan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jenis' => 'required', 
        'kepemilikan' => 'required', 
        'nama_kendaraan' => 'required', 
        'konsumsi_bbm' => 'required', 
        'jadwal_servis' => 'required'
        ]);

        Kendaraan::create($validatedData);
        return redirect(route('kendaraan.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Kendaraan $kendaraan)
    {
        return view('kendaraan.show', compact('kendaraan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kendaraan $kendaraan)
    {
        return view('kendaraan.edit', compact('kendaraan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kendaraan $kendaraan)
    {
        $validatedData = $request->validate([
            'jenis' => 'required', 
        'kepemilikan' => 'required', 
        'nama_kendaraan' => 'required', 
        'konsumsi_bbm' => 'required', 
        'jadwal_servis' => 'required'
        ]);

        $kendaraan->update($validatedData);
        return redirect(route('kendaraan.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kendaraan $kendaraan)
    {
        $kendaraan->delete();
        return redirect()->route('kendaraan.index');
    }
}
