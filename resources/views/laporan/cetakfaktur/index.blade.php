@extends('layouts.app')
@section('content')
<div class="wrapper">

  @extends('layouts.navbar')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Form Cetak Faktur Penjualan</h1>
                    </div>
                </div>
            </div>
        </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('showfilterformbook') }}" method="GET" target="_blank" rel="noopener noreferrer" >
                        @csrf
                        <div class="input-group mb-3">
                            <label class="form-control">No Faktur</label>
                            <select type="text" class="form-control" name="id_buku">
                            @foreach ($databuku as $buku)
                                <option value="{{ $buku->id_buku }}">FK0000{{ $buku->id_buku }}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Lihat</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

    </div>
</div>

@endsection

