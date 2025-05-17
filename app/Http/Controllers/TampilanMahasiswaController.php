<?php

namespace App\Http\Controllers;

use App\Models\jadwalta;
use App\Models\nilaiketua;
use App\Models\nilaipembimbing2;
use App\Models\nilaipenguji1;
use App\Models\nilaipenguji2;
use App\Models\nilaipenguji3;
use App\Models\nilaita;
use App\Models\sidangta;
use App\Models\v_dosen;
use App\Models\v_kaprodi;
use App\Models\v_mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TampilanMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { $mahasiswa = v_mahasiswa::where('nim', Auth::user()->nim)->first();
        $sidang_ta = sidangta::where('id_mahasiswa', $mahasiswa->id)
        ->orderBy('id', 'asc')
        ->get();
        $kaprodi = v_kaprodi::orderBy('name', 'asc')->get();
        $pembimbing2 = v_dosen::orderBy('name', 'asc')->get();
        $nilai_ta = nilaita::where('id_mahasiswa', $mahasiswa->id)->orderBy('id', 'asc')->get();
        $nilai_ta_pem2 = nilaipembimbing2::where('id_mahasiswa', $mahasiswa->id)->orderBy('id', 'asc')->get();
        $nilai_ta_ketua = nilaiketua::where('id_mahasiswa', $mahasiswa->id)->orderBy('id', 'asc')->get();
        $nilai_ta_penguji1 = nilaipenguji1::where('id_mahasiswa', $mahasiswa->id)->orderBy('id', 'asc')->get();
        $nilai_ta_penguji2 = nilaipenguji2::where('id_mahasiswa', $mahasiswa->id)->orderBy('id', 'asc')->get();
        $nilai_ta_penguji3 = nilaipenguji3::where('id_mahasiswa', $mahasiswa->id)->orderBy('id', 'asc')->get();
       
    
        // Hitung nilai rata-rata dan total
        $ratapembimbing = ($nilai_ta_pem2->sum('total') + $nilai_ta->sum('total')) / 2;
        $totalpem1 = $nilai_ta->sum('total');
        $totalketua = $nilai_ta_ketua->sum('total');
        $totalpem2 = $nilai_ta_pem2->sum('total');
        $totalpenguji1 = $nilai_ta_penguji1->sum('total');
        $totalpenguji2 = $nilai_ta_penguji2->sum('total');
        $totalpenguji3 = $nilai_ta_penguji3->sum('total');
    
        $ratapenguji = ($totalketua + $totalpenguji1 + $totalpenguji2 + $totalpenguji3) / 4;
        $nilaiakhir = ($totalpem1 + $totalpem2 + $totalketua + $totalpenguji1 + $totalpenguji2 + $totalpenguji3) / 6;
        
        // Hitung jumlah penguji yang memberikan nilai >= 65
        $countLulus = 0;
        if ($totalketua >= 65) $countLulus++;
        if ($totalpenguji1 >= 65) $countLulus++;
        if ($totalpenguji2 >= 65) $countLulus++;
        if ($totalpenguji3 >= 65) $countLulus++;
        
        // Tentukan status sidang berdasarkan jumlah penguji yang memberikan nilai >= 65
        $statusSidang = ($countLulus >= 3) ? 'Lulus sidang' : 'Tidak lulus sidang';

        $jadwalta = jadwalta::where('id_mahasiswa', $mahasiswa->id)
         ->orderBy('id', 'asc')
         ->get();

        
        return view('mahasiswa.dashboard.index', [
            'status' => $sidang_ta,
            'nilaiakhir' => $nilaiakhir,
            'statussidang' => $statusSidang,
            'jadwalta' => $jadwalta
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
