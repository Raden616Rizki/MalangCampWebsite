<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>benakno den | Malang Camp</title>

    {{-- font --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container{
            display: grid;
            place-items: center;
            width: 100%;
            height: 100vh;

            background: #332C33;
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
            top: 76px;

            background: #FFFFFF;
            box-shadow: 10px 10px 4px rgba(0, 0, 0, 0.25);
            border-radius: 26px;
        }

        .text{
            text-align: center;
            padding-top: 5vh;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 35px;
            line-height: 57px;
        }

        .kolom{
            text-align: center;
            padding-top: 3vh;
        }

        .kolom input{
            display: inline-block;
            margin: 0 auto;
            background: #D9D9D9;
            border-radius: 10px;
            width: 75%;
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

        .kolom-submit button{
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
        }

        .verification-input {
        display: inline-block;
        position: relative;
        position: absolute;
        top: 61%;
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
        }

        input[type="text"] {
        border: none;
        outline: none;
        height: 11vh;
        width: 11vh;
        }


    </style>
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