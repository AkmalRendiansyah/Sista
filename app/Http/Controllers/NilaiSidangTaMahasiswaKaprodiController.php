<?php

namespace App\Http\Controllers;

use App\Models\nilaiketua;
use App\Models\nilaipembimbing2;
use App\Models\nilaipenguji1;
use App\Models\nilaipenguji2;
use App\Models\nilaipenguji3;
use App\Models\nilaita;
use App\Models\nilaitamahasiswa;
use App\Models\sidangta;
use App\Models\v_dosen;
use App\Models\v_mahasiswa;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;


class NilaiSidangTaMahasiswaKaprodiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $nilaisidang = sidangta::all();
        $nilaipem1 = nilaita::all();
        $nilaipem2 = nilaipembimbing2::all();
        $nilaiketua = nilaiketua::all();
        $nilaipenguji1 = nilaipenguji1::all();
        $nilaipenguji2 = nilaipenguji2::all();
        $nilaipenguji3 = nilaipenguji3::all();
        $dosen = v_dosen::orderBy('name', 'asc')->get();
       
       
        return view('kaprodi.nilaisidang.index', compact('nilaisidang', 'dosen','nilaipem1','nilaipem2','nilaiketua','nilaipenguji1','nilaipenguji2','nilaipenguji3'));
    }
    
    // public function cetaknilaimahasiswa()
    // { 
    //     $nilaisidang = sidangta::all();
    //     $nilaipem1 = nilaita::all();
    //     $nilaipem2 = nilaipembimbing2::all();
    //     $nilaiketua = nilaiketua::all();
    //     $nilaipenguji1 = nilaipenguji1::all();
    //     $nilaipenguji2 = nilaipenguji2::all();
    //     $nilaipenguji3 = nilaipenguji3::all();
    //     $dosen = v_dosen::orderBy('name', 'asc')->get();
       
       
    //     return view('kaprodi.nilaisidang.index', compact('nilaisidang', 'dosen','nilaipem1','nilaipem2','nilaiketua','nilaipenguji1','nilaipenguji2','nilaipenguji3'));
    // }

    public function cetakPDF($id)
    {
        // Mengambil data sidang berdasarkan $id_mahasiswa yang diberikan
        $sidang = sidangta::where('id_mahasiswa', $id)->get();
    
        // Memastikan $sidang terhubung dengan mahasiswa
       
    
        // Jika $mahasiswa tidak ditemukan, bisa di-handle sesuai kebutuhan
    
        // Mengambil nilai-nilai TA terkait dengan mahasiswa ini
        $nilai_ta = nilaita::where('id_mahasiswa', $id)->get();
        $sidang_ta = sidangta::where('id_mahasiswa', $id)->get();
        $nilai_ta_pem2 = nilaipembimbing2::where('id_mahasiswa', $id)->get();
        $nilai_ta_ketua = nilaiketua::where('id_mahasiswa', $id)->get();
        $nilai_ta_penguji1 = nilaipenguji1::where('id_mahasiswa', $id)->get();
        $nilai_ta_penguji2 = nilaipenguji2::where('id_mahasiswa', $id)->get();
        $nilai_ta_penguji3 = nilaipenguji3::where('id_mahasiswa', $id)->get();
    
        // Mendapatkan daftar dosen
        $dosen = v_dosen::orderBy('name', 'asc')->get();
       
    
        // Mengirimkan data ke view 'kaprodi.nilaisidang.pdf'
    
        $pdf = PDF::loadView('kaprodi.nilaisidang.cetaknilaimahasiswa',compact('sidang_ta','nilai_ta', 'dosen', 'nilai_ta_pem2', 'nilai_ta_ketua', 'nilai_ta_penguji1', 'nilai_ta_penguji2', 'nilai_ta_penguji3'));
        // Mengatur nama file PDF yang akan diunduh
        foreach ($nilai_ta as $nilai) {
            $namaFile = 'nilai_sidang_ta_' . $nilai->mahasiswa->name . '.pdf';
            // Lakukan sesuatu dengan $namaFile
        }
    
        // Mengunduh PDF
        return $pdf->download($namaFile);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function pem1($id)
    {
        // Mengambil nilai sidang berdasarkan id_mahasiswa yang diberikan dari route
        $nilaisidang = Nilaita::where('id', $id)->get();
    
        // Ambil data dosen untuk ditampilkan (asumsi VDosen adalah model yang sesuai)
        $dosen = v_dosen::orderBy('name', 'asc')->get();
    
        return view('kaprodi.nilaisidang.pem1', compact('nilaisidang', 'dosen'));
    }
    public function pem2($id)
    {
        // Mengambil nilai sidang berdasarkan id_mahasiswa yang diberikan dari route
        $nilaisidang = nilaipembimbing2::where('id', $id)->get();
    
        // Ambil data dosen untuk ditampilkan (asumsi VDosen adalah model yang sesuai)
        $dosen = v_dosen::orderBy('name', 'asc')->get();
    
        return view('kaprodi.nilaisidang.pem2', compact('nilaisidang', 'dosen'));
    }
    public function ketua($id)
    {
        // Mengambil nilai sidang berdasarkan id_mahasiswa yang diberikan dari route
        $nilaisidang = nilaiketua::where('id', $id)->get();
    
        // Ambil data dosen untuk ditampilkan (asumsi VDosen adalah model yang sesuai)
        $dosen = v_dosen::orderBy('name', 'asc')->get();
    
        return view('kaprodi.nilaisidang.ketua', compact('nilaisidang', 'dosen'));
    }
    public function penguji1($id)
    {
        // Mengambil nilai sidang berdasarkan id_mahasiswa yang diberikan dari route
        $nilaisidang = nilaipenguji1::where('id', $id)->get();
    
        // Ambil data dosen untuk ditampilkan (asumsi VDosen adalah model yang sesuai)
        $dosen = v_dosen::orderBy('name', 'asc')->get();
    
        return view('kaprodi.nilaisidang.penguji1', compact('nilaisidang', 'dosen'));
    }
    public function penguji2($id)
    {
        // Mengambil nilai sidang berdasarkan id_mahasiswa yang diberikan dari route
        $nilaisidang = nilaipenguji2::where('id', $id)->get();
    
        // Ambil data dosen untuk ditampilkan (asumsi VDosen adalah model yang sesuai)
        $dosen = v_dosen::orderBy('name', 'asc')->get();
    
        return view('kaprodi.nilaisidang.penguji2', compact('nilaisidang', 'dosen'));
    }
    public function penguji3($id)
    {
        // Mengambil nilai sidang berdasarkan id_mahasiswa yang diberikan dari route
        $nilaisidang = nilaipenguji3::where('id', $id)->get();
    
        // Ambil data dosen untuk ditampilkan (asumsi VDosen adalah model yang sesuai)
        $dosen = v_dosen::orderBy('name', 'asc')->get();
    
        return view('kaprodi.nilaisidang.penguji3', compact('nilaisidang', 'dosen'));
    }
   
    public function total($id)
    {
        // Mengambil data sidang berdasarkan $id yang diberikan
        $sidang = sidangta::where('id_mahasiswa', $id)->get();
    
        // Memastikan $sidang terhubung dengan mahasiswa
       
    
        // Jika $mahasiswa tidak ditemukan, bisa di-handle sesuai kebutuhan
    
        // Mengambil nilai-nilai TA terkait dengan mahasiswa ini
        $nilai_ta = nilaita::where('id_mahasiswa', $id)->get();
        $nilai_ta_pem2 = nilaipembimbing2::where('id_mahasiswa', $id)->get();
        $nilai_ta_ketua = nilaiketua::where('id_mahasiswa', $id)->get();
        $nilai_ta_penguji1 = nilaipenguji1::where('id_mahasiswa', $id)->get();
        $nilai_ta_penguji2 = nilaipenguji2::where('id_mahasiswa', $id)->get();
        $nilai_ta_penguji3 = nilaipenguji3::where('id_mahasiswa', $id)->get();
    
        // Mendapatkan daftar dosen
        $dosen = v_dosen::orderBy('name', 'asc')->get();
    
        // Mengirimkan data ke view
        return view('kaprodi.nilaisidang.keseluruhan', compact('nilai_ta', 'dosen', 'nilai_ta_pem2', 'nilai_ta_ketua', 'nilai_ta_penguji1', 'nilai_ta_penguji2', 'nilai_ta_penguji3'));
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
        
        return view('kaprodi.nilaisidang.keseluruhan',['nilai'=>nilaitamahasiswa::find($id)]);
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
