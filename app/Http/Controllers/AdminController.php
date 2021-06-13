<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distributor;
use App\Models\Book;

class AdminController extends Controller
{
    public function indexinputdistributor()
    {
        $datadistributor = \App\Models\Distributor::all();
        $datadistributorpagination = \App\Models\Distributor::paginate(10);
        $totaldistributor = $datadistributor->count('id_distributor');

        return view('admin.inputan.distributor.index', ['datadistributorpagination' => $datadistributorpagination])
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with( compact('totaldistributor') );
    }
    public function storedistributor(Request $request)
    {
        $request->validate([
            'nama_distributor' => 'required',
            'alamat' => 'required',
            'telpon' => 'required',
        ]);

        if ( Distributor::create($request->all())) {
            return redirect('/inputdistributor')->with('success', 'Data Berhasil Dibuat');
        }
        return redirect('/inputdistributor')->with('failed', 'Data Gagal Dibuat');
    }
    public function editdistributor($disid)
    {
        $datadistributor = \App\Models\Distributor::find($disid);
        return view('admin.inputan.distributor.edit', ['datadistributor' => $datadistributor]);
    }
    public function updatedistributor($disid, Request $request)
    {
        $datadistributor = \App\Models\Distributor::find($disid);
        $updatedata = $datadistributor->update($request->all());
        if ( $updatedata ) {
            return redirect('/inputdistributor')->with('success', 'Data Berhasil Diupdate');
        }
        return redirect('/inputdistributor')->with('failed', 'Data Gagal Diupdate');
    }
    public function destroydistributor($disid)
    {
        $datadistributor = \App\Models\Distributor::find($disid);
        $hapus = $datadistributor->delete();
        if ( $hapus ) {
            return redirect('/inputdistributor')->with('success', 'Data Berhasil Dihapus');
        }
        return redirect('/inputdistributor')->with('failed', 'Data Gagal Dihapus');
    }
    public function finddistributor(Request $request){
        $find = $request->nama_distributor;
        $datadistributorpagination = \App\Models\Distributor::where('nama_distributor','like',"%".$find."%")->paginate();
        $totaldistributor = $datadistributorpagination->count('id_distributor');

        return view('admin.inputan.distributor.index',['datadistributorpagination' => $datadistributorpagination])
        ->with( compact('totaldistributor') );
    }

    public function indexinputbuku()
    {
        $databuku = \App\Models\Book::all();
        $databukupagination = \App\Models\Book::paginate(3);
        $totalbuku = $databuku->count('id_distributor');
        return view('admin.inputan.buku.index', ['databukupagination' => $databukupagination])
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with( compact('totalbuku') );
    }
    public function storebuku(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'noisbn' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'harga_pokok' => 'required',
            'harga_jual' => 'required',
            'diskon' => 'required',
        ]);

        if ( Book::create($request->all())) {
            return redirect('/inputbuku')->with('success', 'Data Berhasil Dibuat');
        }
        return redirect('/inputbuku')->with('failed', 'Data Gagal Dibuat');
    }
    public function editbook($bookid)
    {
        $databuku = \App\Models\Book::find($bookid);
        return view('admin.inputan.buku.edit', ['databuku' => $databuku]);
    }
    public function updatebook($bookid,Request $request)
    {
        $datadistributor = \App\Models\Book::find($bookid);
        $updatedata = $datadistributor->update($request->all());
        if ( $updatedata ) {
            return redirect('/inputbuku')->with('success', 'Data Berhasil Diupdate');
        }
        return redirect('/inputbuku')->with('failed', 'Data Gagal Diupdate');
    }
    public function destroybook($bookid)
    {
        $databuku = \App\Models\Book::find($bookid);
        $hapus = $databuku->delete();
        if ( $hapus ) {
            return redirect('/inputbuku')->with('success', 'Data Berhasil Dihapus');
        }
        return redirect('/inputbuku')->with('failed', 'Data Gagal Dihapus');
    }
    public function findbook(Request $request){
        $find = $request->judul;
        $databukupagination = \App\Models\Book::where('judul','like',"%".$find."%")->paginate();
        $totalbuku = $databukupagination->count('id_buku');

        return view('admin.inputan.buku.index',['databukupagination' => $databukupagination])
        ->with( compact('totalbuku') );
    }
}
