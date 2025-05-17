<?php

namespace App\Http\Controllers;

use App\Exports\AdminExport;
use App\Imports\AdminImport;
use App\Models\Prodi;
use App\Models\v_admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class DashboardAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = v_admin::orderBy('id', 'asc')->paginate(10);
        return view('admin.admin',[
            'admins' => v_admin::get(),'min' => $admins,
        ]);
    }
    public function export()
    {
        return  Excel::download(new AdminExport, 'Admin.xlsx');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls' // Pastikan tipe file Excel valid
        ]);
        

        Excel::import(new AdminImport, $request->file('file'));
        
        return redirect('dashboard-admin')->with('success', 'Data dosen berhasil diimpor!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createadmin',['prodis'=>Prodi::all()]);
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
            // 'id_prodi'=> 'required',
            'nip'=>'required|max:10|unique:users,nip',
            'password'=>'required|min:6'
        ]);
        $data['name']        = $request->name;
        $data['email']       = $request->email;
        $data['role']       = $request->role;
        $data['nip']       = $request->nip;
        // $data['id_prodi']       = $request->id_prodi;
        $data['password']    = Hash::make($request->password); 
        
        
        v_admin::create($data);

       
                return redirect('/dashboard-admin');
            

    
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
        return view('admin.editadmin',['admin'=>v_admin::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|min:4',
            'email' => 'required|email|unique:v_admins,email,' . $id,
            'nip'=>'required|min:10|max:10|unique:v_admins,nip,' . $id,
            'password'=>'required|min:6'
        ]);
        $data['name']        = $request->name;
        $data['email']       = $request->email;
        $data['nip']       = $request->nip;
        $data['password']    = Hash::make($request->password); 
        
        v_admin::where('id',$id)->update($data);
       
        return redirect('dashboard-admin')->with('pesan','Data berhasil update');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        v_admin::destroy($id);
        return redirect('dashboard-admin')->with('pesan','Data berhasil terhapus');
    }
}
