@extends('layout')
@section('title', 'Paket')
@section('content')
<div class="all" style="padding-top:20px;" >
    <div id="table"
        style=" background-color: #96858F; padding: 25px; border-radius: 35px; margin-left:20px; width: 95%; max-width: 1500px; min-width: 300px;  ">
        <p style="margin-left:440px; "><span
                style="font-size: 28px; font-weight: bold; background: #B5AAB1; border-radius: 16px; padding: 4px; margin-right: 128px; ">Paket</span>
            <!-- <input
                type="text" id="datfilepicker"
                style="border-radius: 8px;  border: none; box-shadow: 0px 1px 2px 0px #555;"><button type="button"
                class="btn btn-outline-light"
                style="background-color:#673A54; color: white; border-radius: 8px; margin-left: 8px; padding: 2px 8px 2px 8px; box-shadow: 0px 1px 2px 0px #555;">Pesan</button> -->
        </p>
        @foreach ($Pakets as $paket)
        <div class="bg2 d-flex mb-4"
            style="background-color: #B5AAB1; padding: 25px; border-radius: 35px; margin-left:5px; width: 100%; max-width: 1500px; min-width: 300px; box-shadow: 0px 1px 2px 0px #555;">
            <div style="display: inline; margin-right: 48px;">
                <table>
                    <tr>
                        @foreach ($paket->kelola_barangs as $barang)
                        <img src="{{asset($barang->gambar)}}" class="img-fluid rounded-start"
                            style="height:80px; border-radius:20px; margin-left:13px; margin-top:17px; margin-bottom:10px;">
                        @endforeach
                    </tr>
                </table>
            </div>
            <div class="card mb-3"
                style="width: 80%; max-width: 480px; min-width: 100px; border-radius:20px; background-color: #D9D9D9; margin-left :5px;">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="mb-3 card-title"
                                style="height:23px; width: 300px; background-color:white; border-radius:20px; padding-left:8px;">
                                <strong>{{$paket->nama_paket}}</strong></h5>
                            <h6 class="mb-4 card-title"
                                style="height:23px; width: 300px; background-color:white; border-radius:20px; padding-left:8px;">
                                <strong>{{$paket->harga_paket}}</strong></h6>
                            <div>
                                <button type="button" class="btn btn-outline-light"
                                    style="background-color:#96858F;">Pesan</button>
                                <button type="button" class="btn btn-outline-light"
                                    style="background-color:#AC608D;">Add to
                                    Cart</button>
                                <a type="button" class="btn btn-outline-light" style="background-color:#673A54;"
                                href="/paketMember/{{ $paket->paket_id }}">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- <div class="bg2 d-flex mb-4"
            style="background-color: #B5AAB1; padding: 25px; border-radius: 35px; margin-left:5px; width: 100%; max-width: 1500px; min-width: 300px; box-shadow: 0px 1px 2px 0px #555;">
            <div style="display: inline; margin-right: 48px;">
                <table>
                    <tr>
                        <img src="{{asset('static/image/image 2.png')}}" class="img-fluid rounded-start"
                            style="height:80px; border-radius:20px; margin-left:13px; margin-top:17px; margin-bottom:10px;">
                        <img src="{{asset('static/image/image 3.png')}}" class="img-fluid rounded-start"
                            style="height:80px; border-radius:20px; margin-left:13px; margin-top:17px; margin-bottom:10px;">
                        <img src="{{asset('static/image/image 4.png')}}" class="img-fluid rounded-start"
                            style="height:80px; border-radius:20px; margin-left:13px; margin-top:17px; margin-bottom:10px;">
                        <img src="{{asset('static/image/image 5.png')}}" class="img-fluid rounded-start"
                            style="height:80px; border-radius:20px; margin-left:13px; margin-top:17px; margin-bottom:10px;">
                    </tr>
                </table>
            </div>
            <div class="card mb-3"
                style="width: 80%; max-width: 480px; min-width: 100px; border-radius:20px; background-color: #D9D9D9; margin-left :5px;">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="mb-3 card-title"
                                style="height:23px; width: 300px; background-color:white; border-radius:20px; padding-left:8px;">
                                <strong>Hemat A</strong></h5>
                            <h6 class="mb-4 card-title"
                                style="height:23px; width: 300px; background-color:white; border-radius:20px; padding-left:8px;">
                                <strong>Rp. 275.000,00</strong></h6>
                            <div>
                                <button type="button" class="btn btn-outline-light"
                                    style="background-color:#AC608D;">Pesan</button>
                                <button type="button" class="btn btn-outline-light"
                                    style="background-color:#673A54;">Add to
                                    Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>
<div class="mx-auto pb-18 w-4/5 mt-2">
    {{ $Pakets->links()}}
</div>
@endsection
