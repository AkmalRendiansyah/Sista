<?php

namespace App\Http\Controllers;

use App\Models\proposalta;
use App\Models\v_dosen;
use App\Models\v_kaprodi;
use App\Models\v_mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class  ValidasiProposalKaprodiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kaprodi = v_kaprodi::where('nidn', Auth::user()->nidn)->first();
        $proposal_ta = proposalta::where('id_kaprodi', $kaprodi->id)
        ->orderBy('id', 'asc')
        ->get();
        $kaprodis = v_kaprodi::orderBy('name', 'asc')->get();
        $mahasiswa = v_mahasiswa::orderBy('name', 'asc')->get();

        return view('kaprodi.validasiproposal.index', compact('proposal_ta', 'kaprodis'));
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
        return view('kaprodi.validasiproposal.edit',['proposal'=>proposalta::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'komentar3' => 'required',
            'status_kaprodi' => 'required',
           
        ]);
        proposalta::where('id',$id)->update($validated);
        return redirect('validasi-proposal-kaprodi')->with('pesan','Data berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
