<?php

namespace App\Http\Controllers;

use App\Models\jadwalta;
use App\Models\ruang;
use App\Models\sesi;
use App\Models\v_dosen;
use App\Models\v_mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalSidangTaMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        
         $ruang = ruang::OrderBy('ruang', 'asc')->get();
         $mahasiswa = v_mahasiswa::OrderBy('name', 'asc')->get();
         $mulaisesi = sesi::OrderBy('mulai', 'asc')->get();
         $selesaisesi = sesi::OrderBy('selesai', 'asc')->get();
         $pembimbing1 = v_dosen::OrderBy('name', 'asc')->get();
         $pembimbing2 = v_dosen::OrderBy('name', 'asc')->get();
         $penguji = v_dosen::OrderBy('name', 'asc')->get();
         $mahasiswa = v_mahasiswa::where('nim', Auth::user()->nim)->first();
         $jadwalta = jadwalta::where('id_mahasiswa', $mahasiswa->id)
         ->orderBy('id', 'asc')
         ->get();
         
         
 
          return view('mahasiswa.jadwalsidang.index',compact('jadwalta', 'ruang','mahasiswa','mulaisesi','selesaisesi','pembimbing1','pembimbing2','penguji'));
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
