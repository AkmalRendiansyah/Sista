<?php

namespace App\Http\Controllers;

use App\Models\sidangta;
use App\Models\v_dosen;
use App\Models\v_kaprodi;
use App\Models\v_mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KetuaSidangTaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosens = v_dosen::where('nidn', Auth::user()->nidn)->first();
        $sidangta = sidangta::where('id_pembimbing', $dosens->id)
        ->orderBy('id', 'asc')
        ->get();
        $dosen = v_dosen::orderBy('name', 'asc')->get();
       
        $kaprodi = v_kaprodi::orderBy('name', 'asc')->get();
        $pembimbing2 = v_dosen::orderBy('name', 'asc')->get();
        $mahasiswa = v_mahasiswa::orderBy('name', 'asc')->get();

        return view('dosen.ketuasidangta.index', compact('sidangta', 'dosen','kaprodi','pembimbing2','mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        return view('dosen.ketuasidangta.edit',['sidang'=>sidangta::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'komentar' => 'required',
            'status' => 'required',
           
        ]);
        sidangta::where('id',$id)->update($validated);
        return redirect('ketua-sidang-ta')->with('pesan','Data berhasil update');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
