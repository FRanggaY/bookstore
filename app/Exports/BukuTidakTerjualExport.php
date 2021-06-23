<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BukuTidakTerjualExport implements FromView
{
    public function view(): View
    {
        $databuku = DB::table('tbl_penjualan')
            ->rightJoin('tbl_buku', 'tbl_penjualan.id_buku', '=', 'tbl_buku.id_buku')
            ->whereNull('jumlah_beli')
            ->get();
        $totalbuku = $databuku->count('id_buku');
        return view('laporan.bukutidakterjual.export', [
            'databuku' => $databuku
        ])
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with( compact('totalbuku') );
    }
}
