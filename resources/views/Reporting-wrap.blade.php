<!DOCTYPE html>
<html lang="en">
<head>
    <title>Employee ! | </title>
</head>
<body>
    <table class="table" style="width:100%"; border: 1px solid red;>
        <thead>
        <tr>
            <th>Id</th>
            <th>Nama Produk</th>
            <th>Harga Produk</th>
            <th>Stok</th>            
            <th>Kategori Produk</th>
            <th>Supplier Produk</th>
            <th>Tanggal Masuk Produk</th>
        </tr>
        </thead>
        <tbody>
            @foreach($produk as $p)
                <tr>
                <td><center>{{ $p->id_produk }}</td>
                <td>{{ $p->nama_produk }}</td>
                <td>Rp. {{ $p->harga }},00</td>
                <td>{{ $p->stok }}</td>
                <td>{{ $p->nama_kategori }}</span></td>
                <td>{{ $p->nama_supplier }}</td>
                <td>{{ $p->tgl_masuk }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>