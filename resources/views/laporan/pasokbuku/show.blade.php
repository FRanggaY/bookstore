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
            <h2 class="text-center">LAPORAN PASOK BUKU</h2>
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
                        <th>Nama Distributor</th>
                        <th>Judul Buku</th>
                        <th>No ISBN</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th>Jumlah Pasok</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datapasok as $pasok)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $pasok->nama_distributor }}</td>
                      <td>{{ $pasok->judul }}</td>
                      <td>{{ $pasok->noisbn }}</td>
                      <td>{{ $pasok->penulis }}</td>
                      <td>{{ $pasok->penerbit }}</td>
                      <td>{{ $pasok->harga_jual }}</td>
                      <td>{{ $pasok->stok }}</td>
                      <td>{{ $pasok->jumlah }}</td>
                      <td>{{ Carbon\Carbon::parse($pasok->created_at)->format('m-d-Y') }}</td>
                    </tr>
                  @endforeach
                </tbody>
                <thead>
                    <tr>
                      <th>Jumlah {{ $totaldata }} Data</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>










</div>




@endsection

