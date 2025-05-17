<?php

namespace App\Http\Controllers;

use App\Exports\DosenExport;
use App\Imports\DosenImport;
use App\Models\v_dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class DashboardDosenKaprodiController extends Controller
{
    public function index()
    {
        $dosens = v_dosen::orderBy('id', 'asc')->pencarian()->paginate(10);
        return view('kaprodi.dosen',[
            'dosens' => v_dosen::get(),'sen' => $dosens
        ]);
    }
    public function export()
    {
        return Excel::download(new DosenExport, 'dosen.xlsx');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls' // Pastikan tipe file Excel valid
        ]);
        

        Excel::import(new DosenImport, $request->file('file'));
        
        return redirect('dashboard-dosen-kaprodi')->with('success', 'Data dosen berhasil diimpor!');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kaprodi.createdosen');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'nidn' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            
        ]);
        v_dosen::create($validated);
        return redirect('dashboard-dosen-kaprodi');
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
        return view('kaprodi.editdosen',['roles'=>v_dosen::all(),'dosen'=>v_dosen::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|min:4',
            'email' => 'required|email|unique:v_dosens,email,' . $id,
            'nidn'=>'required|min:10|max:10|unique:v_dosens,nidn,' . $id,
            'password'=>'required|min:6'
        ]);
        $data['name']        = $request->name;
        $data['email']       = $request->email;
        $data['nidn']       = $request->nidn;
        $data['password']    = Hash::make($request->password); 
        
        v_dosen::where('id',$id)->update($data);
       
        return redirect('dashboard-dosen-kaprodi')->with('pesan','Data berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        v_dosen::destroy($id);
        return redirect('dashboard-dosen-kaprodi')->with('pesan','Data berhasil terhapus');
    }
}
