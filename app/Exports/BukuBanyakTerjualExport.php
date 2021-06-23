<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BukuBanyakTerjualExport implements FromView
{
    public function view(): View
    {
        $databuku = DB::table('tbl_buku')
            ->join('tbl_penjualan', 'tbl_buku.id_buku', '=', 'tbl_penjualan.id_buku')
            ->orderByRaw('-jumlah_beli ASC')
            ->where('jumlah_beli', '>', 0)
            ->get();
        $totalbuku = $databuku->count('id_buku');
        return view('laporan.bukuseringterjual.export', [
            'databuku' => $databuku
        ])
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with( compact('totalbuku') );
    }
}
