@extends('layout')
@section('title', 'Cart')
@section('content')
    <div class="box-pesanan" style="padding-top: 3vh;">
        <div class="cart-pesanan">
            <h3 style="color: black; text-align:center; padding-top: 1vh"><b>Cart Pesanan</b></h3>
                <div class="content-cart" style="display:flex; width:100%; height:100%">
                    <div class="left-box-cart">
                        <div class="content-left-box-cart">
                            <form action="" method="POST" enctype="">
                                @csrf
                                <div class="cart-input" placeholder="">
                                    <input type="text">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="right-box-cart">
                        <div class="content-right-box-cart" >
                            <form method="POST" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="cart-input" placeholder="">
                                    <input type="text">
                                </div>
                                <div class="cart-input" placeholder="">
                                    <input type="text">
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
