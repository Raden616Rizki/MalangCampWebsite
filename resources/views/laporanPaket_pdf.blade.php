<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Paket</title>
    <style>
table, th, td {
  border: 2px solid black;
  padding: 30px;
  border-collapse: collapse;
  margin-left: 75px;
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
        <h5>Laporan Data Paket</h5>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Paket</th>
                <th>Harga Paket</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Paket as $a)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$a->nama_paket}}</td>
                <td>{{$a->harga_paket}}</td>
                <!-- <td>{{$a->image_paket}}</td> -->
                <td><img width="100px" src="{{ storage_path('app/public/'.$a->image_paket) }}"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
