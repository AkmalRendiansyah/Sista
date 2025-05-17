<?php

namespace App\Http\Controllers;

use App\Models\jadwalta;
use App\Models\nilaiketua;
use App\Models\nilaipenguji1;
use App\Models\nilaipenguji2;
use App\Models\nilaipenguji3;
use App\Models\ruang;
use App\Models\sesi;
use App\Models\sidangta;
use App\Models\v_dosen;
use App\Models\v_mahasiswa;
use Illuminate\Http\Request;

class JadwalSidangTaAdminController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwalta = jadwalta::orderBy('id', 'asc')->get();
        $ruang = ruang::OrderBy('ruang', 'asc')->get();
        $mahasiswa = v_mahasiswa::OrderBy('name', 'asc')->get();
        $mulaisesi = sesi::OrderBy('mulai', 'asc')->get();
        $selesaisesi = sesi::OrderBy('selesai', 'asc')->get();
        $pembimbing1 = v_dosen::OrderBy('name', 'asc')->get();
        $pembimbing2 = v_dosen::OrderBy('name', 'asc')->get();
        $penguji = v_dosen::OrderBy('name', 'asc')->get();
        

         return view('admin.jadwalsidang.index',compact('jadwalta', 'ruang','mahasiswa','mulaisesi','selesaisesi','pembimbing1','pembimbing2','penguji'));
       
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosens = v_dosen::all();
        $ruangs = ruang::all();
        $sesis = sesi::all();
        $sidangtas = sidangta::all();
        $mahasiswas = v_mahasiswa::all();
    
        return view('admin.jadwalsidang.create', [
            'dosens' => $dosens,
            'ruangs' => $ruangs,
            'sesis' => $sesis,
            'sidangtas' => $sidangtas,
            'mahasiswas' => $mahasiswas,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_ta' => 'required|unique:jadwaltas,id_ta',
            'id_mahasiswa'=>'required',
            'tanggal' => 'required',
            'judul' => 'required',
            'nim' => 'required',
            'id_ruang'=> 'required',
            'id_sesi'=> 'required',
            'id_ketua'=> 'required',
            'id_penguji1'=> 'required',
            'id_penguji2'=> 'required',
            'id_penguji3'=> 'required'
        ]);
        
        $data['id_ta']        = $request->id_ta;
        $data['id_mahasiswa']        = $request->id_mahasiswa;
        $data['tanggal']       = $request->tanggal;
        $data['nim']       = $request->nim;
        $data['judul']       = $request->judul;
        $data['id_ruang']       = $request->id_ruang;
        $data['id_sesi']       = $request->id_sesi;
        $data['id_ketua']       = $request->id_ketua;
        $data['id_penguji1']       = $request->id_penguji1;
        $data['id_penguji2']       = $request->id_penguji2;
        $data['id_penguji3']       = $request->id_penguji3;
       

        $uniqueCheck = collect([$request->id_ketua, $request->id_penguji1, $request->id_penguji2, $request->id_penguji3])->unique();
    if ($uniqueCheck->count() < 4) {
        // Set flash message for error
        session()->flash('error', 'ID Ketua, Penguji 1, Penguji 2, dan Penguji 3 harus berbeda.');

        // Redirect back to form with input data
        return redirect('/jadwal-ta-admin');
    }
    $ketuaExists = jadwalta::where('tanggal', $request->tanggal)
    ->where('id_sesi', $request->id_sesi)
    ->where(function ($query) use ($request) {
        $query->where('id_ketua', $request->id_ketua)
            ->orWhere('id_penguji1', $request->id_ketua)
            ->orWhere('id_penguji2', $request->id_ketua)
            ->orWhere('id_penguji3', $request->id_ketua);
    })
    ->exists();

if ($ketuaExists) {
    session()->flash('error', 'ID Ketua sudah digunakan dalam jadwal lain pada tanggal dan sesi yang sama.');

    // Redirect back to form
    return redirect('/jadwal-ta-admin');
}

$penguji1Exists = jadwalta::where('tanggal', $request->tanggal)
    ->where('id_sesi', $request->id_sesi)
    ->where(function ($query) use ($request) {
        $query->where('id_ketua', $request->id_penguji1)
            ->orWhere('id_penguji1', $request->id_penguji1)
            ->orWhere('id_penguji2', $request->id_penguji1)
            ->orWhere('id_penguji3', $request->id_penguji1);
    })
    ->exists();

if ($penguji1Exists) {
    session()->flash('error', ' Penguji 1 sudah digunakan dalam jadwal lain pada tanggal dan sesi yang sama.');

    // Redirect back to form
    return redirect('/jadwal-ta-admin');
}


