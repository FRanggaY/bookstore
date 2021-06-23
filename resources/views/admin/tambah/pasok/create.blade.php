@extends('layouts.app')
@section('content')
<div class="wrapper">

  @extends('layouts.navbar')



  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <a href="/inputpasokbuku" class="form-group btn btn-info">Kembali</a>
          <div class="col-sm-6">
            <h1 class="m-0">Form Tambah Pasok Buku</h1>
          </div>
        </div>
      </div>
    </div>


          <div class="card-body">
            <form action="{{ route('storepasok') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <label class="col-4 form-control">Nama Distributor</label>
                    <input type="text" class="form-control" value="{{ $caridistributor->nama_distributor }}" disabled>
                    <input type="text" class="form-control" name="id_distributor" value="{{ $caridistributor->id_distributor }}" hidden>
                </div>
                <div class="input-group mb-3">
                    <label class="col-4 form-control">Pilih Buku</label>
                    <select type="text" class="form-control" name="id_buku">
                        @foreach ($databuku as $buku)
                            <option value="{{ $buku->id_buku }}" >{{ $buku->judul }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label class="col-4 form-control">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" >
                </div>
                <div class="input-group mb-3">
                    <label class="col-4 form-control">Tanggal Pasok</label>
                    <input type="date" class="form-control" name="created_at">
                </div>
                <div class="row">
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Tambah Pasok Buku</button>
                </div>
                </div>
            </form>
          </div>


</div>


</div>

@endsection

