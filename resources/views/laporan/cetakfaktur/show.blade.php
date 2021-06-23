@extends('layouts.app')
@section('content')

<div class="container">

    <!--card -->
    <div class="card">
        <div class="card-body">
        <!-- tabel -->
        <table class="table table-bordered mb-5">
            <div class="container-fluid">
                  <h2 class="text-center">Form Struk</h2>
            </div>
            <!-- judul tabel -->
            <thead>
              <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Jumlah Beli</th>
                <th>Harga Satuan</th>
                <th>PPN</th>
                <th>Diskon</th>
                <th>Total</th>
              </tr>
            </thead>
            <!-- isi tabel -->
            <tbody>
            <?php
                $grandtotal=0;
            ?>
            @foreach ($databukupagination as $buku)
            <?php
                $subtotal = ($buku->harga_jual*$buku->jumlah_beli) + ($buku->harga_jual * $buku->ppn/100) - ($buku->harga_jual * $buku->diskon/100);
            ?>
              <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->jumlah_beli }}</td>
                <td>{{  $buku->harga_jual  }}</td>
                <td>{{  $buku->ppn  }}%</td>
                <td>{{  $buku->diskon  }}%</td>
                <td>{{ $subtotal }}</td>
              </tr>
            <?php
              $grandtotal+= $subtotal;
            ?>
            @endforeach
            </tbody>
            <!-- hasil isi tabel -->
            <thead>
                <tr>
                  <th>Jumlah</th>
                  <th colspan="4">{{ $totalbuku }} Buku</th>
                  <th>Grand Total</th>
                  <th>{{ $grandtotal }}</th>
                </tr>
                <tr>
                    <th colspan="5"></th>
                    <th>Bayar</th>
                    <th>{{ $buku->bayar }}</th>
                  </tr>
                  <tr>
                    <th colspan="5"></th>
                    <th>Kembalian</th>
                    <th>{{ $buku->kembalian }}</th>
                  </tr>
              </thead>
          </table>

        <!-- tombol cetak -->
        <a onclick="window.print()" type="submit" class="btn btn-primary btn-block no-print">Cetak</a>

        </div>
    </div>









</div>


@endsection

