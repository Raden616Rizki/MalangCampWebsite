@extends('layout')
@section('title', 'Cart')
@section('content')
    <div class="box-pesanan" style="padding-top: 3vh;">
        <div class="cart-pesanan">
            <h3 style="color: black; text-align:center; padding-top: 1vh"><b>Cart Pesanan</b></h3>
                <div class="content-cart" style="display:flex; width:100%; height:100%">
                    <div class="left-box-cart">
                        <div class="content-left-box-cart">
                            <?php $total = 0 ?>
                            @if (session('cart'))
                                @foreach (session('cart') as $id_item => $details)
                                <?php $total += $details['harga'] * $details['quantity'] ?>
                                    <table class="show-item-cart">
                                        <tr>
                                            <td><input type="text" value="{{ $details['nama_item'] }}" disabled></td>
                                            <td><input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" style="width: 9vh" /></td>
                                            <td><button type="submit" class="btn btn-danger btn-sm remove-from-cart delete" data-id="{{ $id_item }}"><i class="fa fa-trash-o"></i>X</button></td>
                                        </tr>
                                    </table>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="right-box-cart">
                        <div class="content-right-box-cart" >
                            <form method="POST" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="cart-input">
                                    <input type="text" value=" Rp {{$total}}" disabled>
                                </div>
                                <div class="cart-input">
                                    <input type="text" value="1150396230" disabled>
                                </div>
                                <div class="tanggal-pinjam" style="padding-top: 3vh;">
                                    <label style="color:black; font-family: 'Inter'; font-style: normal;">Tanggal Pinjamanan</label><br>
                                    <input type="date" name="tanggal-pinjam" style="width: 100%; height: 6vh; border-radius:4px; background: #FFFFFF;
                                    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border:none;">
                                </div>
                                <div class="tanggal-kembali" style="padding-top: 3vh; padding-bottom: 3vh;">
                                    <label style="color:black; font-family: 'Inter'; font-style: normal;">Tanggal Kembali</label><br>
                                    <input type="date" name="tanggal-kembali" style="width: 100%; height: 6vh; border-radius:4px; background: #CFCFCF;
                                    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border:none;">
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFileLang" lang="in" onchange="previewImage(event)">
                                    <label class="custom-file-label" for="customFileLang">pilih file </label>
                                </div>
                                <div class="preview" style="width:8vh; height:10vh; padding-top: 1vh;">
                                    <div class="preview-bukti">
                                        <img class="img-bukti" id="preview" src="#" alt="preview">
                                    </div>
                                </div>
                                <div class="form-group" style="padding-top:2vh">
                                    <textarea class="form-control" rows="2" id="comment" placeholder="catatan"></textarea>
                                </div>
                            </form>
                            <div class="button-kirim-bukti">
                                <button class="custom-button-kirim">
                                    {{ __('Kirim') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
@section('scripts')


    <script type="text/javascript">
// this function is for update card
        $(".update-cart").click(function (e) {
            e.preventDefault();

           var ele = $(this);

            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                    window.location.reload();
               }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                        
                    }
                });
            }
        });

    </script>
@endsection
