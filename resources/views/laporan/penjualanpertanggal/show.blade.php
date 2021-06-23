@extends('layouts.app')
@section('content')

<div class="container">
    <!--Tombol Print-->
    <button onclick="window.print()" class="btn btn-primary no-print">Print</button>
    <!--Bagian Atas-->
    <div class="px-5 card">
        <div class="row mt-5">
            <!--Kiri-->
          <div class="col-sm-2">
            <p class="card-text">
                <img src="{{ asset('uploads/profile/'.$infolap->logo) }}" width="100">
            </p>
          </div>
          <!--Tengah-->
          <div class="col-sm-8">
            <h1>
                {{ $infolap->nama_perusahaan }}
            </h1>
            <p class="card-text">
                {{ $infolap->alamat }}
                <br>No. Telp {{ $infolap->no_tlpn }} | Web : {{ $infolap->web }} | Email : {{ $infolap->email }}
            </p>
            <h2 class="text-center">LAPORAN PENJUALAN BUKU</h2>
            @if($konfirmdate==false)
            <h3 class="text-center">Dari tanggal {{ Carbon\Carbon::parse($dateawal)->format('m-d-Y') }} sampai {{ Carbon\Carbon::parse($dateakhir)->format('m-d-Y') }} </h3>
            @endif
        </div>
          <!--Kanan-->
          <div class="col-sm-2">
            <p class="card-text">
                Tanggal Cetak :
                <br>{{ $tanggalcetak }}
            </p>
          </div>
        </div>
    </div>

    <!--card -->
    <div class="card">
        <div class="card-body">
        <!-- tabel -->
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




@endsection

