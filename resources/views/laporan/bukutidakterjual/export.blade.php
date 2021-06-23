<table>
    <thead>
        <tr>
            <th>LAPORAN SEMUA BUKU TIDAK TERJUAL</th>
        </tr>
    </thead>
    <thead>
    <tr>
        <th>No</th>
        <th>Kode Buku</th>
        <th>Judul</th>
        <th>No ISBN</th>
        <th>Penulis</th>
        <th>Penerbit</th>
        <th>Harga Jual</th>
        <th>Total Jumlah Beli</th>
        <th>Total Transaksi</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($databuku as $buku)
        <tr>
            <td>{{ ++$i }}</td>
            <td>FK0000{{ $buku->id_buku }}</td>
            <td>{{ $buku->judul }}</td>
            <td>{{ $buku->noisbn }}</td>
            <td>{{ $buku->penulis }}</td>
            <td>{{  $buku->penerbit  }}</td>
            <td>{{  $buku->harga_jual  }}</td>
            <td>0</td>
            <td>0</td>
        </tr>
      @endforeach
    </tbody>
    <thead>
        <tr>
          <th>Total</th>
          <th>{{ $totalbuku }} Buku</th>
        </tr>
    </thead>
</table>

