<?php

namespace App\Http\Controllers;

use App\Models\ruang;
use Illuminate\Http\Request;

class RuangKaprodiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruangs = ruang::orderBy('id', 'asc')->paginate(10);
        return view('kaprodi.ruang.index', ['ruang' => $ruangs ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kaprodi.ruang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'ruang' => 'required',
            
        ]);
        ruang::create($validated);
        return redirect('ruang-kaprodi');
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
        return view('kaprodi.ruang.edit',['ruang'=>ruang::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'ruang' => 'required',
           
        ]);
        ruang::where('id',$id)->update($validated);
        return redirect('ruang-kaprodi')->with('pesan','Data berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ruang::destroy($id);
        return redirect('ruang-kaprodi')->with('pesan','Data berhasil terhapus');
    }
}
