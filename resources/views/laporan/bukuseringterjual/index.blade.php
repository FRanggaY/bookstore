@extends('layouts.app')
@section('content')
<div class="wrapper">

  @extends('layouts.navbar')



  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Buku Banyak Terjual</h1>
          </div>
        </div>
      </div>
    </div>


    <div class="card">
        <div class="card-body">
            <div class="row mb-5">
                <div class="col-2">
                    <a href="{{ route('exportdatabukubanyakterjual') }}" class="form-control btn btn-success ">Export Excel</a>
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
                <th>Harga Jual</th>
                <th>Total Jumlah Beli</th>
                <th>Total Transaksi</th>
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
                <td>{{  $buku->harga_jual  }}</td>
                <td>{{  $buku->jumlah_beli  }}</td>
                <td>{{  $buku->total_harga  }}</td>
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

