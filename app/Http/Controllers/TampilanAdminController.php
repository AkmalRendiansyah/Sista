<?php

namespace App\Http\Controllers;

use App\Models\jadwalta;
use App\Models\sidangta;
use App\Models\v_admin;
use App\Models\v_dosen;
use App\Models\v_kaprodi;
use App\Models\v_mahasiswa;
use Illuminate\Http\Request;

class TampilanAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {$jumlahAdmin = v_admin::count(); 
        $jumlahKaprodi = v_kaprodi::count(); 
        $jumlahDosen = v_dosen::count(); 
        $jumlahMahasiswa = v_mahasiswa::count(); 
        $jumlahDokumen = sidangta::count(); 
        $jumlahJadwal = jadwalta::count();
        return view('admin.dashboard.index', [
            'jumlahAdmin' => $jumlahAdmin,
            'jumlahDosen' => $jumlahDosen,
            'jumlahKaprodi' => $jumlahKaprodi,
            'jumlahMahasiswa' => $jumlahMahasiswa,
            'jumlahDokumen' => $jumlahDokumen,
            'jumlahJadwal' => $jumlahJadwal
        ]);
      
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
