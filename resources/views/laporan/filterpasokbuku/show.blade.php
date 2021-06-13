@extends('layouts.app')
@section('content')
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <span class="brand-text font-weight-light">Print</span>
    </a>
    <a href="/filterpasokbuku" class="brand-link">
        <span class="brand-text font-weight-light">Back</span>
      </a>
</aside>
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <a disabled="disabled" class="h1"><b>Book</b>Store</a>
        <div class="row mt-5">
          <div class="col-sm-6">
            <h1 class="m-0">LAPORAN BUKU BERDASARKAN DISTRIBUTOR</h1>
          </div><!-- /.col -->
        </div>
        <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Nama Penulis : {{ $filterdistributor }} </h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- /.col-md-6 -->
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
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
            @foreach ($databukupagination as $buku)
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











</div>
    <!-- /.login-logo -->




@endsection

