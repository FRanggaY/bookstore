@extends('layouts.app')
@section('content')
<div class="wrapper">

  @extends('layouts.navbar')

  <div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Pasok Buku</h1>
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
        <form action="{{ route('tambahinputpasok') }}" method="GET">
            <div class="input-group mb-3">
                <label class="col-2 form-control btn-secondary">Nama Distributor</label>
                <select type="text" class="form-control" name="id_distributor">
                    @foreach ($datadistributor as $distributor)
                        <option value="{{ $distributor->id_distributor }}" >{{ $distributor->nama_distributor }}</option>
                    @endforeach
                </select>
                <div class="col-2">
                    <button type="submit" class="form-control btn btn-primary">Pilih</button>
                </div>
            </div>
        </form>
      </div>


      <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Distributor</th>
                        <th>Judul</th>
                        <th>Jumlah Pasok</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($datapasok as $pasok)
                    <tr>
                        <td>{{ $pasok->nama_distributor }}</td>
                        <td>{{ $pasok->judul }}</td>
                        <td>{{ $pasok->jumlah }}</td>
                        <td><a href="/inputpasokbuku/{{ $pasok->id_pasok }}/edit" class=" form-control btn btn-primary">Edit</a></td>
                        <td><a href="/inputpasokbuku/{{ $pasok->id_pasok }}/delete" class=" form-control btn btn-danger" onclick="return confirm('yakin mau dihapus?')">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


  </div>
</div>

@endsection

