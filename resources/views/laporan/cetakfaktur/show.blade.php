@extends('layouts.app')
@section('content')
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <span class="brand-text font-weight-light">Cetak Struk</span>
    </a>
    <a href="/formcetakfaktur" class="brand-link">
        <span class="brand-text font-weight-light">Back</span>
      </a>
</aside>
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mt-5">
          <div class="col-sm-6">
            <h1 class="m-0">Form Struk</h1>
          </div><!-- /.col -->
        </div>
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
                <th>Judul</th>
                <th>Jumlah Beli</th>
                <th>Harga Satuan</th>
                <th>PPN</th>
                <th>Diskon</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($databukupagination as $buku)
              <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $buku->id_buku }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{  $buku->harga_jual  }}</td>
                <td>{{  $buku->ppn  }}</td>
                <td>{{  $buku->diskon  }}</td>
                <td>sfsjk</td>
              </tr>
            @endforeach
            </tbody>
            <thead>
                <tr>
                  <th>Total</th>
                  <th colspan="4">{{ $totalbuku }} Buku</th>
                  <th>Grand Total</th>
                  <th>{{ $totalbuku }} Buku</th>
                </tr>
                <tr>
                    <th colspan="5"></th>
                    <th>Bayar</th>
                    <th>{{ $totalbuku }} Buku</th>
                  </tr>
                  <tr>
                    <th colspan="5"></th>
                    <th>Kembalian</th>
                    <th>{{ $totalbuku }} Buku</th>
                  </tr>
              </thead>
          </table>
        </div>











</div>
    <!-- /.login-logo -->




@endsection

