<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Distributor;
use App\Models\Book;
use App\Models\Supplier;

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

        $idbukuold = \App\Models\Book::max('id_buku');
        $idbukunew = (int) $idbukuold + 1;
        $fkKode = $idbukunew;

        $fkbuku = 'FK0000' . $fkKode;

        return view('admin.inputan.buku.index', ['databukupagination' => $databukupagination])
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with( compact('totalbuku') )
        ->with( compact('fkbuku') );
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
    public function indexinputpasok()
    {
        $datapasok = DB::table('tbl_pasok')
        ->join('tbl_buku', 'tbl_pasok.id_buku', '=', 'tbl_buku.id_buku')
        ->join('tbl_distributor', 'tbl_pasok.id_distributor', '=', 'tbl_distributor.id_distributor')
        ->get();
        $datadistributor = \App\Models\Distributor::all();

        return view('admin.tambah.pasok.index', ['datapasok' => $datapasok])
        ->with(compact('datadistributor'));
    }
    public function tambahinputpasok(Request $request)
    {
        $datapasok = \App\Models\Distributor::all();
        $databuku = \App\Models\Book::all();
        $caridistributor = \App\Models\Distributor::find($request->id_distributor);

        return view('admin.tambah.pasok.create', ['datapasok' => $datapasok])
        ->with( compact('caridistributor'))
        ->with( compact('databuku'));
    }
    public function storepasok(Request $request)
    {
        $request->validate([
            'id_buku' => 'required',
            'jumlah' => 'required',
            'created_at' => 'required',
        ]);
        $book = Book::where('id_buku', $request->id_buku)->get();
        foreach ($book as $bk) {
            $stok = $bk->stok;
        }
        $newstok = $stok + $request->jumlah;
        Supplier::create([
            'id_distributor' => $request->id_distributor,
            'id_buku' => $request->id_buku,
            'jumlah' => $request->jumlah,
            'created_at' => $request->created_at,
            'updated_at' => $request->created_at,
            ]);
        $set_stok = Book::find($request->id_buku);
        $set_stok->stok = $newstok;
        $set_stok->save();

        return redirect('/inputpasokbuku')
        ->with('success','Data Pasok Berhasil Dibuat');
    }
    public function editpasok($pasid)
    {
        $datadistributor = \App\Models\Distributor::all();
        $datapasok = DB::table('tbl_pasok')
        ->join('tbl_buku', 'tbl_pasok.id_buku', '=', 'tbl_buku.id_buku')
        ->join('tbl_distributor', 'tbl_pasok.id_distributor', '=', 'tbl_distributor.id_distributor')
        ->where('id_pasok', "=" ,$pasid)
        ->get();
        foreach ($datapasok as $pasok) {
            $nama = $pasok->nama_distributor;
            $judul = $pasok->judul;
            $id_pasok = $pasid;
            $id_distributor = $pasok->id_distributor;
            $id_buku =  $pasok->id_buku;
            $jumlah = $pasok->jumlah;
            $created_at = $pasok->created_at;
        };
        $databuku = \App\Models\Book::all();
        return view('admin.tambah.pasok.edit')
        ->with(compact('nama'))
        ->with(compact('judul'))
        ->with(compact('id_pasok'))
        ->with(compact('id_distributor'))
        ->with(compact('id_buku'))
        ->with(compact('jumlah'))
        ->with(compact('created_at'))
        ->with(compact('databuku'))
        ->with(compact('datadistributor'));
    }
    public function updatepasok($pasid, Request $request)
    {
        $book = Book::where('id_buku', $request->id_buku)->get();
        foreach ($book as $bk) {
            $stok = $bk->stok;
        }
        $oldstok = $request->oldjumlah;
        $newstok = $stok - $oldstok;
        $set_stok = Book::find($request->id_buku);
        $set_stok->stok = $newstok+$request->jumlah;
        $set_stok->save();



        $datapasok = \App\Models\Supplier::find($pasid);
        $updatedata = $datapasok->update($request->all());
        if ( $updatedata ) {
            return redirect('/inputpasokbuku')->with('success', 'Data Berhasil Diupdate');
        }
        return redirect('/inputpasokbuku')->with('failed', 'Data Gagal Diupdate');
    }
    public function destroydpasok($pasid)
    {
        $datapasok = \App\Models\Supplier::find($pasid);
        $pasok = Supplier::where('id_pasok', $pasid)->get();
        foreach ($pasok as $pasok){
            $idbuku = $pasok->id_buku;
            $pasokstok = $pasok->jumlah;
        }
        $book = Book::where('id_buku', $idbuku)->get();
        foreach ($book as $bk) {
            $stok = $bk->stok;
        }
        $set_stok = Book::find($idbuku);
        $set_stok->stok = $stok-$pasokstok;
        $set_stok->save();


        $hapus = $datapasok->delete();
        if ( $hapus ) {
            return redirect('/inputpasokbuku')->with('success', 'Data Berhasil Dihapus');
        }
        return redirect('/inputpasokbuku')->with('failed', 'Data Gagal Dihapus');
    }
}
