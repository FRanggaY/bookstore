<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settinglap;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function editprofile(){
        $dataprofil = Settinglap::find(1);
        return view('manager.profil.edit')
        ->with( compact('dataprofil') );
    }
    public function updateprofile(Request $request){
        $dataprofil = Settinglap::find(1);

        $dataprofil->nama_perusahaan = $request->input('nama_perusahaan');
        $dataprofil->alamat = $request->input('alamat');
        $dataprofil->no_tlpn = $request->input('no_tlpn');
        $dataprofil->web = $request->input('web');

        $file = $request->file('logo');
        $filename = time().rand(100,999). "." .$file->getClientOriginalExtension();
        $file->move(public_path().'/uploads/profile/', $filename);
        $dataprofil->logo = $filename;

        $dataprofil->no_hp = $request->input('no_hp');
        $dataprofil->email = $request->input('email');



        if ( $dataprofil->save() ) {
            return redirect('/profil')->with('success', 'Data Berhasil Diupdate');
        }
        return redirect('/profil')->with('failed', 'Data Gagal Diupdate');
    }
    public function indexaddaccount(){
        return view('manager.akun.index');
    }
    public function storeaccount(request $request){
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telpon' => 'required',
            'status' => 'required',
            'username' => 'required',
            'password' => 'required',
            'akses' => 'required',
        ]);

        $success = User::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telpon' => $request->telpon,
            'status' => $request->status,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'remember_token' => $request->remember_token,
            'akses' => $request->akses,
        ]);

        if ($success) {
            return redirect('/tambahakun')->with('success', 'Data Berhasil Dibuat');
        }
        return redirect('/tambahakun')->with('failed', 'Data Gagal Dibuat');


    }
}

