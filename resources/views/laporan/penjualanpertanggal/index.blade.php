@extends('layouts.app')
@section('content')
<div class="wrapper">

    @extends('layouts.navbar')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>FILTER PENJUALAN PERTANGGAL</h1>
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
            <form action="{{ route('showfilterdateformbook') }}"  target="_blank" rel="noopener noreferrer" method="GET">
                @csrf
                <div class="input-group mb-3">
                    <label class="form-control">Periode</label>
                    <input type="date" class="form-control" name="dateawal">
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control">Sampai Dengan</label>
                        <input type="date" class="form-control" name="dateakhir">
                        </div>
                <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-primary btn-block">Tampilkan</button>
                </div>
                </div>
            </form>
            <div class="row mb-5">
                <div class="col-2">
                    <a href="{{ route('printfilterdateformbook') }}" target="_blank" rel="noopener noreferrer" class="form-control btn btn-success ">Cetak Semua Data</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Faktur</th>
                            <th>Judul Buku</th>
                            <th>ISBN</th>
                            <th>Jumlah Beli</th>
                            <th>Harga Satuan</th>
                            <th>PPN</th>
                            <th>Diskon</th>
                            <th>Total Harga</th>
                            <th>Tanggal Transaksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $grandtotal=0;
                        $jumlahbuku=0;
                    ?>
                    @foreach ($databuku as $buku)
                    <?php
                        $subtotal = ($buku->harga_jual*$buku->jumlah_beli) + ($buku->harga_jual * $buku->ppn/100) - ($buku->harga_jual * $buku->diskon/100);
                    ?>
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>FK0000{{ $buku->id_buku }}</td>
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->noisbn }}</td>
                        <td>{{ $buku->jumlah_beli }}</td>
                        <td>{{  $buku->harga_jual  }}</td>
                        <td>{{  $buku->ppn  }}%</td>
                        <td>{{  $buku->diskon  }}%</td>
                        <td>{{ $subtotal }}</td>
                        <td>{{ Carbon\Carbon::parse($buku->created_at)->format('m-d-Y') }}</td>
                    </tr>
                    <?php
                    $grandtotal+= $subtotal;
                    $jumlahbuku+= $buku->jumlah_beli;
                    ?>
                    @endforeach
                    </tbody>
                    <thead>
                        <tr>
                        <th>Total</th>
                        <th colspan="2">{{ $totalbuku }} Transaksi</th>
                        <th>Jumlah Buku</th>
                        <th>{{ $jumlahbuku }} Buku</th>
                        <th></th>
                        <th></th>
                        <th>Grand Total</th>
                        <th>{{ $grandtotal }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>




    </div>
</div>


@endsection

