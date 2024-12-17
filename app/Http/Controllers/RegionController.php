<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Http\Requests\StoreRegionRequest;
use App\Http\Requests\UpdateRegionRequest;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_menu = "region";
        $region = Region::paginate(10);
        return view('region.index' , compact('region' , 'type_menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type_menu = "region";

        return view('region.create', compact('type_menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_region' => 'required'
        ]);

            Region::create($validatedData);
        return redirect(route('region.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Region $region)
    {
        $type_menu = "region";
        
        return view('region.edit', compact('region' , 'type_menu'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Region $region)
    {
        $type_menu = "region";

        $validatedData = $request->validate([
            'nama_region' => 'required', 
        ]);
        $region->update($validatedData);
        return redirect(route('region.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $region)
    {
        $region->delete();
        return redirect()->route('region.index');
    }
}
