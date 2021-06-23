@extends('layouts.app')
@section('content')
<div class="wrapper">

  @extends('layouts.navbar')

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">LAPORAN PASOK BUKU</h1>
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
      </div>

    <div class="card-body">
        <form action="{{ route('showsupplierbook') }}" target="_blank" rel="noopener noreferrer" method="GET">
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
            <div class="col">
                <button type="submit" class="btn btn-primary btn-block">Tampilkan</button>
            </div>
            </div>
        </form>
        <div class="row">
            <div class="col">
                <a type="submit" href="{{ route('printsupplierbook') }}" target="_blank" rel="noopener noreferrer" class="btn btn-success btn-block">Cetak Semua Data</a>
            </div>
        </div>

      </div>

    <div class="card">
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
            @foreach ($datapasok as $pasok)
              <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $pasok->nama_distributor }}</td>
                <td>{{ $pasok->judul }}</td>
                <td>{{ $pasok->noisbn }}</td>
                <td>{{ $pasok->penulis }}</td>
                <td>{{ $pasok->penerbit }}</td>
                <td>{{ $pasok->harga_jual }}</td>
                <td>{{ $pasok->stok }}</td>
                <td>{{ $pasok->jumlah }}</td>
                <td>{{ Carbon\Carbon::parse($pasok->created_at)->format('m-d-Y') }}</td>
              </tr>
            @endforeach
            </tbody>
            <thead>
                <tr>
                  <th>Jumlah {{ $totaldata }} Data</th>
                </tr>
              </thead>
          </table>
        </div>

    </div>
  </div>
</div>
@endsection

