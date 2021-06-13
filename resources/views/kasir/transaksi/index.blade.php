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
            <h1 class="m-0">Form Penjualan</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="card-body">
        @if (Session::get('success'))
        <div class="btn btn-success">
            {{ Session::get('success') }}
          </div>
        @endif
        @if (Session::get('failed'))
        <div class="btn btn-danger">
            {{ Session::get('failed') }}
          </div>
        @endif
    </div>
    <!-- /.col-md-6 -->
          <div class="card-body">
                <div class="input-group mb-3">
                    <label class="form-control">Pilih Buku</label>
                    <input type="text" class="form-control" name="judul" disabled>
                    <button type="button" class="form-group btn btn-info" data-toggle="modal" data-target="#databuku">Lihat</button>
                 </div>
          </div>
    <!-- /.login-logo -->

    <div class="modal fade" id="databuku">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Data Buku</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Judul</th>
                          <th>Penulis</th>
                          <th>Penerbit</th>
                          <th>Tahun</th>
                          <th>Harga Jual</th>
                          <th>Stok</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($databuku as $buku)
                        <tr>
                          <td><a href="/penjualan/{{ $buku->id_buku }}/edit" class="form-control">{{ $buku->judul }}</a></td>
                          <td>{{ $buku->penulis }}</td>
                          <td>{{ $buku->penerbit }}</td>
                          <td>{{ $buku->tahun }}</td>
                          <td>{{ $buku->harga_jual }}</td>
                          <td>{{ $buku->stok }}</td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


</div>

@endsection

