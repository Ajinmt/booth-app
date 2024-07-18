<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{


    public function index(){
       // kita ambil data user lalu simpan pada variable $user
        $user = Auth::user();
        // kondisi jika user nya ada 
        if($user){
            // jika user nya memiliki level admin
            if($user->level =='admin'){
                 // arahkan ke halaman admin ya :P
                return redirect()->intended('dashboard');
            }
              // jika user nya memiliki level user
            else if($user->level =='user'){
               // arahkan ke halaman user
                return redirect()->intended('userPage');
            }

        }
        return view('authPage');
     }
    //
    public function proses_login(Request $request){
      // kita buat validasi pada saat tombol login di klik
      // validas nya username & password wajib di isi 
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
    
       
       // ambil data request username & password saja 
        $credential = $request->only('email','password');

      // cek jika data username dan password valid (sesuai) dengan data
        if(Auth::attempt($credential)){
           // kalau berhasil simpan data user ya di variabel $user
            $user =  Auth::user();
            // cek lagi jika level user admin maka arahkan ke halaman admin
            if($user->level =='admin'){
                return redirect()->intended('dashboard');

            }
                // tapi jika level user nya user biasa maka arahkan ke halaman user
               else if($user->level =='user'){
                return redirect()->intended('userPage');
            }
             // jika belum ada role maka ke halaman /
            return redirect()->intended('/');
        }

// jika ga ada data user yang valid maka kembalikan lagi ke halaman login
// pastikan kirim pesan error juga kalau login gagal ya
        return redirect('authPage')
            ->withInput()
            ->withErrors(['login_gagal'=>'Nama atau password yang anda masukkan salah']);
     }
 public function register(){
      // tampilkan view register
        return view('registerPage');
      }


// aksi form register
     public function proses_register(Request $request){ 
    // Kita buat validasi untuk proses register
    // Validasinya yaitu semua field wajib diisi
    // Validasi username dan email harus unique atau tidak boleh duplicate username dan email
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'username' => 'required|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required'
    ]);

    // Kalau gagal, kembali ke halaman register dengan munculkan pesan error
    if ($validator->fails()) {
        return redirect('/register')
            ->withErrors($validator)
            ->withInput();
    }

    // Kalau berhasil, isi level & hash passwordnya biar secure
    $request['level'] = 'user';
    $request['password'] = bcrypt($request->password);

    // Masukkan semua data pada request ke table user
    User::create($request->all());

    // Kalau berhasil arahkan ke halaman login
    return redirect()->route('login');
}

     public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return Redirect('/');
      }
}