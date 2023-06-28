<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{asset('static/image/malang-camp-logo-1.png')}}">
    <title>@yield('title') | Malang Camp</title>

    {{-- Bootstrap --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}

    {{-- font --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    {{-- google font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee&family=Charmonman&display=swap" rel="stylesheet">

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'ABeeZee', sans-serif;
        }

        .container{
            display: grid;
            place-items: center;
            width: 100%;
            height: 100vh;

            background: #332C33;
        }

        .back-to-login img {
            width: 24px;
            height: 24px;
            position: absolute;
            margin-top: 30px;
            margin-left: 48px;
        }

        .back-to-login img:hover {
            margin-left: 44px;
        }

        .back-to-register img {
            width: 24px;
            height: 24px;
            position: absolute;
            margin-top: 30px;
            margin-left: 32px;
        }

        #countdown {
            position: absolute;
            margin-top: 30px;
            right: 32px;
        }

        .back-to-register img:hover {
            margin-left: 28px;
        }

        .box{
            display: grid;
            place-items: center;
            width: 95%;
            height: 93vh;
            left: 64px;
            top: 41px;

            background: #96858F;
            border-radius: 26px;
        }

        .box-form{
            width: 80vh;
            height: 85vh;
            top: 0.2vh;

            background: #FFFFFF;
            box-shadow: 10px 10px 4px rgba(0, 0, 0, 0.25);
            border-radius: 26px;
            position: relative;
        }

        .box-form .text {
            margin-top: -16px;
        }

        .text{
            text-align: center;
            padding-top: 5vh;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 5vh;
            line-height: 10vh;
        }

        .kolom{
            text-align: center;
            padding-top: 2vh;
        }

        .kolom i {
            margin-left: -30px;
            cursor: pointer;
            position: absolute;
            margin-top: 14px;
        }

        .kolom input{
            display: inline-block;
            margin: 0 auto;
            background: #D9D9D9;
            border-radius: 10px;
            width: 360px;
            height: 41px;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 100;
            padding-left: 2vh;
            border: none;
        }

        .kolom-submit{
            text-align: center;
            padding-top: 3vh;
        }

        .kolom-submit .signup-button{
            display: inline-block;
            margin: 0 auto;
            background:#96858F;
            border-radius: 10px;
            width: 75%;
            height: 41px;
            font-size: 16px;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            color: #FFFFFF;
            padding-left: 2vh;
            border: none;
            cursor: pointer;
        }

        .kolom-submit .signup-button:hover{
            background:#AC608D;
            border: 2px solid #96858F;
        }

        .logo{
            margin: 5vh;
            margin-left: 25vh;
            height: 30vh;
            width: 30vh;
        }

        .logo img{
            height: 100%;
            width: 100%;
        }

        .text-verif{
            /* padding-top: 45%; */
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 4vh;
            text-align: center;
        }

        .text2-verif {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 200;
            font-size: 12px;
            text-align: center;
            margin-top: 8px;
        }

        .verification-input {
            display: inline-block;
            position: relative;
            position: absolute;
            top: 400px;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .code-boxes {
            display: flex;
        }

        .code-box {
            flex: 1;
            margin-right: 6px;
            margin-left: 6px;
            border: 1px solid #ddd;
            text-align: center;
            font-size: 16px;
            padding: 5px;
            background-color:#D9D9D9;
            border-radius: 8px;
            box-shadow: 4px 0px 6px rgba(52, 52, 52, 0.25);
        }

        .code-boxes input[type="text"] {
            border: none;
            outline: none;
            height: 10vh;
            width: 10vh;
        }

        .submitOTP{
            text-align: center;
            padding-top: 6vh;
        }

        .submitOTP .otp-button{
            background: #FFFFFF;
            border: 1px solid #000000;
            border-radius: 18px;
            height: 10vh;
            width: 10vh;
            cursor: pointer;
        }

        .submitOTP .otp-button:hover {
            #go-icon {
                margin-left: 8px;
                color: white;
            }
        }

        .otp-button:hover{
            background-color: #96858F;
            border: none;
        }

        .value-otp input {
            display: none;
        }

        #error-message {
            position: absolute;
            text-align: center;
            color: #9f3b3b;
            margin-top: 16px;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>

    <script>

        $(document).ready(function () {
            // Running Countdown
            updateCountdown();
        });

        function knowPass() {
            var password = $('#password').attr('type');
            // console.log(password)
            if (password === 'password') {
                $('#password').attr('type', 'text');
                $('#togglePassword').attr('class', 'fa fa-eye')
            } else {
                $('#password').attr('type', 'password');
                $('#togglePassword').attr('class', 'fa fa-eye-slash')
            }
        }

        function knowPassConfirm() {
            var password = $('#password-confirm').attr('type');
            // console.log(password)
            if (password === 'password') {
                $('#password-confirm').attr('type', 'text');
                $('#togglePasswordConfirm').attr('class', 'fa fa-eye')
            } else {
                $('#password-confirm').attr('type', 'password');
                $('#togglePasswordConfirm').attr('class', 'fa fa-eye-slash')
            }
        }

        function getOTP() {
            var codeBoxes = $('.code-box');
            var otp = $('#otp');
            var code = "";

            for (var i = 0; i < codeBoxes.length; i++) {
                code += codeBoxes[i].value;
            }

            // console.log(code);

            otp.val(code);
        }

        function postOTP() {

            let otp_give = $('#otp').val();
            let email_give = $('#email').val();

            // Mendapatkan token CSRF
            let csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Menambahkan token CSRF ke dalam header permintaan
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            $.ajax({
                type: 'POST',
                url: '/otp',
                data: {
                    otp: otp_give,
                    email: email_give,
                },
                success: function(response) {
                    if (response.success) {
                        window.location.href = '/login?success=' + encodeURIComponent(response.success);
                    } else {
                        // console.log(response.error);
                        $('#error-message').text(response.error);
                    }
                }
            });
        }

        // Countdown Variabel
        let count = 240;

        function updateCountdown() {
            // console.log(count);
            if (count >= 0) {
                $('#countdown').text(count + 's');
                count--;
                setTimeout(updateCountdown, 1000); // Mengulang countdown setiap 1 detik
            } else {
                postOTP();
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="box">
            @yield('content')
        </div>
    </div>
    <script>
        const codeBoxes = document.querySelectorAll(".code-box");

        for (let i = 0; i < codeBoxes.length; i++) {
        codeBoxes[i].addEventListener("input", (e) => {
            if (e.target.value.length >= e.target.maxLength) {
            if (i < codeBoxes.length - 1) {
                codeBoxes[i + 1].focus();
            } else {
                codeBoxes[i].blur();
            }
            }
        });

        codeBoxes[i].addEventListener("keydown", (e) => {
            if (e.key === "Backspace" && !e.target.value) {
            if (i > 0) {
                codeBoxes[i - 1].focus();
            }
            }
        });
        }


    </script>
</body>
</html>
