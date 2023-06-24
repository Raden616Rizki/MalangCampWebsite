@extends('layout')
@section('title', 'PaketDetail')
@section('content')

<div class="all" style="padding-top:20px; width: 1000px;">
    <div class="d-flex" id="table"
        style=" background-color: #96858F; padding: 25px; border-radius: 35px; margin-left:20px; width: 1030px; max-width: 1050px; min-width: 300px; ">
        <div class="bg2"
            style="background-color: #B5AAB1; padding: 25px; border-radius: 35px 0px 0px 35px; margin-left:5px; width: 100%; max-width: 750px; min-width: 300px; overflow: auto; height:500px;">

            @foreach($Paket->kelola_barangs as $item)

            <div class="card mb-3"
                style="width: 80%; max-width: 540px; min-width: 100px; border-radius:20px; background-color: #D9D9D9; margin-left :5px;">
                <table>
                    <tr>
                        <td>
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{asset($item->gambar)}}" class="img-fluid rounded-start"
                                        style="height:80px; border-radius:20px; margin-left:13px; margin-top:17px; margin-bottom:10px;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="mb-3 card-title"
                                            style="width: 300px;border-radius:20px; margin-left:-70px; font-size:14px;">
                                            <strong>{{ $item->nama_item }}</strong>
                                            <br>
                                            Meja Portable dengan ukuran 200 x 1500 cm. Alas meja yang telah dilapisi
                                            bahan
                                            berkualitas anti lemes dan gosip tetangga.
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            @endforeach
        </div>

        <table>
            <tr>
                <div class="card mb-3"
                    style="width: 80%; max-width: 480px; min-width: 100px; border-radius:20px; background-color: #D9D9D9; margin-left :5px;">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="mb-3 card-title"
                                    style="height:23px; width: 380px; background-color:white; border-radius:20px; padding-left:8px;">
                                    <strong>{{$Paket->nama_paket}}</strong></h5>
                                <h6 class="mb-4 card-title"
                                    style="height:23px; width: 380px; background-color:white; border-radius:20px; padding-left:8px;">
                                    <strong>{{$Paket->harga_paket}}</strong></h6>
                                <div>
                                    <a href="/paketMember" type="button" class="btn btn-outline-light"
                                        style="background-color:#AC608D; bottom:0px; border-radius:20px; width:150px; margin-left:120px;">Cancel</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </tr>
        </table>

    </div>
</div>

@endsection
