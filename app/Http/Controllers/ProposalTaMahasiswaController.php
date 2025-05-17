<?php

namespace App\Http\Controllers;

use App\Models\proposalta;
use App\Models\v_dosen;
use App\Models\v_kaprodi;
use App\Models\v_mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ProposalTaMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $mahasiswa = v_mahasiswa::where('nim', Auth::user()->nim)->first();
        $proposal_ta = proposalta::where('id_mahasiswa', $mahasiswa->id)
        ->orderBy('id', 'asc')
        ->get();
        $dosen = v_dosen::orderBy('name', 'asc')->get();
       
        $kaprodi = v_kaprodi::orderBy('name', 'asc')->get();
        $pembimbing2 = v_dosen::orderBy('name', 'asc')->get();

        return view('mahasiswa.proposalta.index', compact('proposal_ta', 'dosen','kaprodi','pembimbing2'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $v_dosens = v_dosen::all();
        $v_kaprodis = v_kaprodi::all();
        $pembimbing2s = v_dosen::all();
       
    
        return view('mahasiswa.proposalta.create', [
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
            'proposal' => 'required|file|mimes:pdf,doc,docx',
        ]);
        $mahasiswa = v_mahasiswa::where('nim', Auth::user()->nim)->first();
        if($request->hasFile('proposal')) {
            $namaFile='proposal'.time().'_'.$request->proposal->getClientOriginalName();
            $request->proposal->move('proposal-ta',$namaFile);
        }else{
            $namaFile='';
        }

        $validatedData['proposal']=$namaFile;
        $validatedData['id_mahasiswa']=$mahasiswa->id;
        $validatedData['nim']=$mahasiswa->nim;
        $validatedData['judul'];
         $validatedData['id_pembimbing']=$request->id_pembimbing;
         $validatedData['id_pembimbing2']=$request->id_pembimbing2;
         $validatedData['id_kaprodi']=$request->id_kaprodi;
        proposalta::create($validatedData);
    
    
        return redirect('proposal-ta-mahasiswa');
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
        proposalta::destroy($id);
        return redirect('proposal-ta-mahasiswa')->with('pesan','Data berhasil terhapus');
    }
}
