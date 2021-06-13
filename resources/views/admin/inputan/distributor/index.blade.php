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
            <h1 class="m-0">Form Distributor</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    <!-- /.col-md-6 -->
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


            <form action="{{ route('storedistributor') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <label class="form-control btn-secondary">Nama Distributor</label>
                    <input type="text" class="form-control" name="nama_distributor" >
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary">Alamat</label>
                        <textarea type="text" class="form-control" name="alamat" rows="2"></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary">Telpon</label>
                        <input type="text" class="form-control" name="telpon">
                        </div>
                <div class="row">
                <!-- /.col -->
                <div class="col-8"></div>
                <div class="col-4">
                    <button type="submit" class=" form-control btn btn-primary">Save</button>
                </div>
                <!-- /.col -->
                </div>
            </form>
          </div>
          <div class="card-body">
            <form action="{{ route('finddistributor') }}" method="GET">
                <div class="input-group mb-3">
                    <label class="col-2 form-control btn-secondary">Pencarian</label>
                    <input type="text" class="form-control" name="nama_distributor" value="{{ old('nama_distributor') }}">
                    <div class="col-2">
                        <button type="submit" class="form-control btn btn-primary">Cari</button>
                    </div>
                </div>
            </form>
            <div class="col-2">
                <a href="/inputdistributor" class="form-control btn btn-success ">Refresh</a>
            </div>
          </div>
    <!-- /.login-logo -->


    <!-- /.content-header -->
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Nama Distributor</th>
                <th>Alamat</th>
                <th>Telpon</th>
                <th colspan="2">Aksi</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($datadistributorpagination as $distributor)
              <tr>
                <td>{{ $distributor->nama_distributor }}</td>
                <td>{{ $distributor->alamat }}</td>
                <td>{{ $distributor->telpon }}</td>
                <td><a href="/inputdistributor/{{ $distributor->id_distributor }}/edit" class=" form-control btn btn-primary">Edit</a></td>
                <td><a href="/inputdistributor/{{ $distributor->id_distributor }}/delete" class=" form-control btn btn-danger">Delete</a></td>
              </tr>
            @endforeach
            </tbody>
            <thead>
                <tr>
                  <th colspan="2">Jumlah : {{ $totaldistributor }} Distributor </th>
                  <th>{!! $datadistributorpagination->links() !!}</th>
                </tr>
              </thead>
          </table>
        </div>


@endsection

