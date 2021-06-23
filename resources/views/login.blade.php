@extends('layouts.app')

@section('content')
<div class="hold-transition login-page">
    <div class="login-box">

        @if (Session::get('failed'))
        <div class="btn btn-danger">
            {{ Session::get('failed') }}
        </div>
        @endif


            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a disabled="disabled" class="h1"><b>Book</b>Store</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('postlogin') }}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <select type="text" class="form-control" name="akses" placeholder="Akses">
                                <option>Pilih salah satu Akses</option>
                                <option value="manager">Manager</option>
                                <option value="admin">Admin</option>
                                <option value="kasir">Kasir</option>
                            </select>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Log In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>




    </div>
</div>
@endsection
