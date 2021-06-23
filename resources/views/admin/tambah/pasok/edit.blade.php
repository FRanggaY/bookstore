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
            <form action="/inputpasokbuku/{{ $id_pasok }}/update" method="POST" class="px-3">
                @csrf
                <div class="input-group mb-3">
                    <label class="col-4 form-control">Nama Distributor</label>
                    <select type="text" class="form-control" name="id_distributor">
                        @foreach ($datadistributor->unique('nama_distributor') as $distributor)
                            <option value="{{ $distributor->id_distributor }}" {{ $distributor->id_distributor == $id_distributor ? 'selected' : '' }} >{{ $distributor->nama_distributor }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label class="col-4 form-control">Judul Buku</label>
                    <label class="form-control">{{ $judul }}</label>
                    <input type="text" class="form-control" name="id_buku" value="{{ $id_buku }}" hidden>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label class="col-4 form-control">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" value="{{ $jumlah }}" >
                    <input type="number" class="form-control" name="oldjumlah" value="{{ $jumlah }}" hidden>
                </div>
                <div class="input-group mb-3">
                    <label class="col-4 form-control">Tanggal Pasok</label>
                    <input type="date" class="form-control" name="created_at" value="{{\Carbon\Carbon::parse($created_at)->format('Y-m-d')}}">
                </div>
                <div class="row">
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Update Pasok Buku</button>
                </div>
                </div>
            </form>
          </div>


</div>


</div>

@endsection

