<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Exports\BukuExport;
use App\Exports\PenjualanExport;
use App\Exports\BukuBanyakTerjualExport;
use App\Exports\BukuTidakTerjualExport;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    //Laporan Kasir, manager
    public function indexfilterformbook(){
        $databuku = DB::table('tbl_penjualan')
            ->join('tbl_buku', 'tbl_penjualan.id_buku', '=', 'tbl_buku.id_buku')
            ->orderByRaw('-created_at DESC')
            ->get();

        return view('laporan.cetakfaktur.index', ['databuku' => $databuku]);
    }
    public function showfilterformbook(request $request){
        $filteridbuku = $request->id_buku;

        $databukupagination = DB::table('tbl_penjualan')
            ->join('tbl_buku', 'tbl_penjualan.id_buku', '=', 'tbl_buku.id_buku')
            ->where('tbl_buku.id_buku', '=', $filteridbuku)
            ->get();

        $totalbuku = $databukupagination->count('id_buku');

        return view('laporan.cetakfaktur.show', ['databukupagination' => $databukupagination])
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with( compact('totalbuku') )
        ->with( compact('filteridbuku') );
    }
    public function indexallformshop(){
        $datapenjualan = DB::table('tbl_penjualan')
            ->join('tbl_buku', 'tbl_penjualan.id_buku', '=', 'tbl_buku.id_buku')
            ->orderByRaw('-created_at DESC')
            ->get();
        $totalbuku = $datapenjualan->count('id_buku');

        return view('laporan.semuapenjualan.index', ['databuku' => $datapenjualan])
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with( compact('totalbuku') );
    }
    public function printindexallformshop(){
        $datapenjualan = DB::table('tbl_penjualan')
            ->join('tbl_buku', 'tbl_penjualan.id_buku', '=', 'tbl_buku.id_buku')
            ->orderByRaw('-created_at DESC')
            ->get();
        $totalbuku = $datapenjualan->count('id_buku');
        $infolap = \App\Models\Settinglap::find(1);
        $tanggalcetak = Carbon::now()->format("d-m-Y");

        return view('laporan.semuapenjualan.show', ['databuku' => $datapenjualan])
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with( compact('totalbuku') )
        ->with( compact('infolap') )
        ->with( compact('tanggalcetak') );
    }
    public function indexallformshopexport(){
        return Excel::download(new PenjualanExport, 'penjualan.xlsx');
    }
    public function indexfilterdateformbook(){
        $datapenjualan = DB::table('tbl_penjualan')
            ->join('tbl_buku', 'tbl_penjualan.id_buku', '=', 'tbl_buku.id_buku')
            ->orderByRaw('-created_at DESC')
            ->get();
        $totalbuku = $datapenjualan->count('id_buku');

        return view('laporan.penjualanpertanggal.index', ['databuku' => $datapenjualan])
        ->with( compact('totalbuku') )
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function showfilterdateformbook(Request $request){
        if($request->dateawal==null && $request->dateakhir==null){
            return redirect('/penjualanpertanggal')
            ->with('failed','Mohon isi Periode dan Sampai Dengan');
        }
        else{
        $datapenjualan = DB::table('tbl_penjualan')
            ->join('tbl_buku', 'tbl_penjualan.id_buku', '=', 'tbl_buku.id_buku')
            ->where('created_at','>=',$request->dateawal)
            ->where('created_at','<=',$request->dateakhir)
            ->get();
        $dateawal = $request->dateawal;
        $dateakhir = $request->dateakhir;
        $konfirmdate = false;
        $totalbuku = $datapenjualan->count('id_buku');
        $infolap = \App\Models\Settinglap::find(1);
        $tanggalcetak = Carbon::now()->format("d-m-Y");

        return view('laporan.penjualanpertanggal.show', ['databuku' => $datapenjualan])
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with( compact('dateawal') )
        ->with( compact('dateakhir') )
        ->with( compact('totalbuku') )
        ->with( compact('konfirmdate') )
        ->with( compact('infolap') )
        ->with( compact('tanggalcetak') );
        }
    }
    public function printfilterdateformbook(Request $request){
        $datapenjualan = DB::table('tbl_penjualan')
            ->join('tbl_buku', 'tbl_penjualan.id_buku', '=', 'tbl_buku.id_buku')
            ->get();
        $konfirmdate=true;
        $totalbuku = $datapenjualan->count('id_buku');
        $infolap = \App\Models\Settinglap::find(1);
        $tanggalcetak = Carbon::now()->format("d-m-Y");

        return view('laporan.penjualanpertanggal.show', ['databuku' => $datapenjualan])
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with( compact('totalbuku') )
        ->with( compact('konfirmdate') )
        ->with( compact('infolap') )
        ->with( compact('tanggalcetak') );
    }


    //Laporan Admin,Manager

    public function indexalldatabook(){
        $databuku = \App\Models\Book::all();
        $totalbuku = $databuku->count('id_buku');

        return view('laporan.semuadatabuku.index', ['databuku' => $databuku])
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with( compact('totalbuku') );
    }
    public function printindexalldatabook(){
        $databuku = \App\Models\Book::all();
        $totalbuku = $databuku->count('id_buku');
        $infolap = \App\Models\Settinglap::find(1);
        $tanggalcetak = Carbon::now()->format("d-m-Y");

        return view('laporan.semuadatabuku.show', ['databuku' => $databuku])
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with( compact('totalbuku') )
        ->with( compact('infolap') )
        ->with( compact('tanggalcetak') );
    }
    public function indexalldatabookexport(){
        return Excel::download(new BukuExport, 'buku.xlsx');
    }
    public function indexfilterauthorbook(){
        $databuku = \App\Models\Book::all();

        return view('laporan.filterpenulisbuku.index', ['databuku' => $databuku]);
    }
    public function showfilterpenulis(Request $request){
        $infolap = \App\Models\Settinglap::find(1);
        $tanggalcetak = Carbon::now()->format("d-m-Y");
        $databuku = \App\Models\Book::all();
        $filterpenulis = $request->penulis;
        $databukupagination = \App\Models\Book::where('penulis','like',"%".$filterpenulis."%")->paginate();
        $totalbuku = $databukupagination->count('id_buku');

        return view('laporan.filterpenulisbuku.show', ['databukupagination' => $databukupagination])
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with( compact('totalbuku') )
        ->with( compact('tanggalcetak') )
        ->with( compact('infolap') )
        ->with( compact('filterpenulis') );
    }
    public function indexbookoftensold(){
        $databuku = DB::table('tbl_buku')
            ->join('tbl_penjualan', 'tbl_buku.id_buku', '=', 'tbl_penjualan.id_buku')
            ->orderByRaw('-jumlah_beli ASC')
            ->where('jumlah_beli', '>', 0)
            ->get();
        $totalbuku = $databuku->count('id_buku');

        return view('laporan.bukuseringterjual.index', ['databuku' => $databuku])
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with( compact('totalbuku') );
    }
    public function indexbookoftensoldexport(){
        return Excel::download(new BukuBanyakTerjualExport, 'bukubanyakterjual.xlsx');
    }
    public function indexbooknotsold(){
        $databuku = DB::table('tbl_penjualan')
            ->rightJoin('tbl_buku', 'tbl_penjualan.id_buku', '=', 'tbl_buku.id_buku')
            ->whereNull('jumlah_beli')
            ->get();
        $totalbuku = $databuku->count('id_buku');

        return view('laporan.bukutidakterjual.index', ['databuku' => $databuku])
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with( compact('totalbuku') );
    }
    public function indexbooknotsoldexport(){
        return Excel::download(new BukuTidakTerjualExport, 'bukutidakterjual.xlsx');
    }
    public function indexsupplierbook(){
        $datapasok = DB::table('tbl_pasok')
            ->join('tbl_buku', 'tbl_pasok.id_buku', '=', 'tbl_buku.id_buku')
            ->join('tbl_distributor', 'tbl_pasok.id_distributor', '=', 'tbl_distributor.id_distributor')
            ->orderByRaw('-created_at DESC')
            ->get();
        $totaldata = $datapasok->count('id_buku');

        return view('laporan.pasokbuku.index', ['datapasok' => $datapasok])
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with( compact('totaldata') );
    }
    public function showsupplierbook(Request $request){
        if($request->dateawal==null && $request->dateakhir==null){
            return redirect('/pasokbuku')
            ->with('failed','Mohon isi Periode dan Sampai Dengan');
        }
        else{
        $datapasok = DB::table('tbl_pasok')
            ->join('tbl_buku', 'tbl_pasok.id_buku', '=', 'tbl_buku.id_buku')
            ->join('tbl_distributor', 'tbl_pasok.id_distributor', '=', 'tbl_distributor.id_distributor')
            ->where('created_at','>=',$request->dateawal)
            ->where('created_at','<=',$request->dateakhir)
            ->get();
        $dateawal = $request->dateawal;
        $dateakhir = $request->dateakhir;
        $konfirmdate = false;
        $totalbuku = $datapasok->count('id_buku');
        $infolap = \App\Models\Settinglap::find(1);
        $tanggalcetak = Carbon::now()->format("d-m-Y");
        $totaldata = $datapasok->count('id_buku');

        return view('laporan.pasokbuku.show', ['datapasok' => $datapasok])
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with( compact('dateawal') )
        ->with( compact('dateakhir') )
        ->with( compact('totaldata') )
        ->with( compact('konfirmdate') )
        ->with( compact('infolap') )
        ->with( compact('tanggalcetak') );
        }
    }
    public function printsupplierbook(Request $request){
        $datapasok = DB::table('tbl_pasok')
            ->join('tbl_buku', 'tbl_pasok.id_buku', '=', 'tbl_buku.id_buku')
            ->join('tbl_distributor', 'tbl_pasok.id_distributor', '=', 'tbl_distributor.id_distributor')
            ->get();
        $konfirmdate=true;
        $totalbuku = $datapasok->count('id_buku');
        $infolap = \App\Models\Settinglap::find(1);
        $tanggalcetak = Carbon::now()->format("d-m-Y");
        $totaldata = $datapasok->count('id_buku');

        return view('laporan.pasokbuku.show', ['datapasok' => $datapasok])
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with( compact('totaldata') )
        ->with( compact('konfirmdate') )
        ->with( compact('infolap') )
        ->with( compact('tanggalcetak') );
    }
    public function indexfiltersupplierbook(){
        $datapasok = DB::table('tbl_pasok')
            ->join('tbl_buku', 'tbl_pasok.id_buku', '=', 'tbl_buku.id_buku')
            ->join('tbl_distributor', 'tbl_pasok.id_distributor', '=', 'tbl_distributor.id_distributor')
            ->get();

        return view('laporan.filterpasokbuku.index', ['datapasok' => $datapasok]);
    }
    public function showfiltersupplierbook(Request $request){
        $infolap = \App\Models\Settinglap::find(1);
        $filterdistributor = $request->nama_distributor;
        $tanggalcetak = Carbon::now()->format("d-m-Y");
        $datapasok = DB::table('tbl_pasok')
            ->join('tbl_buku', 'tbl_pasok.id_buku', '=', 'tbl_buku.id_buku')
            ->join('tbl_distributor', 'tbl_pasok.id_distributor', '=', 'tbl_distributor.id_distributor')
            ->where('nama_distributor','like',"%".$filterdistributor."%")
            ->get();
        $totaldata = $datapasok->count('id_buku');

        return view('laporan.filterpasokbuku.show', ['datapasok' => $datapasok])
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with( compact('tanggalcetak') )
        ->with( compact('infolap') )
        ->with( compact('totaldata') )
        ->with( compact('filterdistributor') );
    }
}
