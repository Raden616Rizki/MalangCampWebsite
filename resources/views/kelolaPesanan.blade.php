@extends('layout')
@section('title', 'Kelola Pesanan')

@section('content')
@if (Auth::user()->id > 1)
    <script>
        window.location.href = "/"
    </script>
@endif
    <div class="box-pesanan" style="padding-top: 3vh;">
        <center style="font-family: 'ABeeZee'; font-style: normal;font-weight: 400;font-size: 22px;line-height: 26px;color: #000000;">
            Kelola Pesanan
        </center>
        @foreach($pesanans as $pesanan)
        <div class="box-kelolaPesanan">
            <h6 style="font-size:10px;font-family: 'ABeeZee';font-style: normal;font-weight: 400; margin-left:2vh; padding-top:1vh;color: #FFFFFF;">{{ $pesanan->user->name }}</h6>
            <hr style="background-color: white">
            <table class="tabel-kelola-pesanan">
                <tbody style="font-family: 'Font Awesome 5 Brands';font-style: normal;color:#FFFFFF;">
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($pesanan->kelolaBarangs as $item)
                        <tr>
                            <td>{{ $item->nama_item }} </td>
                            <td>{{ $item->jenis}} </td>
                            <td>{{ $pesanan->tanggal_peminjaman}} - {{ $pesanan->tanggal_kembali}}</td>
                            <td>{{ $item->harga}} </td>
                            <td><img src="{{asset('storage/static/image_item/'.$item->gambar)}}" alt="" style="width:10vh; height:10vh;"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="kolom-bawah">
                <div class="catatan" style="font-size:10px;font-family: 'Font Awesome 5 Brands';font-style: normal;color: #FFFFFF;margin-left:2vh; padding-top:1vh; list-style:none;">
                    <li>Catatan : {{$pesanan->catatan}}</li>
                    <li>Total   :  Rp {{$pesanan->total}}</li>
                    <li>Bukti   : <img src="{{asset('storage/static/image_item/'.$pesanan->gambar)}}" alt="belum melakukan pembayaran"></li>
                </div>
                <div class="tombol">
                    <form action="{{route('keranjang.update', $pesanan->pesanan_id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        {{-- <div class="payment">
                            <button class="pay" style="background: #FFFFFF;
                            border-radius: 18px; font-family: 'ABeeZee';font-style: normal;
                            color: #000000; border:none; width:15vh;">payment</button>
                        </div> --}}
                        <select name="status_pembayaran" id="status_pembayaran" style="background: #FFFFFF;
                        border-radius: 18px; font-family: 'ABeeZee';font-style: normal;
                        color: #000000; border:none; margin-left:1vh; height:4vh;">
                            <option value="belum bayar" {{ $pesanan->status_pembayaran == 'belum bayar' ? 'selected' : '' }}>Belum Bayar</option>
                            <option value="lunas" {{ $pesanan->status_pembayaran == 'lunas' ? 'selected' : '' }}>Lunas</option>
                            <option value="dp" {{ $pesanan->status_pembayaran == 'dp' ? 'selected' : '' }}>DP</option>
                        </select>
                        <div class="konfirmasi">
                            <button type="submit" class="konf" style="background: #FFFFFF;
                            border-radius: 18px; font-family: 'ABeeZee';font-style: normal;
                            color: #000000; border:none; width:15vh;">{{ __('Kirim') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
