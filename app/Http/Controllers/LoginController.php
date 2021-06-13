<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function postlogin (request $request) {
        $credentials = $request->only('username', 'password','akses');
        if (Auth::attempt($credentials)) {
            return redirect('index')->with('success', 'Anda berhasil Masuk');
        }
        return redirect('login')->with('failed', 'Username atau Password Salah');
    }
    public function logout () {
        Auth::logout();
        return redirect('/');
    }
    public function changepassword () {
        return view('akun.password');
    }
    public function updatepassword (request $request) {
        $oldpassword = auth()->user()->password;
        $userid = auth()->user()->id_user;

        if(Hash::check($request->input('old_password'), $oldpassword)){
            $user =User::find($userid);
            $user->password = Hash::make($request->input('password'));

            if ($user->save()){
                return redirect()->back()->with('success', 'Password Berhasil Diubah');
            }
        }else{
            return redirect()->back()->with('failed', 'Password lama invalid');
        }
    }
}
