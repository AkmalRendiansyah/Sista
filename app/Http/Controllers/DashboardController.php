<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\v_admin;
use App\Models\v_dosen;
use App\Models\v_kaprodi;
use App\Models\v_mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function tabeldosen()
    {
        $dosens = v_dosen::orderBy('id', 'asc')->paginate(10);
        return view('admin.dosen',[
            'dosens' => v_dosen::get(),'sen' => $dosens
        ]);
    }
    public function tabeladmin()
    {
        return view('admin.dashboard.index');
        
    }
    public function createadmin()
    {
       
        return view('admin.createadmin');
    }
    public function prosescreateadmin(Request $req)
    {
        $validated = $req->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            
        ]);
        v_admin::create($validated);
        return redirect('/tadmins');
       
    }
    public function tabelkaprodi()
    {
        $kaprodis = v_kaprodi::orderBy('id', 'asc')->paginate(10);
        return view('admin.kaprodi',[
            'kaprodis' => v_kaprodi::get(),'prod' => $kaprodis
        ]);
    }
    public function tabelmahasiswa()
    {
        $mahasiswas = v_mahasiswa::orderBy('id', 'asc')->paginate(10);
        return view('admin.mahasiswa',[
            'mahasiswas' => v_mahasiswa::get(),'siswa' => $mahasiswas
        ]);
    }

    public function dashboardkaprodi()
    {
        ;
        return view('kaprodi.dashboard');
    }
    public function dashboardmahasiswa()
    {
        ;
        return view('mahasiswa.dashboard.index');
    }
    public function dashboarddosen()
    {
        return view('dosen.dashboard.index');
    }
}
