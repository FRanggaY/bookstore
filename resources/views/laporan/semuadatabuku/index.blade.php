@extends('layouts.app')
@section('content')
<div class="wrapper">

  @extends('layouts.navbar')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Laporan Semua Buku</h1>
                    </div>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-body">
                <div class="row mb-5">
                    <div class="col-2">
                        <a href="{{ route('printindexalldatabook') }}" target="_blank" rel="noopener noreferrer" class="form-control btn btn-primary ">Cetak</a>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('exportsemuadatabuku') }}" class="form-control btn btn-success ">Export Excel</a>
                    </div>
                </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Buku</th>
                    <th>Judul</th>
                    <th>No ISBN</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Stok</th>
                    <th>Harga Pokok</th>
                    <th>Harga Jual</th>
                    <th>PPN</th>
                    <th>Diskon</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($databuku as $buku)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>FK0000{{ $buku->id_buku }}</td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->noisbn }}</td>
                    <td>{{ $buku->penulis }}</td>
                    <td>{{  $buku->penerbit  }}</td>
                    <td>{{  $buku->stok  }}</td>
                    <td>{{  $buku->harga_pokok  }}</td>
                    <td>{{  $buku->harga_jual  }}</td>
                    <td>{{  $buku->ppn  }}%</td>
                    <td>{{  $buku->diskon  }}%</td>
                </tr>
                @endforeach
                </tbody>
                <thead>
                    <tr>
                    <th>Total</th>
                    <th>{{ $totalbuku }} Buku</th>
                    </tr>
                </thead>
            </table>
            </div>
        </div>

    </div>
</div>
@endsection

