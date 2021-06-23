@extends('layouts.app')
@section('content')
<div class="wrapper">

  @extends('layouts.navbar')



  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Form Setting Laporan</h1>
          </div>
        </div>
      </div>
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

            <form action="{{ route('updateprofile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <label class="form-control btn-secondary col-2">Nama Perusahaan</label>
                    <input type="text" class="form-control" name="nama_perusahaan" value="{{ $dataprofil->nama_perusahaan }}" >
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary col-2">Alamat</label>
                    <textarea type="text" class="form-control" name="alamat" rows="2">{{ $dataprofil->alamat }}</textarea>
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary col-2">No Telpon</label>
                        <input type="text" class="form-control" name="no_tlpn" value="{{ $dataprofil->no_tlpn }}">
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary col-2">Web</label>
                        <input type="text" class="form-control" name="web" value="{{ $dataprofil->web }}">
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary col-2">Logo Laporan</label>
                        <input type="file" class="form-control" name="logo" value="{{ $dataprofil->logo }}">
                        <img src="{{ asset('uploads/profile/'.$dataprofil->logo) }}" width="100">
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary col-2">No Handphone</label>
                        <input type="text" class="form-control" name="no_hp" value="{{ $dataprofil->no_hp }}">
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary col-2">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $dataprofil->email }}">
                    </div>
                <div class="row">
                <div class="col-8"></div>
                <div class="col-4">
                    <button type="submit" class=" form-control btn btn-primary">Perbaharui</button>
                </div>
                </div>
            </form>
          </div>

  </div>


@endsection

