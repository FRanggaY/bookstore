@extends('layouts.app')
@section('content')
<div class="wrapper">

  @extends('layouts.navbar')



  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Form Tambah Akun</h1>
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

            <form action="{{ route('storeaccount') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <label class="form-control btn-secondary">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" >
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary">Alamat</label>
                    <textarea type="text" class="form-control" name="alamat" rows="2"></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary">No Telpon</label>
                        <input type="text" class="form-control" name="telpon">
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary">Status</label>
                        <select type="text" class="form-control" name="status">
                            <option value="Sudah Menikah">Sudah Menikah</option>
                            <option value="Belum Menikah">Belum Menikah</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control btn-secondary">Akses</label>
                        <select type="text" class="form-control" name="akses">
                            <option value="manager">Manager</option>
                            <option value="admin">Admin</option>
                            <option value="kasir">Kasir</option>
                        </select>
                    </div>
                <div class="row">
                <div class="col-8"></div>
                <div class="col-4">
                    <button type="submit" class=" form-control btn btn-primary">Save</button>
                </div>
                </div>
            </form>
          </div>

  </div>

</div>

@endsection

