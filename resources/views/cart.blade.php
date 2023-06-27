@extends('layout')
@section('title', 'Cart')
@section('content')
<div class="box-pesanan" style="padding-top: 3vh;">
    <div class="cart-pesanan">
        <h3 style="color: black; text-align:center; padding-top: 1vh"><b>Cart Pesanan</b></h3>
        <form method="POST" action="{{route('keranjang.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="content-cart" style="display:flex; width:100%; height:100%;">
                <div class="left-box-cart">
                    <div class="content-left-box-cart">
                        <?php $total = 0 ?>
                        @if (session('cart'))
                        @foreach (session('cart') as $id_item => $details)
                        <?php $total += $details['harga'] * $details['quantity'] ?>
                        <table class="show-item-cart">
                            <tr>
                                <td><input type="text" value="{{ $details['nama_item'] }}" disabled></td>
                                <td>
                                    <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" data-id="{{ $id_item }}">
                                </td>
                                <td>
                                    <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id_item }}">
                                        <i class="fa fa-trash-o"></i> X
                                    </button>
                                </td>

                                <td style="display: none;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $id_item }}"
                                            name="items[]" id="flexCheckChecked" checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="right-box-cart">
                    <div class="content-right-box-cart">
                        <div class="cart-input">
                            <input type="text" name="total" id="total" value=" Rp {{$total}}" style="padding:2vh;font-family: 'Inter';
                                    font-style: normal;" disabled>
                            <input type="hidden" name="total" value="{{$total}}">
                        </div>
                        <div class="cart-input">
                            <input type="text" value="1150396230" style="padding:2vh; font-family: 'Inter';
                                    font-style: normal;" disabled>
                        </div>
                        <div class="tanggal-pinjam" name="tanggal_peminjaman" id="tanggal_peminjaman"
                            style="padding-top: 3vh;">
                            <label style="color:black; font-family: 'Inter'; font-style: normal;">Tanggal
                                Pinjamanan</label><br>
                            <input type="date" name="tanggal_pinjam" style="width: 100%; height: 6vh; border-radius:4px; background: #FFFFFF;
                                    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border:none;">
                        </div>
                        <div class="tanggal-kembali" name="tanggal_kembali" id="tanggal_kembali"
                            style="padding-top: 3vh; padding-bottom: 3vh;">
                            <label style="color:black; font-family: 'Inter'; font-style: normal;">Tanggal
                                Kembali</label><br>
                            <input type="date" name="tanggal_kembali" style="width: 100%; height: 6vh; border-radius:4px; background: #CFCFCF;
                                    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border:none;">
                        </div>
                        <div class="custom-file">
                            <input type="file" name="bukti_transaksi" id="bukti_transaksi" class="custom-file-input"
                                id="customFileLang" lang="in" onchange="previewImage(event)">
                            <label class="custom-file-label" for="customFileLang">pilih file </label>
                        </div>
                        <div class="preview" style="width:8vh; height:10vh; padding-top: 1vh;">
                            <div class="preview-bukti">
                                <img class="img-bukti" id="preview" src="#" alt="preview">
                            </div>
                        </div>
                        <div class="form-group" style="padding-top:2vh">
                            <textarea class="form-control" name="catatan" id="catatan" rows="2" id="comment"
                                placeholder="catatan"></textarea>
                        </div>
                        <div class="button-kirim-bukti">
                            <button type="submit" class="custom-button-kirim">
                                {{ __('Kirim') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>

    $(document).on("click", ".quantity", function (e) {
        e.preventDefault();
        var ele = $(this);
        var id = ele.attr("data-id");
        var quantity = ele.val();
        var maxQuantity = ele.attr("data-max");

        if (quantity > maxQuantity) {
            alert("Jumlah barang melebihi stok yang tersedia.");
            ele.val(maxQuantity);
            return;
        }

        $.ajax({
            url: '{{ url('update-cart') }}',
            method: "patch",
            data: {_token: '{{ csrf_token() }}', id_item: id, quantity: quantity},
            success: function (response) {
                window.location.reload();
            }
        });
    });

    $(document).on("click", ".remove-from-cart", function (e) {
        e.preventDefault();
        var ele = $(this);
        var id = ele.attr("data-id");

        if (confirm("Are you sure?")) {
            $.ajax({
                url: '{{ url('remove-from-cart') }}',
                method: "DELETE",
                data: {_token: '{{ csrf_token() }}', id_item: id},
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

//     $(document).ready(function() {
//   // Mendapatkan elemen input tanggal pinjam dan tanggal kembali
//   var tanggalPinjamInput = $("input[name='tanggal_pinjam']");
//   var tanggalKembaliInput = $("input[name='tanggal_kembali']");

//   // Mengatur tanggal kembali tidak dapat diisi
//   tanggalKembaliInput.prop("disabled", true);

//   // Menambahkan event listener pada input tanggal pinjam
//   tanggalPinjamInput.on("change", function() {
//     // Mendapatkan tanggal pinjam yang dipilih
//     var tanggalPinjam = new Date($(this).val());

//     // Menghitung tanggal kembali (7 hari setelah tanggal pinjam)
//     var tanggalKembali = new Date(tanggalPinjam.getTime() + (7 * 24 * 60 * 60 * 1000));

//     // Mengubah format tanggal kembali menjadi "yyyy-mm-dd"
//     var formattedTanggalKembali = tanggalKembali.toISOString().split("T")[0];

//     // Mengisi nilai tanggal kembali
//     tanggalKembaliInput.val(formattedTanggalKembali);
//   });
// });
</script>
@endsection
