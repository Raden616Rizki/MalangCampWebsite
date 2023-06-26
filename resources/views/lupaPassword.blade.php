<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="{{asset('static/image/malang-camp-logo-1.png')}}">

    <title>Lupa Password</title>

    <style>
        .kolom{
            text-align: left;
            padding-top: 3vh;
            width: 100%;
        }

        .kolom input{
            display: inline-block;
            margin: 0 auto;
            background: #fff;
            border-radius: 10px;
            width: 100%;
            height: 41px;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 100;
            padding-left: 2vh;
            border: none;
        }

</style>
</head>
<body>
    <div class="all" style="padding-top:40px;">
        <div class="" id="table" style=" background-color: #96858F; padding: 25px; border-radius: 35px; margin-left:85px; width: 800px;">

        <div class="" style="width: 100%; border-radius:20px; background-color: #D9D9D9;">
                <div class="">
                    <div class="card-body">

                    <form method="post" action="" id="myForm" enctype="multipart/form-data">
                            @csrf

                    <div class="kolom">
                                <input id="email" placeholder="Password Baru" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="background:white; margin-bottom:30px; outline:0;">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="kolom">
                            <div class="col-md-6">
                                <input id="Confirm Password" placeholder="Confirm Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="background:white;outline:0;margin-bottom:30px;">

                            <div class="kolom">
                                        <input id="email" placeholder="Email Address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="background:white; margin-bottom:30px; outline:0; width:50%;">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <div class="kolom">
                                    <div class="col-md-6">
                                        <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="background:white;outline:0;margin-bottom:30px; width:100%;">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                        </form>
                        <!-- <h5 class="mb-3 card-title" style="height:23px; width: 400px; background-color:white; border-radius:10px; padding-left:8px;"></h5>
                        <h6 class="mb-4 card-title" style="height:23px; width: 400px; background-color:white; border-radius:10px; padding-left:8px;"></h6>
                        <h5 class="mb-3 card-title" style="height:23px; width: 400px; background-color:white; border-radius:10px; padding-left:8px;"></h5>
                        <h6 class="mb-4 card-title" style="height:23px; width: 400px; background-color:white; border-radius:10px; padding-left:8px;"></h6>
                        <h5 class="mb-3 card-title" style="height:23px; width: 400px; background-color:white; border-radius:10px; padding-left:8px;"></h5>
                        <h6 class="mb-4 card-title" style="height:23px; width: 400px; background-color:white; border-radius:10px; padding-left:8px;"></h6> -->

                          <center>
                            <div class="button-cncl-updt">
                                <a href="account" type="button" class="btn btn-outline-light"style="background-color:#673A54;margin-left:10vh">Kirim</a>
                            </div>
                          </center>

                    </div>
                </div>
            </div>
        </div>
</body>
</html>
