<table>
    <thead>
        <tr>
            <th>LAPORAN SEMUA BUKU</th>
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
        <th>Stok</th>
        <th>Harga Pokok</th>
        <th>Harga Jual</th>
        <th>PPN</th>
        <th>Diskon</th>
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
            <td>{{  $buku->stok  }}</td>
            <td>{{  $buku->harga_pokok  }}</td>
            <td>{{  $buku->harga_jual  }}</td>
            <td>{{  $buku->ppn  }}%</td>
            <td>{{  $buku->diskon  }}%</td>
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

