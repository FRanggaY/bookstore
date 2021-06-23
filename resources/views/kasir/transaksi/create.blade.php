@extends('layouts.app')
@section('content')
<div class="wrapper">

  @extends('layouts.navbar')



  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <a href="/penjualan" class="form-group btn btn-info">Kembali</a>
          <div class="col-sm-6">
            <h1 class="m-0">Form Penjualan</h1>
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
            <form action="{{ route('updateformshop') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <label class="form-control">No Faktur</label>
                    <input type="text" class="form-control" name="id_buku" value="{{ $databuku->getfakturID() }}" disabled>
                    <input type="text" class="form-control" name="id_buku" value="{{ $databuku->id_buku }}" hidden>
                </div>
                <div class="input-group mb-3">
                    <label class="form-control">Judul Buku</label>
                    <input type="text" class="form-control" name="judul" value="{{ $databuku->judul }}"  disabled>
                </div>
                <div class="input-group mb-3">
                    <label class="form-control">Harga Buku</label>
                    <input type="number" class="form-control" name="harga_jual" id="harga_jual" value="{{ $databuku->harga_jual }}" disabled>
                </div>
                <div class="input-group mb-3">
                    <label class="form-control">Jumlah Beli</label>
                    <input type="text" class="form-control" name="jumlah_beli" onkeyup="mult(this.value)">
                </div>
                <div class="input-group mb-3">
                    <label class="form-control">Total Harga</label>
                    <input type="number" class="form-control" readonly name="total_harga" id="total_harga">
                </div>
                <div class="row">
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Tambah Buku</button>
                </div>
                </div>
            </form>
          </div>


</div>


</div>
<script>
    function mult(value){
        harga_jual = document.getElementById('harga_jual').value;
        x=harga_jual * value;

        document.getElementById('total_harga').value = x;
    }
</script>

@endsection

