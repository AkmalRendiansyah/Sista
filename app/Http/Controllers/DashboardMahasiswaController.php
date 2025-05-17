<?php

namespace App\Http\Controllers;

use App\Exports\MahasiswaExport;
use App\Imports\MahasiswaImport;
use App\Models\Prodi;
use App\Models\User;
use App\Models\v_mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class DashboardMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodi = Prodi::orderBy('nama_prodi', 'asc')->get();
        $mahasiswas = v_mahasiswa::OrderBy('name', 'asc')->get();


        return view('admin.mahasiswa',compact('mahasiswas', 'prodi')
        );
    }
    public function export()
    {
        return  Excel::download(new MahasiswaExport, 'Mahasiswa.xlsx');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls' // Pastikan tipe file Excel valid
        ]);
        

        Excel::import(new MahasiswaImport, $request->file('file'));
        
        return redirect('dashboard-mahasiswa')->with('success', 'Data dosen berhasil diimpor!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createmahasiswa',['prodis'=>Prodi::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:4',
            'email' => 'required|email|unique:users,email',
            'role'=> 'required',
            'id'=> 'required',
            'nim'=>'required|max:10|unique:users,nim',
            'password'=>'required|min:6'
        ]);
        $data['name']        = $request->name;
        $data['email']       = $request->email;
        $data['role']       = $request->role;
        $data['nim']       = $request->nim;
        $data['id_prodi']       = $request->id;
        $data['password']    = Hash::make($request->password); 
        
        
        v_mahasiswa::create($data);

       
                return redirect('/dashboard-mahasiswa');
            

    
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
        return view('admin.editmahasiswa',['prodis'=>Prodi::all(),'mahasiswa'=>v_mahasiswa::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email|unique:v_mahasiswas,email,' . $id,
            'id' => 'required',
            'nim' => 'required|min:10|max:10|unique:v_mahasiswas,nim,' . $id,
            'password' => 'required|min:6'
        ]);
    
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['nim'] = $request->nim;
        $data['id_prodi'] = $request->id;
        $data['password'] = Hash::make($request->password);
    
        v_mahasiswa::where('id', $id)->update($data);
    
        return redirect('dashboard-mahasiswa')->with('pesan', 'Data berhasil diupdate');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect('dashboard-mahasiswa')->with('pesan','Data berhasil terhapus');
    }
}
