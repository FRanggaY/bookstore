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
            <h1 class="m-0">Form Filter Buku Berdasarkan Distributor</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="card-body">
        <form action="{{ route('showfiltersupplierbook') }}" method="GET">
            <div class="input-group mb-3">
                <label class="col-2 form-control btn-secondary">Nama Distributor</label>
                <select type="text" class="form-control" name="penulis">
                    @foreach ($databuku as $buku)
                        <option value="{{ $buku->nama_distributor }}">{{ $buku->nama_distributor }}</option>
                    @endforeach
                  </select>
                <div class="col-2">
                    <button type="submit" class="form-control btn btn-primary">Cari</button>
                </div>
            </div>
        </form>
      </div>
    <!-- /.login-logo -->




@endsection

