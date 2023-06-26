@extends('layout')
@section('title', 'Kelola Pesanan')
@section('content')
    <div class="box-pesanan" style="padding-top: 3vh;">
        <center style="font-family: 'ABeeZee'; font-style: normal;font-weight: 400;font-size: 22px;line-height: 26px;color: #000000;">
            Kelola Pesanan
        </center>
        <div class="box-kelolaPesanan">
            <table class="tabel-kelola-pesanan">
                <h6 style="font-size:10px;font-family: 'ABeeZee';font-style: normal;font-weight: 400; margin-left:2vh; padding-top:1vh;color: #FFFFFF;">{{-- $pesanan->user->nama --}}(nama)</h6>
                <hr style="background-color: white">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody style="font-family: 'Font Awesome 5 Brands';font-style: normal;color:#FFFFFF;">
                    {{-- @foreach($kelola_barangs_pesanan as $p) --}}
                    <tr>
                        <td>{{--{{ $p->items->nama_item}}--}}nama_item</td>
                        <td>{{--{{ $p->jumlah_item}}--}}pcs</td>
                        <td>{{--{{ $p->pesanan->tanggal_peminjaman}}--}}00/00/0000 - {{--{{ $p->pesanan->tanggal_kembali}}--}}00/00/0000</td>
                        <td>{{--{{ $p->items->harga}}--}}Rp</td>
                        <td style="text-align:right">{{--{{ $p->pesanan->total}}--}}Rp</td>
                    </tr>
                </tbody>
            </table>
            <div class="kolom-bawah">
                <div class="catatan" style="font-size:10px;font-family: 'Font Awesome 5 Brands';font-style: normal;font-weight: 400;line-height: 23px;color: #FFFFFF;margin-left:2vh; padding-top:1vh;">
                    Catatan : {{--$pesanan->catatan--}}(catatan dari user)
                </div>
                <div class="tombol">
                    <div class="payment">
                        <button class="pay" style="background: #FFFFFF;
                        border-radius: 18px; font-family: 'ABeeZee';font-style: normal;
                        color: #000000; border:none;">payment</button>
                    </div>
                    <div class="konfirmasi">
                        <button class="konf" style="background: #FFFFFF;
                        border-radius: 18px; font-family: 'ABeeZee';font-style: normal;
                        color: #000000; border:none;">konfirmasi</button>
                        {{-- p --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
