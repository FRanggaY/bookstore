<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PenjualanExport implements FromView
{
    public function view(): View
    {
        $datapenjualan = DB::table('tbl_penjualan')
            ->join('tbl_buku', 'tbl_penjualan.id_buku', '=', 'tbl_buku.id_buku')
            ->orderByRaw('-created_at DESC')
            ->get();
        $totalbuku = $datapenjualan->count('id_buku');
        return view('laporan.semuapenjualan.export', [
            'databuku' => $datapenjualan
        ])
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with( compact('totalbuku') );
    }
}
