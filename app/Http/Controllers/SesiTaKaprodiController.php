<?php

namespace App\Http\Controllers;

use App\Models\sesi;
use Illuminate\Http\Request;

class SesiTaKaprodiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sesis = sesi::orderBy('id', 'asc')->paginate(10);
        return view('kaprodi.sesi.index', ['sesi' => $sesis ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kaprodi.sesi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'mulai' => 'required',
            'selesai' => 'required',
            
        ]);
        sesi::create($validated);
        return redirect('sesi-ta-kaprodi');
    }

    /**
     * Display the specified resource.
     */
    public function show(sesi $sesi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('kaprodi.sesi.edit',['sesi'=>sesi::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'mulai' => 'required',
            'selesai' => 'required',
           
        ]);
        sesi::where('id',$id)->update($validated);
        return redirect('sesi-ta-kaprodi')->with('pesan','Data berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        sesi::destroy($id);
        return redirect('sesi-ta-kaprodi')->with('pesan','Data berhasil terhapus');
    }
}
