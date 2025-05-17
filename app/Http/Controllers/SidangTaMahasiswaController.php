<?php

namespace App\Http\Controllers;

use App\Models\nilaipembimbing2;
use App\Models\nilaita;
use App\Models\sidangta;
use App\Models\v_dosen;
use App\Models\v_kaprodi;
use App\Models\v_mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SidangTaMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = v_mahasiswa::where('nim', Auth::user()->nim)->first();
        $sidangta = sidangta::where('id_mahasiswa', $mahasiswa->id)
        ->orderBy('id', 'asc')
        ->get();
        $dosen = v_dosen::orderBy('name', 'asc')->get();
       
        $kaprodi = v_kaprodi::orderBy('name', 'asc')->get();
        $pembimbing2 = v_dosen::orderBy('name', 'asc')->get();

        return view('mahasiswa.sidangta.index', compact('sidangta', 'dosen','kaprodi','pembimbing2'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mahasiswa = v_mahasiswa::where('nim', Auth::user()->nim)->first();
        $v_dosens = v_dosen::all();
        $v_kaprodis = v_kaprodi::where('id_prodi', $mahasiswa->id_prodi)
        ->orderBy('id', 'asc')
        ->get();
        $pembimbing2s = v_dosen::all();
       
    
        return view('mahasiswa.sidangta.create', [
            'dosens' => $v_dosens,
            'kaprodis' => $v_kaprodis,
            'pembimbing2s' => $pembimbing2s,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'judul' => 'required',
            'id_pembimbing'=> 'required',
            'id_pembimbing2'=> 'required',
            'id_kaprodi'=> 'required',
            'proposal' => 'required|file|mimes:pdf',
            'laporanpkl' => 'required|file|mimes:pdf',
            'lembarbimbingan' => 'required|file|mimes:pdf',
            'laporanta' => 'required|file|mimes:pdf',
        ]);
        $mahasiswa = v_mahasiswa::where('nim', Auth::user()->nim)->first();
        if($request->hasFile('proposal')) {
            $namaFile='proposal'.time().'_'.$request->proposal->getClientOriginalName();
            $request->proposal->move('proposal-ta',$namaFile);
        }else{
            $namaFile='';
        }
        
        if($request->hasFile('laporanpkl')) {
            $laporanpkl='laporanpkl'.time().'_'.$request->laporanpkl->getClientOriginalName();
            $request->laporanpkl->move('laporan-pkl',$laporanpkl);
        }else{
            $laporanpkl='';
        }
        if($request->hasFile('lembarbimbingan')) {
            $lembarbimbingan='lembarbimbingan'.time().'_'.$request->lembarbimbingan->getClientOriginalName();
            $request->lembarbimbingan->move('lembar-bimbingan',$lembarbimbingan);
        }else{
            $lembarbimbingan='';
        }
        if($request->hasFile('laporanta')) {
            $laporanta='laporanta'.time().'_'.$request->laporanta->getClientOriginalName();
            $request->laporanta->move('laporan-ta',$laporanta);
        }else{
            $lembarbimbingan='';
        }

        $validatedData['proposal']=$namaFile;
        $validatedData['laporanpkl']=$laporanpkl;
        $validatedData['lembarbimbingan']=$lembarbimbingan;
        $validatedData['laporanta']=$laporanta;
        $validatedData['id_mahasiswa']=$mahasiswa->id;
        $validatedData['judul'];
         $validatedData['id_pembimbing']=$request->id_pembimbing;
         $validatedData['id_pembimbing2']=$request->id_pembimbing2;
         $validatedData['id_kaprodi']=$request->id_kaprodi;
        
        $sidangta = sidangta::create($validatedData);
        $idta = $sidangta->id;
    
        // Prepare data for nilaita table
        $data1 = [
            'id_ta' => $idta,
            'id_mahasiswa'=>$mahasiswa->id,
            'id_pembimbing2' => $request->id_pembimbing2,
        ];
    
        // Create new nilaita record
        nilaipembimbing2::create($data1);
        $data2 = [
            'id_ta' => $idta,
            'id_mahasiswa'=>$mahasiswa->id,
            'id_pembimbing1' => $request->id_pembimbing,
        ];
    
        // Create new nilaita record
        nilaita::create($data2);
    
    
    
        return redirect('sidang-ta-mahasiswa');
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
        sidangta::destroy($id);
        nilaipembimbing2::where('id_ta', $id)->delete();
        nilaita::where('id_ta', $id)->delete();
        return redirect('sidang-ta-mahasiswa')->with('pesan','Data berhasil terhapus');
    }
}
