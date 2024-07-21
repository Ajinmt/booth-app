<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{


    public function index(){
        $user = Auth::user();
        if($user){
            if($user->level =='admin'){
                return redirect()->intended('dashboard');
            }
            else if($user->level =='user'){
                return redirect()->intended('userPage');
            }

        }
        return view('authPage');
     }
    //
    public function proses_login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
    
       
        $credential = $request->only('email','password');

        if(Auth::attempt($credential)){
            $user =  Auth::user();
            if($user->level =='admin'){
                return redirect()->intended('dashboard');

            }
               else if($user->level =='user'){
                return redirect()->intended('userPage');
            }
           
            return redirect()->intended('/');
        }


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
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required'
    ]);

    if ($validator->fails()) {
        return redirect('/register')
            ->withErrors($validator)
            ->withInput();
    }
    $request['level'] = 'user';
    $request['password'] = bcrypt($request->password);

    User::create($request->all());

    return redirect()->route('login');
}

     public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return Redirect('/');
      }
}