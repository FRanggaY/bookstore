@extends('layouts.app')
@section('content')
<div class="wrapper">

  @extends('layouts.navbar')

    <div class="content-wrapper">


            <div class="content-header">
                <div class="container-fluid">
                    <!-- judul -->
                    <h1>Form Penjualan</h1>
                </div>
            </div>

            <!-- notifikasi -->
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

            <!-- Pilih Buku -->
            <div class="card-body">
                <div class="input-group mb-3">
                    <label class="form-control">Pilih Buku</label>
                    <button type="button" class="form-control btn btn-info" data-toggle="modal" data-target="#databuku">Lihat</button>
                </div>
            </div>

            <!-- modal tabel pilih buku -->
            <div class="modal fade" id="databuku">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Data Buku</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Penulis</th>
                                        <th>Penerbit</th>
                                        <th>Tahun</th>
                                        <th>Harga Jual</th>
                                        <th>Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($databuku as $buku)
                                    <tr>
                                        <td><a href="/penjualan/{{ $buku->id_buku }}/edit" class="form-control">{{ $buku->judul }}</a></td>
                                        <td>{{ $buku->penulis }}</td>
                                        <td>{{ $buku->penerbit }}</td>
                                        <td>{{ $buku->tahun }}</td>
                                        <td>{{ $buku->harga_jual }}</td>
                                        <td>{{ $buku->stok }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            @if($datahistory==true)
            <div class="card-body">
                <div class="input-group mb-3">
                    <label class="form-control text-center">Silahkan Pilih Buku</label>
                </div>
            </div>
            @endif
            @if($datahistory==false)
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered mb-5">
                        <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah Beli</th>
                            <th>PPN</th>
                            <th>Diskon</th>
                            <th>Total</th>
                            <th colspan="1">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $grandtotal=0;
                        ?>
                        @foreach ($datapenjualan as $buku)
                        <?php
                            $subtotal = (
                                            ($buku->harga_jual*$buku->jumlah_beli)
                                            +
                                            ($buku->harga_jual*$buku->ppn/100)
                                        )
                                            -
                                        ($buku->harga_jual*$buku->diskon/100);
                        ?>
                        <tr>
                            <td>{{ $buku->judul }}</td>
                            <td>{{ $buku->harga_jual }}</td>
                            <td>{{ $buku->jumlah_beli }}</td>
                            <td>{{ $buku->ppn }}%</td>
                            <td>{{ $buku->diskon }}%</td>
                            <td>{{ $subtotal }}</td>
                            <td><a href="/penjualan/{{ $buku->id_buku }}/delete" class=" form-control btn btn-danger" onclick="return confirm('yakin mau dihapus?')">Delete</a></td>
                        </tr>
                        <?php
                            $grandtotal+= $subtotal;
                        ?>
                        @endforeach
                        </tbody>
                        <thead>
                            <tr>
                                <th class="bg-red text-right" colspan="5">Grand Total </th>
                                <th class="bg-green">
                                    <input type="text" class="form-control bg-green" id="grandtotal" value="{{ $grandtotal }}" disabled>
                                </th>
                                <th class="bg-red"></th>
                            </tr>
                        </thead>
                    </table>

                    <form action="{{ route('saveformshop') }}" method="POST">
                        @csrf
                            <div class="input-group mb-3">
                                <input type="text" hidden name="total_harga" value="{{ $grandtotal }}">
                                <input type="text" hidden name="jumlah_beli" value="{{ $buku->jumlah_beli }}">
                                <input type="text" hidden name="id_buku" value="{{ $buku->id_buku }}">
                                <label class="form-control">Bayar</label>
                                <input type="text" class="form-control" name="bayar" onkeyup="mult(this.value)">
                            </div>
                            <div class="input-group mb-3">
                                <label class="form-control">Kembalian / Hutang ( Jika min - )</label>
                                <input type="number" class="form-control" name="kembalian" id="kembalian" readonly>
                            </div>
                            <div class="input-group mb-3">
                                <label class="form-control">Tanggal Penjualan</label>
                                <input type="date" class="form-control" name="created_at">
                            </div>
                        <div class="row">
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Selesai Penjualan</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            @endif



    </div>
</div>

<script>
    function mult(value){
        harga_jual = document.getElementById('grandtotal').value;
        x=value - harga_jual;

        document.getElementById('kembalian').value = x;
    }
</script>

@endsection

