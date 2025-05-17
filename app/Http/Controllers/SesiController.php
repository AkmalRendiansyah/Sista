<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\PasswordResetToken;
use App\Models\Prodi;
use App\Models\User;
use App\Models\v_admin;
use App\Models\v_dosen;
use App\Models\v_kaprodi;
use App\Models\v_mahasiswa;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SesiController extends Controller
{
    Function index()
    {
        return view('login');
    }
    Function forgot()
    {
        return view('forgotpassword');
    }
    Function forgotproses(Request $request)
    {
        $pesan =[
            'email.required' => 'Email tidak Boleh Kosong',
            'email.email' => 'Email tidak Valid',
            'email.exists' => 'Email tidak Terdaftar',

        ];
        $request->validate([
            
            'email' => 'required|email|exists:users,email',
           
        ],$pesan);
        
        $token =  \Str::random(60);
       
        PasswordResetToken::updateOrCreate(
            [
                'email'=> $request->email
            ],
            [
            'email' => $request->email,
            'token' =>$token,
            'created_at' => now(),
            ]
        );
        Mail::to($request->email)->send(new ResetPasswordMail($token));
        
        return redirect()->route('forgot_password')->withErrors('success', 'Kami telah mengirimkan email reset password')->withInput();

        

    }
    Function validasiforgot(Request $request,$token)
    {
        $gettoken = PasswordResetToken::where('token',$token)->first();
        
        if (!$gettoken) {   
            return redirect()->route('login')->with('Failed','Token tidak valid');
        }


        return view('validasiforgot',compact('token'));
    }
    Function validasiforgotproses(Request $request)
    {
        $pesan =[
            'password.required' => 'password tidak Boleh Kosong',
            'password.min' => 'password Minimal 6 karakter',
            

        ];
        $request->validate([
            
            'password' => 'required|min:6',
           
        ],$pesan);
        $token = PasswordResetToken::where('token',$request->token)->first();
        
        if (!$token) {   
            return redirect()->route('login')->with('Failed','Token tidak valid');
        }
        $user = User::where('email',$token->email)->first();
        
        if (!$user) {   
            return redirect()->route('login')->with('Failed','Email  tidak valid');
        }
        $user->update([
            'password'=> Hash::make($request->password),
        ]);
        $token ->delete();
        
        
        return redirect()->route('login')->with('success', 'password telah di reset');

        
    }

    Function landing()
    {
        return view('landingpage');
    }
    Function register()
    {
        return view('register');
    }
    Function nextregister()
    {
        return view('nextregister');
    }
    Function prosesnextregister()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["role"])) {
            $role = $_GET["role"];
            if ($role == "admin") {
                return view('registeradmin');
            } elseif ($role == "kaprodi") {
                return view('registerkaprodi');
            } elseif ($role == "dosen") {
                return view('registerdosen');
            } elseif ($role == "mahasiswa") {
                return view('registermahasiswa',['prodis'=>Prodi::all()]);
            } else {
                return view('nextregister');
            }
        }
    }
    Function prosesregisterdosen(Request $request)
    {
        $request->validate([
            'name'=>'required|min:4',
            'email' => 'required|email|unique:users,email',
            'role'=> 'required',
            'nidn'=>'required|max:10|min:10',
            'password'=>'required|min:6'
        ]);
        $data['name']        = $request->name;
        $data['email']       = $request->email;
        $data['role']       = $request->role;
        $data['nidn']       = $request->nidn;
        $data['password']    = Hash::make($request->password); 
          event(new Registered($data));
 
        
        
        v_dosen::create($data);

       
            return redirect('login')->withErrors('Akun berhasi di buat')->withInput();
        

    }

    Function prosesregisterkaprodi(Request $request)
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

        return redirect('login')->withErrors('Akun berhasi di buat')->withInput();
    }



    Function prosesregisteradmin(Request $req)
    {
        $req->validate([
            'name'=>'required|min:4',
            'email' => 'required|email|unique:users,email',
            'role'=> 'required',
            'password'=>'required|min:6',
            'nip'=>'required'
        ]);
        $data['name']        = $req->name;
        $data['email']       = $req->email;
        $data['role']       = $req->role;
        $data['password']    = Hash::make($req->password); 
        $data['nip']       = $req->nip;
        
        v_admin::create($data);

        return redirect('login')->withErrors('Akun berhasi di buat')->withInput();
    }
    
       
    Function prosesregistermahasiswa(Request $req)
    {
        $req->validate([
            'name'=>'required|min:4',
            'email' => 'required|email|unique:users,email',
            'role'=> 'required',
            'id_prodi'=> 'required',
            'password'=>'required|min:6',
            'nim'=>'required',
        ]);
        $data['name']        = $req->name;
        $data['email']       = $req->email;
        $data['role']       = $req->role;
        $data['password']    = Hash::make($req->password); 
        $data['nim']       = $req->nim;
        $data['id_prodi']       = $req->id_prodi;
        
        v_mahasiswa::create($data);

        return redirect('login')->withErrors('Akun berhasi di buat')->withInput();
    }
   
    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],
        [
            'email.required' => 'Email Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);
        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
            
        ];
        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'admin'){
                return redirect('/dashboard-admins');
            }
            elseif(Auth::user()->role == 'kaprodi'){
                return redirect('/dashboard-kaprodis');
            }
            elseif(Auth::user()->role == 'dosen'){
                return redirect('/dashboard-dosens');
            }
            elseif(Auth::user()->role == 'mahasiswa'){
                return redirect('/dashboard-mahasiswas');
            }
        }else{
            return redirect('/login')->withErrors('Useremail dan Password yang dimasukkan tidak sesuai')->withInput();
        }
    }
    Function logout()
    {
        Auth::logout();
        return redirect('');
    }
    function register_proses(Request $req){
        $req->validate([
            'name'=>'required|min:4',
            'email' => 'required|email|unique:users,email',
            'role'=> 'required|in:admin,kaprodi,dosen,mahasiswa',
            'password'=>'required|min:6'
        ]);
        $data['name']        = $req->name;
        $data['email']       = $req->email;
        $data['role']       = $req->role;
        $data['password']    = Hash::make($req->password); 
        
        User::create($data);

        $register = [
            'email' => $req->email,
            'password' => $req->password,
            
        ];
        if(Auth::attempt($register)){
            if(Auth::user()->role == 'admin'){
                return redirect('/tadmin');
            }
            elseif(Auth::user()->role == 'kaprodi'){
                return redirect('/kaprodi');
            }
            elseif(Auth::user()->role == 'dosen'){
                return redirect('/dosen');
            }
            elseif(Auth::user()->role == 'mahasiswa'){
                return redirect('/mahasiswa');
            }
        }else{
            return redirect('')->withErrors('Useremail dan Password yang dimasukkan tidak sesuai')->withInput();
        }
    }

}
