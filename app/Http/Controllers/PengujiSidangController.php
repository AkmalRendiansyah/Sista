<?php

namespace App\Http\Controllers;

use App\Models\jadwalproposal;
use App\Models\ruang;
use App\Models\sesi;
use App\Models\v_dosen;
use App\Models\v_kaprodi;
use App\Models\v_mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengujiSidangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosens = v_dosen::where('nidn', Auth::user()->nidn)->first();
        $jadwalproposal = jadwalproposal::where('id_penguji', $dosens->id)
        ->orderBy('id', 'asc')
        ->get();
        $dosen = v_dosen::orderBy('name', 'asc')->get();
       
        $kaprodi = v_kaprodi::orderBy('name', 'asc')->get();
        $pembimbing2 = v_dosen::orderBy('name', 'asc')->get();
        $mahasiswa = v_mahasiswa::orderBy('name', 'asc')->get();

        return view('dosen.penguji.index', compact('jadwalproposal', 'dosen','kaprodi','pembimbing2','mahasiswa'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
