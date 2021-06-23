@extends('layouts.app')
@section('content')
<div class="wrapper">

  @extends('layouts.navbar')


    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Form Buku</h1>
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


            <form action="{{ route('storebuku') }}" method="POST">
                @csrf
                <div class="input-group mb-3 px-3">
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary col-3">Kode Buku</label>
                        <input type="text" class="form-control" name="id_buku" value="{{ $fkbuku ?? '' }}" disabled>
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary col-3">Judul Buku</label>
                        <input type="text" class="form-control" name="judul" >
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary col-3">No ISBN</label>
                        <input type="text" class="form-control" name="noisbn" >
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary col-3">Penulis</label>
                        <input type="text" class="form-control" name="penulis" >
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary col-3">Penerbit</label>
                        <input type="text" class="form-control" name="penerbit" >
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary col-3">Tahun Terbit</label>
                        <input type="number" class="form-control" name="tahun" >
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary col-3">Harga Pokok</label>
                        <input type="number" class="form-control" name="harga_pokok" >
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary col-3">Harga Jual</label>
                        <input type="number" class="form-control" name="harga_jual" >
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary col-3">Diskon</label>
                        <input type="number" class="form-control col-3" name="diskon" >
                        <label class="form-control btn-secondary col-1">%</label>
                    </div>
                    <div class="col-8"></div>
                    <div class="col-4">
                        <button type="submit" class=" form-control btn btn-primary">Save</button>
                    </div>
            </form>
    </div>


          <div class="card-body">
            <form action="{{ route('findbook') }}" method="GET">
                <div class="input-group mb-3">
                    <label class="col-2 form-control btn-secondary">Pencarian</label>
                    <input type="text" class="form-control" name="judul" value="{{ old('judul') }}">
                    <div class="col-2">
                        <button type="submit" class="form-control btn btn-primary">Cari</button>
                    </div>
                </div>
            </form>
            <div class="col-2">
                <a href="/inputbuku" class="form-control btn btn-success">Refresh</a>
            </div>
          </div>


    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode buku</th>
                        <th>Judul</th>
                        <th>NO ISBN</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Harga Pokok</th>
                        <th>Harga Jual</th>
                        <th>Diskon</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($databukupagination as $buku)
                    <tr>
                        <td>FK0000{{ $buku->id_buku }}</td>
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->noisbn }}</td>
                        <td>{{ $buku->penulis }}</td>
                        <td>{{ $buku->penerbit }}</td>
                        <td>{{ $buku->tahun }}</td>
                        <td>{{ $buku->harga_pokok }}</td>
                        <td>{{ $buku->harga_jual }}</td>
                        <td>{{ $buku->diskon }} %</td>
                        <td><a href="/inputbuku/{{ $buku->id_buku }}/edit" class=" form-control btn btn-primary">Edit</a></td>
                        <td><a href="/inputbuku/{{ $buku->id_buku }}/delete" class=" form-control btn btn-danger" onclick="return confirm('yakin mau dihapus?')">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
                <thead>
                    <tr>
                        <th colspan="2">Jumlah : {{ $totalbuku }} Buku </th>
                        <th>{!! $databukupagination->links() !!}</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>


</div>

@endsection

