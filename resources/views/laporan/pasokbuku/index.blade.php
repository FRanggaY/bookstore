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
            <h1 class="m-0">LAPORAN PASOK BUKU</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    <div class="card-body">
        <form action="" method="POST">
            @csrf
            <div class="input-group mb-3">
                <label class="form-control">Periode</label>
                <input type="date" class="form-control" name="dateawal">
                </div>
                <div class="input-group mb-3">
                    <label class="form-control">Sampai Dengan</label>
                    <input type="date" class="form-control" name="dateakhir">
                    </div>
            <div class="row">
            <!-- /.col -->
            <div class="col">
                <button type="submit" class="btn btn-primary btn-block">Tampilkan</button>
            </div>
            <!-- /.col -->
            </div>
        </form>
        <div class="row">
            <div class="col">
                    <button type="submit" class="btn btn-warning btn-block">Refresh</button>
                    <button type="submit" class="btn btn-success btn-block">Cetak</button>
            </div>
        </div>

      </div>

    <!-- /.content-header -->
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
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
            @foreach ($databuku as $buku)
              <tr>
                <td>1</td>
                <td>SIdoarjghslfl</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->noisbn }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>{{ $buku->penerbit }}</td>
                <td>{{ $buku->harga_jual }}</td>
                <td>{{ $buku->stok }}</td>
                <td>sfhkfkasksfak</td>
                <td>{{  $buku->created_at  }}</td>
              </tr>
            @endforeach
            </tbody>
            <thead>
                <tr>
                  <th>Total</th>
                  <th>BRP juta</th>
                </tr>
              </thead>
          </table>
        </div>


@endsection