$penguji2Exists = jadwalta::where('tanggal', $request->tanggal)
    ->where('id_sesi', $request->id_sesi)
    ->where(function ($query) use ($request) {
        $query->where('id_ketua', $request->id_penguji2)
            ->orWhere('id_penguji1', $request->id_penguji2)
            ->orWhere('id_penguji2', $request->id_penguji2)
            ->orWhere('id_penguji3', $request->id_penguji2);
    })
    ->exists();

if ($penguji2Exists) {
    session()->flash('error', ' Penguji 2 sudah digunakan dalam jadwal lain pada tanggal dan sesi yang sama.');

    // Redirect back to form
    return redirect('/jadwal-ta-admin');
}


$penguji3Exists = jadwalta::where('tanggal', $request->tanggal)
    ->where('id_sesi', $request->id_sesi)
    ->where(function ($query) use ($request) {
        $query->where('id_ketua', $request->id_penguji3)
            ->orWhere('id_penguji1', $request->id_penguji3)
            ->orWhere('id_penguji2', $request->id_penguji3)
            ->orWhere('id_penguji3', $request->id_penguji3);
    })
    ->exists();

if ($penguji3Exists) {
    session()->flash('error', ' Penguji 3 sudah digunakan dalam jadwal lain pada tanggal dan sesi yang sama.');

    // Redirect back to form
    return redirect('/jadwal-ta-admin');
}

    
        $datasama = jadwalta::where('tanggal', $data['tanggal'])
    ->where('id_ruang', $data['id_ruang'])
    ->where('id_sesi', $data['id_sesi'])
    ->count();
    if ($datasama > 0) {
        // Set flash message for error
        session()->flash('error', 'Jadwal ta untuk tanggal, ruang, dan sesi tersebut sudah ada.');

        // Redirect back to form
        return redirect('/jadwal-ta-admin');
    }
    

    // Create new proposal schedule
    $sidangta =  jadwalta::create($data);
        $idsidang = $sidangta->id;
    
        // Prepare data for nilaita table
        $data1 = [
            'id_sidang' => $idsidang,
            'id_mahasiswa'=>$request->id_mahasiswa,
            'id_ketua' => $request->id_ketua,
        ];
        nilaiketua::create($data1);
        $data2 = [
            'id_sidang' => $idsidang,
            'id_mahasiswa'=>$request->id_mahasiswa,
            'id_penguji1' => $request->id_penguji1,
        ];
        nilaipenguji1::create($data2);
        $data3 = [
            'id_sidang' => $idsidang,
            'id_mahasiswa'=>$request->id_mahasiswa,
            'id_penguji2' => $request->id_penguji2,
        ];
        nilaipenguji2::create($data3);
        $data4 = [
            'id_sidang' => $idsidang,
            'id_mahasiswa'=>$request->id_mahasiswa,
            'id_penguji3' => $request->id_penguji3,
        ];
        nilaipenguji3::create($data4);
    
    
        // Create new nilaita record
       
    
    return redirect('/jadwal-ta-admin');
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
        $sidangtas = sidangta::all();
        $jadwals = jadwalta::find($id);
        $mahasiswas = v_mahasiswa::all();
        return view('admin.jadwalsidang.edit', [
            'dosens' => $dosens,
            'ruangs' => $ruangs,
            'sesis' => $sesis,
            'sidangtas' => $sidangtas,
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
            'id_ketua'=> 'required',
            'id_penguji1'=> 'required',
            'id_penguji2'=> 'required',
             'id_penguji3'=> 'required'
        ]);
    
     
        $data['tanggal']       = $request->tanggal;
        $data['id_ruang']       = $request->id_ruang;
        $data['id_sesi']       = $request->id_sesi;
        $data['id_ketua']       = $request->id_ketua;
        $data['id_penguji1']       = $request->id_penguji1;
        $data['id_penguji2']       = $request->id_penguji2;
        $data['id_penguji3']       = $request->id_penguji3;

        $uniqueCheck = collect([$request->id_ketua, $request->id_penguji1, $request->id_penguji2, $request->id_penguji3])->unique();
        if ($uniqueCheck->count() < 4) {
            // Set flash message for error
            session()->flash('error', 'ID Ketua, Penguji 1, Penguji 2, dan Penguji 3 harus berbeda.');
    
            // Redirect back to form with input data
            return redirect('/jadwal-ta-admin');
        }



        $conflict = jadwalta::where('tanggal', $data['tanggal'])
        ->where('id_ruang', $data['id_ruang'])
        ->where('id_sesi', $data['id_sesi'])
        ->where('id', '!=', $id) // Exclude the current schedule from the check
        ->exists();

    if ($conflict) {
        session()->flash('error', 'Jadwal ta untuk tanggal, ruang, dan sesi tersebut sudah ada.');
        return redirect('/jadwal-ta-admin');
    }
    $ketuaExists = jadwalta::where('tanggal', $request->tanggal)
    ->where('id_sesi', $request->id_sesi)
    ->where(function ($query) use ($request) {
        $query->where('id_ketua', $request->id_ketua)
            ->orWhere('id_penguji1', $request->id_ketua)
            ->orWhere('id_penguji2', $request->id_ketua)
            ->orWhere('id_penguji3', $request->id_ketua);
    })
    ->where('id', '!=', $id)
    ->exists();

