<?php

namespace App\Http\Controllers;

use App\Models\jadwalproposal;
use App\Models\proposalta;
use App\Models\ruang;
use App\Models\sesi;
use App\Models\v_dosen;
use App\Models\v_mahasiswa;
use Illuminate\Http\Request;

class JadwalProposalKaprodiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwalproposal = jadwalproposal::orderBy('id', 'asc')->get();
        $ruang = ruang::OrderBy('ruang', 'asc')->get();
        $mahasiswa = v_mahasiswa::OrderBy('name', 'asc')->get();
        $mulaisesi = sesi::OrderBy('mulai', 'asc')->get();
        $selesaisesi = sesi::OrderBy('selesai', 'asc')->get();
        $pembimbing1 = v_dosen::OrderBy('name', 'asc')->get();
        $pembimbing2 = v_dosen::OrderBy('name', 'asc')->get();
        $penguji = v_dosen::OrderBy('name', 'asc')->get();
        

         return view('kaprodi.jadwalproposal.index',compact('jadwalproposal', 'ruang','mahasiswa','mulaisesi','selesaisesi','pembimbing1','pembimbing2','penguji'));
       
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosens = v_dosen::all();
        $ruangs = ruang::all();
        $sesis = sesi::all();
        $proposals = proposalta::all();
        $mahasiswas = v_mahasiswa::all();
    
        return view('kaprodi.jadwalproposal.create', [
            'dosens' => $dosens,
            'ruangs' => $ruangs,
            'sesis' => $sesis,
            'proposaltas' => $proposals,
            'mahasiswas' => $mahasiswas,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_proposal'=>'required',
            'id_mahasiswa'=>'required',
            'tanggal' => 'required',
            'judul' => 'required',
            'id_ruang'=> 'required',
            'id_sesi'=> 'required',
            'id_pembimbing1'=> 'required',
            'id_pembimbing2'=> 'required',
            'penguji'=> 'required'
        ]);
        $data['id_proposal']        = $request->id_proposal;
        $data['id_mahasiswa']        = $request->id_mahasiswa;
        $data['tanggal']       = $request->tanggal;
        $data['judul']       = $request->judul;
        $data['id_ruang']       = $request->id_ruang;
        $data['id_sesi']       = $request->id_sesi;
        $data['id_pembimbing1']       = $request->id_pembimbing1;
        $data['id_pembimbing2']       = $request->id_pembimbing2;
        $data['id_penguji']       = $request->penguji;
       
        $datasama = jadwalproposal::where('tanggal', $data['tanggal'])
    ->where('id_ruang', $data['id_ruang'])
    ->where('id_sesi', $data['id_sesi'])
    ->count();
    if ($datasama > 0) {
        // Set flash message for error
        session()->flash('error', 'Jadwal proposal untuk tanggal, ruang, dan sesi tersebut sudah ada.');

        // Redirect back to form
        return redirect('/jadwal-proposal-kaprodi');
    }

    // Create new proposal schedule
    jadwalproposal::create($data);

    // Redirect on successful creation
    return redirect('/jadwal-proposal-kaprodi');
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
        $dosens = v_dosen::all();
        $ruangs = ruang::all();
        $sesis = sesi::all();
        $proposals = proposalta::all();
        $jadwals = jadwalproposal::find($id);
        $mahasiswas = v_mahasiswa::all();
        return view('kaprodi.jadwalproposal.edit', [
            'dosens' => $dosens,
            'ruangs' => $ruangs,
            'sesis' => $sesis,
            'proposaltas' => $proposals,
            'mahasiswas' => $mahasiswas,
            'jadwals' => $jadwals]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
           
            'tanggal' => 'required',
            'id_ruang'=> 'required',
            'id_sesi'=> 'required',
            'id_pembimbing1'=> 'required',
            'id_pembimbing2'=> 'required',
            'id_penguji'=> 'required'
        ]);
    
     
        $data['tanggal']       = $request->tanggal;
        $data['id_ruang']       = $request->id_ruang;
        $data['id_sesi']       = $request->id_sesi;
        $data['id_pembimbing1']       = $request->id_pembimbing1;
        $data['id_pembimbing2']       = $request->id_pembimbing2;
        $data['id_penguji']       = $request->id_penguji;
    
        jadwalproposal::where('id', $id)->update($data);
        $datasama = jadwalproposal::where('tanggal', $data['tanggal'])
        ->where('id_ruang', $data['id_ruang'])
        ->where('id_sesi', $data['id_sesi'])
        ->count();
        if ($datasama > 0) {
            // Set flash message for error
            session()->flash('error', 'Jadwal ta untuk tanggal, ruang, dan sesi tersebut sudah ada.');
    
            // Redirect back to form
            return redirect('/jadwal-proposal-kaprodi');
        }
        
    
        return redirect('jadwal-proposal-kaprodi')->with('pesan', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        jadwalproposal::destroy($id);
        return redirect('jadwal-proposal-kaprodi')->with('pesan','Data berhasil terhapus');
    }
}
