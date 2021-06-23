@extends('layouts.app')
@section('content')
<div class="wrapper">

  @extends('layouts.navbar')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Semua Penjualan Buku</h1>
                </div>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-body">
                <div class="row mb-5">
                    <div class="col-2">
                        <a href="{{ route('printindexallformshop') }}" class="form-control btn btn-primary" target="_blank" rel="noopener noreferrer">Cetak</a>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('exportindexallformshop') }}" class="form-control btn btn-success ">Export Excel</a>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>No Faktur</th>
                        <th>Judul Buku</th>
                        <th>ISBN</th>
                        <th>Jumlah Beli</th>
                        <th>Harga Satuan</th>
                        <th>PPN</th>
                        <th>Diskon</th>
                        <th>Total Harga</th>
                        <th>Tanggal Transaksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $grandtotal=0;
                        $jumlahbuku=0;
                    ?>
                    @foreach ($databuku as $buku)
                    <?php
                        $subtotal = ($buku->harga_jual*$buku->jumlah_beli) + ($buku->harga_jual * $buku->ppn/100) - ($buku->harga_jual * $buku->diskon/100);
                    ?>
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>FK0000{{ $buku->id_buku }}</td>
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->noisbn }}</td>
                        <td>{{ $buku->jumlah_beli }}</td>
                        <td>{{  $buku->harga_jual  }}</td>
                        <td>{{  $buku->ppn  }}%</td>
                        <td>{{  $buku->diskon  }}%</td>
                        <td>{{ $subtotal }}</td>
                        <td>{{ Carbon\Carbon::parse($buku->created_at)->format('m-d-Y') }}</td>
                    </tr>
                    <?php
                    $grandtotal+= $subtotal;
                    $jumlahbuku+= $buku->jumlah_beli;
                    ?>
                    @endforeach
                    </tbody>
                    <thead>
                        <tr>
                        <th>Total</th>
                        <th colspan="2">{{ $totalbuku }} Transaksi</th>
                        <th>Jumlah Buku</th>
                        <th>{{ $jumlahbuku }} Buku</th>
                        <th></th>
                        <th></th>
                        <th>Grand Total</th>
                        <th>{{ $grandtotal }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>





    </div>
</div>


@endsection

