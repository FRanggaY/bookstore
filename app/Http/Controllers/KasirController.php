<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\Sell;
use App\Models\Historyjual;

class KasirController extends Controller
{
    public function indexformshop(request $request){
        $datapenjualan = Historyjual::all();
        $checkdata = empty($datapenjualan->all());
        $databuku = Book::all();

        $datatmppenjualan = DB::table('tbl_tmp_penjualan')
            ->join('tbl_buku', 'tbl_tmp_penjualan.id_buku', '=', 'tbl_buku.id_buku')
            ->get();

        return view('kasir.transaksi.index')
        ->with(['databuku' => $databuku])
        ->with(['datapenjualan'=> $datatmppenjualan])
        ->with(['datahistory'=> $checkdata]);
    }
    public function editformshop($bukuid){
        $databuku = Book::find($bukuid);

        return view('kasir.transaksi.create', ['databuku' => $databuku]);
    }
    public function updateformshop(Request $request){
        $request->validate([
            'jumlah_beli' => 'required',
        ]);
        $book = Book::where('id_buku', $request->id_buku)->get();
        foreach ($book as $bk) {
            $stok = $bk->stok;
        }
        if ($request->jumlah_beli > $stok) {
            return redirect('/penjualan')->with('failed', "Jumlah beli melebihi stok, stok tersisa {$stok}");
        }
        else{
            Historyjual::create($request->all());
            return redirect('/penjualan')->with('success', 'Data Berhasil Dibuat');
        }
    }
    public function saveformshop(Request $request){
        $dataakun = auth()->user()->id_user;
        $request->validate([
            'bayar' => 'required',
            'created_at' => 'required',
        ]);

        $book = Book::where('id_buku', $request->id_buku)->get();
        foreach ($book as $bk) {
            $stok = $bk->stok;
        }
        $newstok = $stok - $request->jumlah_beli;
        Sell::create([
        'id_buku' => $request->id_buku,
        'id_kasir' => $dataakun,
        'jumlah_beli' => $request->jumlah_beli,
        'bayar' => $request->bayar,
        'kembalian' => $request->kembalian,
        'total_harga' => $request->total_harga,
        'created_at' => $request->created_at,
        'updated_at' => $request->created_at,
        ]);
        $set_stok = Book::find($request->id_buku);
        $set_stok->stok = $newstok;
        $set_stok->save();

        $databuku = Historyjual::where('id_buku', $request->id_buku);
        $databuku->delete();

        return redirect('/penjualan')
        ->with('success','Data Berhasil Dibuat');
    }
    public function destroyformshop($bukuid){
        $databuku = Historyjual::where('id_buku','like',"%".$bukuid."%");

        $databuku->delete();
        return redirect('/penjualan')
        ->with('success','Data Film Berhasil Dihapus.');
    }
}