if ($ketuaExists) {
    session()->flash('error', 'ID Ketua sudah digunakan dalam jadwal lain pada tanggal dan sesi yang sama.');

    // Redirect back to form
    return redirect('/jadwal-ta-admin');
}

$penguji1Exists = jadwalta::where('tanggal', $request->tanggal)
    ->where('id_sesi', $request->id_sesi)
    ->where(function ($query) use ($request) {
        $query->where('id_ketua', $request->id_penguji1)
            ->orWhere('id_penguji1', $request->id_penguji1)
            ->orWhere('id_penguji2', $request->id_penguji1)
            ->orWhere('id_penguji3', $request->id_penguji1);
    })
    ->where('id', '!=', $id)
    ->exists();

if ($penguji1Exists) {
    session()->flash('error', ' Penguji 1 sudah digunakan dalam jadwal lain pada tanggal dan sesi yang sama.');

    // Redirect back to form
    return redirect('/jadwal-ta-admin');
}


$penguji2Exists = jadwalta::where('tanggal', $request->tanggal)
    ->where('id_sesi', $request->id_sesi)
    ->where(function ($query) use ($request) {
        $query->where('id_ketua', $request->id_penguji2)
            ->orWhere('id_penguji1', $request->id_penguji2)
            ->orWhere('id_penguji2', $request->id_penguji2)
            ->orWhere('id_penguji3', $request->id_penguji2);
    })
    ->where('id', '!=', $id)
    ->exists();

if ($penguji2Exists) {
    session()->flash('error', ' Penguji 2 sudah digunakan dalam jadwal lain pada tanggal dan sesi yang sama.');

    // Redirect back to form
    return redirect('/jadwal-ta-admin');
}


$penguji3Exists = jadwalta::where('tanggal', $request->tanggal)
    ->where('id_sesi', $request->id_sesi)
    ->where(function ($query) use ($request) {
        $query->where('id_ketua', $request->id_penguji3)
            ->orWhere('id_penguji1', $request->id_penguji3)
            ->orWhere('id_penguji2', $request->id_penguji3)
            ->orWhere('id_penguji3', $request->id_penguji3);
    })
    ->where('id', '!=', $id)
    ->exists();

if ($penguji3Exists) {
    session()->flash('error', ' Penguji 3 sudah digunakan dalam jadwal lain pada tanggal dan sesi yang sama.');

    // Redirect back to form
    return redirect('/jadwal-ta-admin');
}

    

    //     $datasama = jadwalta::where('tanggal', $data['tanggal'])
    // ->where('id_ruang', $data['id_ruang'])
    // ->where('id_sesi', $data['id_sesi'])
    // ->count();
    // if ($datasama > 0) {
    //     // Set flash message for error
    //     session()->flash('error', 'Jadwal ta untuk tanggal, ruang, dan sesi tersebut sudah ada.');

    //     // Redirect back to form
    //     return redirect('/jadwal-ta-kaprodi');
    // }
    
    
        jadwalta::where('id', $id)->update($data);
        $data1 = [
            
            'id_ketua' => $request->id_ketua,
        ];
        nilaiketua::where('id_sidang', $id)->update($data1);
        $data2 = [
            
            'id_penguji1' => $request->id_penguji1,
        ];
        nilaipenguji1::where('id_sidang', $id)->update($data2);
        $data3 = [
            
            'id_penguji2' => $request->id_penguji2,
        ];
        nilaipenguji2::where('id_sidang', $id)->update($data3);
        $data4 = [
            
            'id_penguji3' => $request->id_penguji3,
        ];
        nilaipenguji3::where('id_sidang', $id)->update($data4);
        return redirect('jadwal-ta-admin')->with('pesan', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        jadwalta::destroy($id);
        nilaiketua::where('id_sidang', $id)->delete();
        nilaipenguji1::where('id_sidang', $id)->delete();
        nilaipenguji2::where('id_sidang', $id)->delete();
        nilaipenguji3::where('id_sidang', $id)->delete();
       
        return redirect('jadwal-ta-admin')->with('pesan','Data berhasil terhapus');
    }
}
