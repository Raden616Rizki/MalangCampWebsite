@extends('layout')
@section('title', 'Tambah Paket')
@section('content')

@if (Auth::user()->id > 1)
    <script>
        window.location.href = "/"
    </script>
@endif
<div class="all" style="padding-top:20px; width: 1000px;">
    <form action="{{ route('paket.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="d-flex" id="table"
            style=" background-color: #96858F; padding: 25px; border-radius: 35px; margin-left:20px; width: 1030px; max-width: 1050px; min-width: 300px;">
            <div class="bg2"
                style="background-color: #B5AAB1; padding: 25px; border-radius: 35px 0px 0px 35px; margin-left:5px; width: 100%; max-width: 750px; min-width: 300px; overflow: auto; height:500px; ">

                @foreach ($item as $it)
                <div class="card mb-3"
                    style="width: 80%; max-width: 540px; min-width: 100px; border-radius:20px; background-color: #D9D9D9; margin-left :5px; ">
                    <table>
                        <tr>
                            <td>
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{asset($it->gambar)}}" class="img-fluid rounded-start"
                                            style="height:80px; border-radius:20px; margin-left:13px; margin-top:17px; margin-bottom:10px;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="mb-3 card-title"
                                                style="width: 300px;border-radius:20px; margin-left:-70px; font-size:14px;">
                                                <strong>{{$it->nama_item}}</strong>
                                                <br>
                                                Tenda berkualitas dengan bahan parasut, ukuran 300 x 250. Nyaman,
                                                dingin,
                                                anti badai dan
                                                nyaman seperti pelukan mantan
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{$it->id_item}}"
                                        name="items[]" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                    </label>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                @endforeach
            </div>

            <div class="card mb-3"
                style="width: 60%; max-width: 540px; min-width: 100px; border-radius:20px; background-color: #B5AAB1; margin-left :50px; height : 200px;">
                <div class="card-body">
                    <div>
                        <table>
                            <tr>
                                <td>
                                    <h5>Nama</h5>
                                </td>
                                <td>
                                    <input type="text" name="nama_paket" id="nama_paket" class="mb-1 card-title"
                                        required
                                        style="height:23px; width: 220px; background-color:white; border-radius:20px; padding-left: 8px; border: none; outline: 0;">
                                    </input>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Harga</h5>
                                </td>
                                <td>
                                    <input type="text" name="harga_paket" id="harga_paket" class="mb-1 card-title"
                                        required
                                        style="height:23px; width: 220px; background-color:white; border-radius:20px; padding-left: 8px; border: none; outline: 0;">
                                    </input>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Gambar</h5>
                                </td>
                                <td style="padding-left: 16px;">
                                    <input type="file" name="image_paket" id="image_paket" class="mb-1 card-title" required></input>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="mt-2">
                        <button type="button" class="btn btn-outline-light"
                            style="background-color:#AC608D; padding-right: 32px; padding-left: 32px; color: white; margin-right: 16px;">Cancel</button>
                        <button type="submit" class="btn btn-outline-light"
                            style="background-color:#673A54; padding-right: 38px; padding-left: 38px; color: white;">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
