@extends('layouts.app')
@section('content')
<div class="wrapper">

  @extends('layouts.navbar')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Laporan Semua Buku</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    <!-- /.content-header -->
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row mb-5">
                <div class="col-2">
                    <a href="" class="form-control btn btn-primary ">Cetak</a>
                </div>
                <div class="col-2">
                    <a href="" class="form-control btn btn-success ">Export Excel</a>
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
                <td>{{ $buku->id_buku }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->noisbn }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>{{  $buku->penerbit  }}</td>
                <td>{{  $buku->stok  }}</td>
                <td>{{  $buku->harga_pokok  }}</td>
                <td>{{  $buku->harga_jual  }}</td>
                <td>{{  $buku->ppn  }}</td>
                <td>{{  $buku->diskon  }}</td>
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


@endsection

