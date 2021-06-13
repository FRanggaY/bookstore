@extends('layouts.app')
@section('content')
<div class="wrapper">

    @extends('layouts.navbar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Selamat Datang</h1>
          </div><!-- /.col -->
          @if (Session::get('success'))
          <div class="col-sm-6">
            <div id="toastsContainerTopRight" class="toasts-top-right fixed">
                <div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <strong class="mr-auto">Selamat Datang {{ auth()->user()->akses }} </strong>
                    </div>
                    <div class="toast-body">{{ Session::get('success') }}</div>
                </div>
                </div>
          </div>
          @endif
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"><a disabled="disabled" class="h1"><b>Book</b>Store</a></h5>

                <p class="card-text mb-5">
                  {{ $infolap->alamat }}
                </p>
                <p class="card-text">
                    <img src="{{ asset('uploads/profile/'.$infolap->logo) }}" width="400">
                </p>



                <a class="card-link col-6" disabled>{{ $infolap->web }}</a>
                <a class="card-link col-6" disabled>{{ $infolap->email }}</a>
              </div>
            </div>


@endsection

