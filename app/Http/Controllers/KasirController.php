<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historyjual;

class KasirController extends Controller
{
    public function indexformshop(){
        $databuku = \App\Models\Book::all();


        return view('kasir.transaksi.index', ['databuku' => $databuku]);
    }
    public function editformshop($bukuid){
        $databuku = \App\Models\Book::find($bukuid);

        return view('kasir.transaksi.create', ['databuku' => $databuku]);
    }
    public function updateformshop(Request $request){
        $request->validate([
            'jumlah_beli' => 'required',
        ]);
        $data = $request->all();
        if ( Historyjual::create($request->all())) {
            return redirect('/penjualan')->with('success', 'Data Berhasil Dibuat');
        }
        return redirect('/penjualan')->with('failed', 'Data Gagal Dibuat');
    }
}
