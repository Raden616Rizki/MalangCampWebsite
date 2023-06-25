@extends('layout')
@section('title', 'Laporan Transaksi')
@section('content')

<div class="laporan-transaksi" style="padding-top: 3vh;">
    <center style="font-family: 'ABeeZee'; font-style: normal;font-weight: 400;font-size: 22px;line-height: 26px;color: #000000;">Laporan Transaksi</center>
    <div class="tabel-laporan" style="padding-top: 1vh;">
        <table class="table table-bordered">
            <thead>
                <tr style="text-align: center;">
                    <th>Id Pesanan</th>
                        <th>Tanggal Transaksi</th>
                        <th>Pembayaran</th>
                        <th>Customer</th>
                        <th>Status Order</th>
                        <th>Total</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesanan as $p)    
                    <form action="{{ route('laporan.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                    <tr style="text-align: center;">
                        <td>{{ $p->pesanan_id }}</td>
                        <td>{{ $p->created_at }}</td>
                        <td>
                            <select name="status_pembayaran[]" id="status_pembayaran" style="background: #FFFFFF;
                                border-radius: 18px; font-family: 'ABeeZee';font-style: normal;
                                color: #000000; border:none; margin-left:1vh;">
                                <option value="belum bayar" {{ $p->status_pembayaran == 'belum bayar' ? 'selected' : '' }}>Belum Bayar</option>
                                <option value="lunas" {{ $p->status_pembayaran == 'lunas' ? 'selected' : '' }}>Lunas</option>
                                <option value="dp" {{ $p->status_pembayaran == 'dp' ? 'selected' : '' }}>DP</option>
                            </select>
                        </td>
                        <td>{{ $p->user->name }}</td>
                        <td>
                            <select name="status_order[]" id="status_order" style="background: #FFFFFF;
                                border-radius: 18px; font-family: 'ABeeZee';font-style: normal;
                                color: #000000; border:none; margin-left:1vh;">
                                <option value="belum diambil" {{ $p->status_order == 'belum diambil' ? 'selected' : '' }}>Belum Diambil</option>
                                <option value="diambil" {{ $p->status_order == 'diambil' ? 'selected' : '' }}>Diambil</option>
                                <option value="kembali" {{ $p->status_order == 'kembali' ? 'selected' : '' }}>Kembali</option>
                                <option value="terlambat" {{ $p->status_order == 'terlambat' ? 'selected' : '' }}>Terlambat</option>
                            </select>
                        </td>
                        <td>Rp{{ $p->total }}</td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="konfirmasi">
                <button type="submit" class="konf" style="background: #FFFFFF;
                border-radius: 18px; font-family: 'ABeeZee';font-style: normal;
                color: #000000; border:none; width:15vh;">{{ __('Save') }}</button>
            </div>
        </form>
    </div>
</div>

@endsection
