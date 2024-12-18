<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_menu = "user";
        $user = User::with(['id_kendaraans', 'drivers', 'atasan1s', 'atasan2s', 'asals', 'tujuans'])->paginate(10);
        return view('user.index', compact('user', 'type_menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type_menu = "user";

        $kendaraan = Kendaraan::all();
        $driver = User::where('level', 4)->get();
        $atasan2 = User::where('level', 3)->get();
        $atasan1 = User::where('level', 2)->get();
        $region = Region::all();


        return view('user.create', compact('type_menu', 'kendaraan', 'driver', 'atasan2', 'atasan1', 'region'));
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
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
            'asal' => 'required',
            'tujuan' => 'required',
        ]);

        User::create($validatedData);
        return redirect(route('user.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $type_menu = "user";

        $kendaraan = Kendaraan::all();
        $driver = User::where('level', 4)->get();
        $atasan2 = User::where('level', 3)->get();
        $atasan1 = User::where('level', 2)->get();
        $region = Region::all();

        return view('user.edit', compact('type_menu', 'pemesanan', 'kendaraan', 'driver', 'atasan2', 'atasan1', 'region'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'id_kendaraan' => 'required',
            'driver' => 'required',
            'atasan1' => 'required',
            'atasan2' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
            'asal' => 'required',
            'tujuan' => 'required',

        ]);

        $user->update($validatedData);
        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }
}
