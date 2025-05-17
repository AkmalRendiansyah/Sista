<?php

namespace App\Http\Controllers;

use App\Models\nilaiketua;
use App\Models\nilaita;
use App\Models\v_dosen;
use App\Models\v_kaprodi;
use App\Models\v_mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiKetuaSidangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosens = v_dosen::where('nidn', Auth::user()->nidn)->first();
        $nilaisidang = nilaiketua::where('id_ketua', $dosens->id)
        ->orderBy('id', 'asc')
        ->get();
        $dosen = v_dosen::orderBy('name', 'asc')->get();
       
        $kaprodi = v_kaprodi::orderBy('name', 'asc')->get();
        $pembimbing2 = v_dosen::orderBy('name', 'asc')->get();
        $mahasiswa = v_mahasiswa::orderBy('name', 'asc')->get();

        return view('dosen.nilaiketua.index', compact('nilaisidang', 'dosen','kaprodi','pembimbing2','mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      
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
        return view('dosen.nilaiketua.edit',['nilai'=>nilaiketua::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'sikap' => 'required|numeric',
            'kesimpulan' => 'required|numeric',
            'komunikasi' => 'required|numeric',
            'penguasaan_materi' => 'required|numeric',
            'identifikasi_masalah' => 'required|numeric',
            'relevansi_teori' => 'required|numeric',
            'metode' => 'required|numeric',
            'hasil' => 'required|numeric',
            'penggunaan_bahasa' => 'required|numeric',
           'komentar' ,
            'kesesuaian' => 'required|numeric',
            
        ]);
        $totalNilai = ($request->input('sikap') * 0.05)
        + ($request->input('komunikasi') * 0.05)
        + ($request->input('penguasaan_materi') * 0.2)
        + ($request->input('identifikasi_masalah') * 0.05)
        + ($request->input('relevansi_teori') * 0.05)
        + ($request->input('metode') * 0.1)
        + ($request->input('hasil') * 0.15)
        + ($request->input('kesimpulan') * 0.05)
        + ($request->input('penggunaan_bahasa') * 0.05)
        + ($request->input('kesesuaian') * 0.25);

    // Menambahkan total nilai ke array data yang divalidasi
    $validated['total'] = $totalNilai;
    $validated['komentar'] = $request->komentar;

     
    
        nilaiketua::where('id',$id)->update($validated);
        
        return view('dosen.nilaiketua.edit',['nilai'=>nilaiketua::find($id)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
