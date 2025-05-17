<?php

namespace App\Http\Controllers;

use App\Models\jadwalta;
use App\Models\proposalta;
use App\Models\sidangta;
use App\Models\v_dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TampilanDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosen = v_dosen::where('nidn', Auth::user()->nidn)->first();
        
        if (!$dosen) {
            // Handle jika data dosen tidak ditemukan
            abort(404);
        }
    
        $proposal_ta = proposalta::where('id_pembimbing', $dosen->id)
                                ->orderBy('id', 'asc')
                                ->get();
        $proposal_ta2 = proposalta::where('id_pembimbing2', $dosen->id)
                                ->orderBy('id', 'asc')
                                ->get();
        $sidang_ta = sidangta::where('id_pembimbing', $dosen->id)
                                ->orderBy('id', 'asc')
                                ->get();
        $sidang_ta2 = sidangta::where('id_pembimbing2', $dosen->id)
                                ->orderBy('id', 'asc')
                                ->get();
         
        $jadwalta = jadwalta::where(function($query) use ($dosen) {
                                    $query->where('id_ketua', $dosen->id)
                                          ->orWhere('id_penguji1', $dosen->id)
                                          ->orWhere('id_penguji2', $dosen->id)
                                          ->orWhere('id_penguji3', $dosen->id);
                                })
                                ->orderBy('id', 'asc')
                                ->get();
                                
        
        
        
        $jumlahproposal = $proposal_ta->count(); // Menghitung jumlah proposal
        $jumlahproposal2 = $proposal_ta2->count();
        $jumlahsidang = $sidang_ta->count();
        $jumlahsidang2 = $sidang_ta2->count();
        $jumlahjadwal = $jadwalta->count();
    
        return view('dosen.dashboard.index', [
            'jumlahproposal' => $jumlahproposal,
            'jumlahproposal2' => $jumlahproposal2,
            'jumlahsidang' => $jumlahsidang,
            'jumlahsidang2' => $jumlahsidang2,
            'jumlahjadwal' => $jumlahjadwal,
            
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
