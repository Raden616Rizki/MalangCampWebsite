@extends('layoutLogin')
@section('title', 'Login')
@section('content')
<div class="box-logo ">
    <img src="{{asset('static/image/Component 19 (1).png')}} " style="margin:80px;">
</div>
<div class="box-form-login">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="text"
            style="margin-top:20px; font-family: 'Inter'; font-style: italic;font-weight: 500;font-size: 29px;line-height: 35px;color: #000000;margin-left:13%;">
            SIGN INTO YOUR ACCOUNT
        </div>
        <div class="kolom">
            <input id="email" placeholder="Email Address" type="email"
                class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                required autocomplete="email" autofocus style="background:white; margin-bottom:12px; outline:0;">
            @error('email')
            <br>
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="kolom">
            <div class="col-md-6">
                <input id="password" placeholder="Password" type="password"
                    class="form-control @error('password') is-invalid @enderror" name="password" required
                    autocomplete="current-password" style="background:white;outline:0;margin-bottom:30px;">

                @error('password')
                <br>
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div>

        </div>
        <button type="submit" class="btn btn-primary"
            style="width:75%; background-color:#96858F; border-radius:8px; padding:10px; border:none; margin-bottom:30px;margin-left:16vh;color:white; font-size:16px; cursor: pointer;">
            {{ __('LOGIN') }}
        </button>

        <div class="p" style="margin-left: 15vh;">
            {{-- <div class="forgot-password">
                <a href="/lupaPassword" style="text-decoration:none; color:black; font-family: 'Inter'; font-style: normal; cursor: pointer;">forgot password?</a>
            </div> --}}
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif

            <div class="link-register" style="padding-top:3vh">
                <b style="font-family: Inter;">Don't have an account? <a href="{{ route('register') }}"
                        style="color:black">Register here</a> </b>
            </div>
        </div>
    </form>
    {{-- <form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required autofocus>
    </div>
    <button type="submit">Kirim Link Reset Password</button>
    </form> --}}
</div>
@endsection
