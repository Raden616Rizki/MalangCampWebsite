<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Barang</title>
    <style>
table, th, td {
  border: 2px solid black;
  padding: 30px;
  border-collapse: collapse;
  margin-left: 20px;
}
</style>
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }

    </style>
    <center>
        <h5>Laporan Data Barang</h5>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Item</th>
                <th>Stok</th>
                <th>Jenis</th>
                <th>Harga</th>
                <!-- <th>Gambar</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach($KelolaBarang as $a)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$a->nama_item}}</td>
                <td>{{$a->stok}}</td>
                <td>{{$a->jenis}}</td>
                <td>{{$a->harga}}</td>
                <!-- <td>{{$a->image_paket}}</td> -->
                <!-- <td><img width="100px" src="{{ storage_path('storage/static/image_item/'.$a->gambar) }}"></td> -->
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
