<table>
    <thead>
        <tr>
            <th>LAPORAN SEMUA PENJUALAN BUKU</th>
        </tr>
    </thead>
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
                <td>{{ $buku->created_at }}</td>
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

