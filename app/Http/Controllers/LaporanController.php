<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    //Laporan Kasir, manager
    public function indexfilterformbook(){
        $databuku = \App\Models\Book::all();

        return view('laporan.cetakfaktur.index', ['databuku' => $databuku]);
    }
    public function showfilterformbook(request $request){
        $databuku = \App\Models\Book::all();
        $filteridbuku = $request->id_buku;
        $databukupagination = \App\Models\Book::where('id_buku','like',"%".$filteridbuku."%")->paginate();
        $totalbuku = $databukupagination->count('id_buku');

        return view('laporan.cetakfaktur.show', ['databukupagination' => $databukupagination])
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with( compact('totalbuku') )
        ->with( compact('filteridbuku') );
    }
    public function indexallformshop(){
        $databuku = \App\Models\Book::all();
        $totalbuku = $databuku->count('id_buku');

        return view('laporan.semuapenjualan.index', ['databuku' => $databuku])
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with( compact('totalbuku') );
    }
    public function indexfilterdateformbook(){
        $databuku = \App\Models\Book::all();

        return view('laporan.penjualanpertanggal.index', ['databuku' => $databuku]);
    }


    //Laporan Admin,Manager

    public function indexalldatabook(){
        $databuku = \App\Models\Book::all();
        $totalbuku = $databuku->count('id_buku');

        return view('laporan.semuadatabuku.index', ['databuku' => $databuku])
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with( compact('totalbuku') );
    }
    public function indexfilterauthorbook(){
        $databuku = \App\Models\Book::all();

        return view('laporan.filterpenulisbuku.index', ['databuku' => $databuku]);
    }
    public function showfilterpenulis(Request $request){
        $databuku = \App\Models\Book::all();
        $filterpenulis = $request->penulis;
        $databukupagination = \App\Models\Book::where('penulis','like',"%".$filterpenulis."%")->paginate();
        $totalbuku = $databukupagination->count('id_buku');

        return view('laporan.filterpenulisbuku.show', ['databukupagination' => $databukupagination])
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with( compact('totalbuku') )
        ->with( compact('filterpenulis') );
    }
    public function indexbookoftensold(){
        $databuku = \App\Models\Book::all();
        $totalbuku = $databuku->count('id_buku');

        return view('laporan.bukuseringterjual.index', ['databuku' => $databuku])
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with( compact('totalbuku') );
    }
    public function indexbooknotsold(){
        $databuku = \App\Models\Book::all();
        $totalbuku = $databuku->count('id_buku');

        return view('laporan.bukutidakterjual.index', ['databuku' => $databuku])
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with( compact('totalbuku') );
    }
    public function indexsupplierbook(){
        $databuku = \App\Models\Book::all();
        $datapasok = \App\Models\Supplier::all();

        return view('laporan.pasokbuku.index', ['databuku' => $databuku], ['datapasok' => $datapasok] )
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function indexfiltersupplierbook(){
        $databuku = \App\Models\Distributor::all();

        return view('laporan.filterpasokbuku.index', ['databuku' => $databuku]);
    }
    public function showfiltersupplierbook(Request $request){
        $databuku = \App\Models\Distributor::all();
        $filterdistributor = $request->penulis;
        $databukupagination = \App\Models\Distributor::where('nama_distributor','like',"%".$filterdistributor."%")->paginate();
        $totalbuku = $databukupagination->count('id_buku');

        return view('laporan.filterpasokbuku.show', ['databukupagination' => $databukupagination])
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with( compact('totalbuku') )
        ->with( compact('filterdistributor') );
    }
}
