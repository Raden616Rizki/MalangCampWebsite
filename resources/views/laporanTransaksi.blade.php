@extends('layout')
@section('title', 'Laporan Transaksi')
@section('content')

<div class="laporan-transaksi" style="padding-top: 3vh;">
    <center style="font-family: 'ABeeZee'; font-style: normal;font-weight: 400;font-size: 22px;line-height: 26px;color: #000000;">Laporan Transaksi</center>
    <div class="tabel-laporan" style="padding-top: 1vh;">
        <table class="table table-bordered">
            <tr style="text-align: center;">
                <th>No.</th>
                <th>Tanggal Transaksi</th>
                <th>Pembayaran</th>
                <th>Customer</th>
                <th>Id Pesanan</th>
                <th>Status Order</th>
                <th>Total</th>
                <th>Detail</th>
            </tr>

        </table>
    </div>
</div>

@endsection
