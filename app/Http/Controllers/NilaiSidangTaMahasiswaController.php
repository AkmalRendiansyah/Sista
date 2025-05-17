<?php

namespace App\Http\Controllers;

use App\Models\nilaiketua;
use App\Models\nilaipembimbing2;
use App\Models\nilaipenguji1;
use App\Models\nilaipenguji2;
use App\Models\nilaipenguji3;
use App\Models\nilaita;
use App\Models\nilaitamahasiswa;
use App\Models\v_dosen;
use App\Models\v_mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiSidangTaMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $mahasiswa = v_mahasiswa::where('nim', Auth::user()->nim)->first();
    if (!$mahasiswa) {
        // Jika mahasiswa tidak ditemukan, kembali ke view tanpa melakukan operasi
        return view('mahasiswa.nilaita.index')->with('error', 'Data mahasiswa tidak ditemukan.');
    }

    $nilai_ta = nilaita::where('id_mahasiswa', $mahasiswa->id)->orderBy('id', 'asc')->get();
    $nilai_ta_pem2 = nilaipembimbing2::where('id_mahasiswa', $mahasiswa->id)->orderBy('id', 'asc')->get();
    $nilai_ta_ketua = nilaiketua::where('id_mahasiswa', $mahasiswa->id)->orderBy('id', 'asc')->get();
    $nilai_ta_penguji1 = nilaipenguji1::where('id_mahasiswa', $mahasiswa->id)->orderBy('id', 'asc')->get();
    $nilai_ta_penguji2 = nilaipenguji2::where('id_mahasiswa', $mahasiswa->id)->orderBy('id', 'asc')->get();
    $nilai_ta_penguji3 = nilaipenguji3::where('id_mahasiswa', $mahasiswa->id)->orderBy('id', 'asc')->get();
    $dosen = v_dosen::orderBy('name', 'asc')->get();

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

    // Cek apakah data utama yang diperlukan tersedia
    $dataUtamaTersedia = $nilai_ta->isNotEmpty() && $nilai_ta_pem2->isNotEmpty() && $nilai_ta_ketua->isNotEmpty()
                         && $nilai_ta_penguji1->isNotEmpty() && $nilai_ta_penguji2->isNotEmpty() && $nilai_ta_penguji3->isNotEmpty();

    // Jika data utama tidak tersedia, langsung kembali ke view
    if (!$dataUtamaTersedia) {
        return view('mahasiswa.nilaita.index', compact('nilai_ta', 'dosen', 'nilai_ta_pem2', 'nilai_ta_ketua', 'nilai_ta_penguji1', 'nilai_ta_penguji2', 'nilai_ta_penguji3'));
    }

    // Simpan nilai total pembimbing jika semua data ditemukan
    nilaitamahasiswa::updateOrCreate(
        ['id_mahasiswa' => $mahasiswa->id],
        [
            'rata_pembimbing' => $ratapembimbing,
            'total_ketua' => $totalketua,
            'total_pembimbing1' => $totalpem1,
            'total_pembimbing2' => $totalpem2,
            'total_penguji1' => $totalpenguji1,
            'total_penguji2' => $totalpenguji2,
            'total_penguji3' => $totalpenguji3,
            'rata_penguji' => $ratapenguji,
            'nilai_akhir' => $nilaiakhir,
            'status' => $statusSidang,
            'id_pembimbing1' => $nilai_ta->first()->id_pembimbing1 ?? null,
            'id_pembimbing2' => $nilai_ta_pem2->first()->id_pembimbing2 ?? null,
            'id_ketua' => $nilai_ta_ketua->first()->id_ketua ?? null,
            'id_penguji1' => $nilai_ta_penguji1->first()->id_penguji1 ?? null,
            'id_penguji2' => $nilai_ta_penguji2->first()->id_penguji2 ?? null,
            'id_penguji3' => $nilai_ta_penguji3->first()->id_penguji3 ?? null,
            'komentar1' => $nilai_ta->first()->komentar ?? null,
            'komentar2' => $nilai_ta_pem2->first()->komentar ?? null,
            'komentar3' => $nilai_ta_ketua->first()->komentar ?? null,
            'komentar4' => $nilai_ta_penguji1->first()->komentar ?? null,
            'komentar5' => $nilai_ta_penguji2->first()->komentar ?? null,
            'komentar6' => $nilai_ta_penguji3->first()->komentar ?? null,
        ]
    );

    return view('mahasiswa.nilaita.index', compact('nilai_ta', 'dosen', 'nilai_ta_pem2', 'nilai_ta_ketua', 'nilai_ta_penguji1', 'nilai_ta_penguji2', 'nilai_ta_penguji3'));
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
