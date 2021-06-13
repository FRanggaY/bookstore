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
            <h1 class="m-0">FILTER PENJUALAN PERTANGGAL</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    <div class="card-body">
        <form action="" method="GET">
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
        <div class="row mb-5">
            <div class="col-2">
                <a href="/penjualanpertanggal" class="form-control btn btn-warning ">Refresh</a>
            </div>
            <div class="col-2">
                <a href="" class="form-control btn btn-success ">Cetak</a>
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
                <th>No Faktur</th>
                <th>Judul</th>
                <th>No ISBN</th>
                <th>Jumlah Beli</th>
                <th>Harga Satuan</th>
                <th>PPN</th>
                <th>Diskon</th>
                <th>Total</th>
                <th>Tanggal</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($databuku as $buku)
              <tr>
                <td>1</td>
                <td>{{ $buku->id_buku }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->noisbn }}</td>
                <td>
                    halo
                  </td>
                <td>{{ $buku->harga_jual }}</td>

                <td>{{ $buku->ppn }}</td>
                <td>{{  $buku->diskon  }}</td>
                <td style="width: 40px">( strsum(hargasatuanxjumlahbeli) + (hargasatuanxjumlahbelixppn) - (hargasatuanxjumlahbelixdiskon) )</td>
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

