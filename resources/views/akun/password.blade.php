@extends('layouts.app')

@section('content')

@extends('layouts.navbar')

<div class="hold-transition login-page">
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


    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0">Ganti Password</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('update-password') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="old_password" placeholder="Password Lama">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password Baru">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Update Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>




</div>
@endsection
