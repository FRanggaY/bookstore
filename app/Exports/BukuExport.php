<?php

namespace App\Exports;

use App\Models\Book;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BukuExport implements FromView
{
    public function view(): View
    {
        $databuku = \App\Models\Book::all();
        $totalbuku = $databuku->count('id_buku');
        return view('laporan.semuadatabuku.export', [
            'databuku' => Book::all()
        ])
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with( compact('totalbuku') );
    }
}
