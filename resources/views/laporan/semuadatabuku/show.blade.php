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
            <h2 class="text-center">LAPORAN SEMUA BUKU</h2>
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




@endsection

