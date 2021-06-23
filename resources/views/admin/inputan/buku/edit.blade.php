@extends('layouts.app')
@section('content')
<div class="wrapper">

  @extends('layouts.navbar')



    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <a href="/inputbuku" class="btn btn-primary">Back</a>
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Form Buku</h1>
                </div>
                </div>
            </div>
        </div>


            <form action="/inputbuku/{{ $databuku->id_buku }}/update" method="POST">
                @csrf
                <div class="input-group mb-3 px-3">
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary col-3">Kode Buku</label>
                        <input type="text" class="form-control" name="id_buku" value="{{ $databuku->id_buku }}">
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary col-3">Judul Buku</label>
                        <input type="text" class="form-control" name="judul" value="{{ $databuku->judul }}">
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary col-3">No ISBN</label>
                        <input type="text" class="form-control" name="noisbn" value="{{ $databuku->noisbn }}">
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary col-3">Penulis</label>
                        <input type="text" class="form-control" name="penulis" value="{{ $databuku->penulis }}">
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary col-3">Penerbit</label>
                        <input type="text" class="form-control" name="penerbit" value="{{ $databuku->penerbit }}">
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary col-3">Tahun Terbit</label>
                        <input type="number" class="form-control" name="tahun" value="{{ $databuku->tahun }}">
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary col-3">Harga Pokok</label>
                        <input type="number" class="form-control" name="harga_pokok" value="{{ $databuku->harga_pokok }}">
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary col-3">Harga Jual</label>
                        <input type="number" class="form-control" name="harga_jual" value="{{ $databuku->harga_jual }}">
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary col-3">Diskon</label>
                        <input type="number" class="form-control col-3" name="diskon" value="{{ $databuku->diskon }}">
                        <label class="form-control btn-secondary col-1">%</label>
                    </div>
                    <div class="col-8"></div>
                    <div class="col-4">
                        <button type="submit" class=" form-control btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
    </div>

</div>

@endsection

