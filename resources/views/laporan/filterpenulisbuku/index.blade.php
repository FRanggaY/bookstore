@extends('layouts.app')
@section('content')
<div class="wrapper">

  @extends('layouts.navbar')

  <div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Filter Buku Berdasarkan Penulis</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <form action="{{ route('showfilterpenulis') }}" target="_blank" rel="noopener noreferrer" method="GET">
            <div class="input-group mb-3">
                <label class="col-2 form-control btn-secondary">Nama Penulis</label>
                <select type="text" class="form-control" name="penulis">
                    @foreach ($databuku->unique('penulis') as $buku)
                        <option value="{{ $buku->penulis }}" >{{ $buku->penulis }}</option>
                    @endforeach
                  </select>
                <div class="col-2">
                    <button type="submit" class="form-control btn btn-primary">Cari</button>
                </div>
            </div>
        </form>
      </div>


  </div>
</div>

@endsection

