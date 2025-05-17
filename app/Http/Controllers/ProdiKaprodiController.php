<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiKaprodiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodis = Prodi::orderBy('id', 'asc')->paginate(10);
        return view('kaprodi.prodi.index', ['prodi' => $prodis ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kaprodi.prodi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_prodi' => 'required',
            
        ]);
        Prodi::create($validated);
        return redirect('prodi-kaprodi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('kaprodi.prodi.edit',['prodi'=>Prodi::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_prodi' => 'required',
           
        ]);
        Prodi::where('id',$id)->update($validated);
        return redirect('prodi-kaprodi')->with('pesan','Data berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Prodi::destroy($id);
        return redirect('prodi-kaprodi')->with('pesan','Data berhasil terhapus');
    }
}
