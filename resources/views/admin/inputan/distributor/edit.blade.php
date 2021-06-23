@extends('layouts.app')
@section('content')
<div class="wrapper">

  @extends('layouts.navbar')



    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <a href="/inputdistributor" class="btn btn-primary">Back</a>
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Form Distributor</h1>
                    </div>
                </div>
            </div>
        </div>


                <form action="/inputdistributor/{{ $datadistributor->id_distributor }}/update" method="POST" class="px-3">
                    @csrf
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary">Nama Distributor</label>
                        <input type="text" class="form-control" name="nama_distributor" value="{{ $datadistributor->nama_distributor }}">
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary">Alamat</label>
                        <textarea type="text" class="form-control" name="alamat" rows="2">{{ $datadistributor->alamat }}</textarea>
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary">Telpon</label>
                        <input type="text" class="form-control" name="telpon" value="{{ $datadistributor->telpon }}">
                    </div>
                    <div class="row">
                        <div class="col-8"></div>
                        <div class="col-4">
                            <button type="submit" class=" form-control btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
    </div>





</div>

@endsection

