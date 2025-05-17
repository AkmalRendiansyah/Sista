<?php

namespace App\Http\Controllers;

use App\Exports\KaprodiExport;
use App\Imports\KaprodiImport;
use App\Models\v_kaprodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class DashboardKaprodiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kaprodis = v_kaprodi::orderBy('id', 'asc')->paginate(10);
        return view('admin.kaprodi',[
            'kaprodis' => v_kaprodi::get(),'prod' => $kaprodis
        ]);
    }
    public function export()
    {
        return Excel::download(new KaprodiExport, 'kaprodi.xlsx');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls' // Pastikan tipe file Excel valid
        ]);
        

        Excel::import(new KaprodiImport, $request->file('file'));
        
        return redirect('dashboard-kaprodi')->with('success', 'Data dosen berhasil diimpor!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createkaprodi');
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
            'nidn'=>'required',
            'password'=>'required|min:6'
        ]);
        $data['name']        = $request->name;
        $data['email']       = $request->email;
        $data['role']       = $request->role;
        $data['nidn']       = $request->nidn;
        $data['password']    = Hash::make($request->password); 
        
        
        v_kaprodi::create($data);

    
                return redirect('/dashboard-kaprodi');
            

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
        return view('admin.editkaprodi',['kaprodi'=>v_kaprodi::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|min:4',
            'email' => 'required|email|unique:v_kaprodis,email,' . $id,
            'nidn'=>'required|min:10|max:10|unique:v_kaprodis,nidn,' . $id,
            'password'=>'required|min:6'
        ]);
        $data['name']        = $request->name;
        $data['email']       = $request->email;
        $data['nidn']       = $request->nidn;
        $data['password']    = Hash::make($request->password); 
        
        v_kaprodi::where('id',$id)->update($data);
       
        return redirect('dashboard-kaprodi')->with('pesan','Data berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        v_kaprodi::destroy($id);
        return redirect('dashboard-kaprodi')->with('pesan','Data berhasil terhapus');
    }
}
