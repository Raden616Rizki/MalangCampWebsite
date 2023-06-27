@extends('layout')
@section('title', 'Update Account')
@section('content')

<style>
    .kolom {
        text-align: left;
        padding-top: 3vh;
    }

    .kolom input {
        display: inline-block;
        margin: 0 auto;
        background: #fff;
        border-radius: 10px;
        width: 77%;
        height: 30px;
        font-family: 'Inter';
        font-style: normal;
        font-weight: 100;
        padding-left: 2vh;
        border: none;
    }

</style>

<div class="all" style="padding-top:40px;">
    <div class="d-flex" id="table"
        style=" background-color: #96858F; padding: 25px; border-radius: 35px; margin-left:85px; width: 800px;">

        <div class="card mb-3" style="width: 100%; border-radius:20px; background-color: #D9D9D9;">
            <div class="col-md-8">
                <div class="card-body">
                    <form method="post" action="/post-account" id="myForm" enctype="multipart/form-data">
                        @csrf

                        <div class="update-foto">
                            Foto Profil
                            <input id="photo_profile" type="file"
                                class="form-control @error('photo_profile') is-invalid @enderror" name="photo_profile"
                                placeholder="" required autocomplete="photo_profile" autofocus
                                style="margin-left:18vh; border:none; width:18vh; height:18vh; border-radius:18px; background-image: url('{{asset('storage/'.Auth::user()->photo_profile)}}'); background-size: cover; background-position: center;"
                                value='{{ Auth::user()->photo_profile }}'>
                            @error('photo_profile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="kolom">
                            Username <input
                                id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username"--}}
                                placeholder="Input Your Username" required autocomplete="username" autofocus
                                style="margin-left:5vh;" value='{{ Auth::user()->username }}'>

                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="kolom">
                            Your Name
                            <input
                                id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="Input Your Name" required autocomplete="name" autofocus style="margin-left:4vh;"
                                value='{{ Auth::user()->name }}'>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="kolom">
                            Email
                            <input
                                id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Input Your Email" required autocomplete="email" autofocus style="margin-left:10vh;"
                                value='{{ Auth::user()->email }}'>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="kolom">
                            NoHP
                            <input
                                id="phoneNumber" type="text" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber"--}}
                                placeholder="Input Your PhoneNumber" required autocomplete="phoneNumber" autofocus
                                style="margin-left:10vh;" value="{{ Auth::user()->phoneNumber }}">

                            @error('phoneNumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>

                        <div class="kolom">
                            Address
                            <input
                                id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address"--}}
                                placeholder="Input Your Address" required autocomplete="address" autofocus
                                style="margin-left:7vh;" value='{{ Auth::user()->address }}'>

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    <div class="button-cncl-updt mt-2" style="margin-left:20vh">
                        <a href="/account" class="btn btn-outline-light" style="background-color:#AC608D;">Cancel</a>
                        <button type="submit" class="btn btn-outline-light" style="background-color:#673A54;">Update</a>
                    </div>
                </form>

                <!-- <h5 class="mb-3 card-title" style="height:23px; width: 400px; background-color:white; border-radius:10px; padding-left:8px;"></h5>
                <h6 class="mb-4 card-title" style="height:23px; width: 400px; background-color:white; border-radius:10px; padding-left:8px;"></h6>
                <h5 class="mb-3 card-title" style="height:23px; width: 400px; background-color:white; border-radius:10px; padding-left:8px;"></h5>
                <h6 class="mb-4 card-title" style="height:23px; width: 400px; background-color:white; border-radius:10px; padding-left:8px;"></h6>
                <h5 class="mb-3 card-title" style="height:23px; width: 400px; background-color:white; border-radius:10px; padding-left:8px;"></h5>
                <h6 class="mb-4 card-title" style="height:23px; width: 400px; background-color:white; border-radius:10px; padding-left:8px;"></h6> -->
            </div>
        </div>
    </div>
</div>
@endsection
