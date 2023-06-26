<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{asset('static/image/malang-camp-logo-1.png')}}">
    <title>@yield('title') | Malang Camp</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">

    {{-- google font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee&family=Charmonman&display=swap" rel="stylesheet">

    {{-- jquery --}}
    <script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        #brand {
            font-family: 'Charmonman', cursive;
            font-style: normal;
            font-weight: 400;
            font-size: 24px;
        }

        #logo {
            width: 56px;
        }

        #logout {
            font-family: 'ABeeZee', sans-serif;
            font-size: 18px;
        }

        #main-background {
            background-color: #D5D5D5;
        }

        .main-color {
            background-color: #96858F;
        }

        #main-content {
            background-image: url('{{asset('static/image/main-background-all.png')}}');
            background-size: cover;
            background-position: bottom;
            height: 128vh;
            margin-top: -10px;
        }

        .nav-link {
            font-family: 'ABeeZee', sans-serif;
            font-size: 18px;
            line-height: 24px;

            color: #395B64;
        }

        .photo-profile {
            height: 72px;
            width: 72px;
            overflow: hidden;
            object-fit: cover;
        }

        .quotes {
            font-family: 'ABeeZee', sans-serif;
            font-style: normal;
            font-weight: 400;
            font-size: 30px;
            line-height: 41px;
            text-align: right;

            color: #000000;

            mix-blend-mode: hard-light;
            opacity: 0.7;
            text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);

            padding: 16px;
        }

        @media screen and (max-width: 768px) {
            #address {
                display: none;
            }

            #card-content {
                height: 100%;
            }

            #table {
                display: flex;
                flex-direction: column;
                width: 550px;
                height: 870px;
            }

            #left-box {
                width: 500px;
                height: 400px;
            }

            #right-box {
                width: 500px;
                height: 400px;
            }
        }

        #search-column {
            margin-top: -6px;
        }

        #search-icon {
            position: absolute;
            height: 12px;
            width: 12px;
            background: transparent;
            left: 10px;
            top: 8px;
            border-radius: 100%;
        }

        @import url("https://fonts.googleapis.com/css?family=Raleway");

        .container {
            position: relative;
            margin-top: -2px;
        }

        .main {
            position: relative;
            border: white;
            height: 25px;
            background: white;
            width: 190px;
            border-radius: 50px;
            padding-left: 31px;
            padding-right: 11px;
            padding-top: 4px;
            padding-bottom: 4px;
            font-size: 13px;
        }

        .main:focus {
            outline: none;
        }

        .searchicon {
            position: absolute;
            height: 12px;
            width: 12px;
            background: transparent;
            border: solid grey;
            left: 16px;
            top: 6px;
            border-radius: 100%;
        }

        .searchicon:after {
            content: "";
            position: absolute;
            background: grey;
            height: 4px;
            width: 2px;
            bottom: -5px;
            right: -3px;
            transform: rotate(-45deg);
        }

        .icon-holder {
            display: flex;
            justify-content: space-around;
            margin-top: 7px;
        }

        .icon {
            position: relative;
            height: 35px;
            width: 35px;
            background: grey;
            border-radius: 100%;
            box-shadow: 0px 1px 2px 0px #555;
            cursor: pointer;
            opacity: 0;
            transition: 0.4s;
        }

        .icon:hover {
            background: grey;
            animation-play-state: paused;
        }

        .dots {
            position: absolute;
            height: 5px;
            width: 5px;
            background: white;
            border-radius: 100%;
            left: 15px;
            top: 15px;
        }

        .dots:after {
            content: "";
            position: absolute;
            height: 5px;
            width: 5px;
            background: white;
            border-radius: 100%;
            left: 9px;
        }

        .dots:before {
            content: "";
            position: absolute;
            height: 5px;
            width: 5px;
            background: white;
            border-radius: 100%;
            left: -9px;
        }

        input:focus~.icon-holder>.icon {
            animation: ani 2.2s ease-out infinite;
        }

        @keyframes ani {
            0% {
                opacity: 1;
            }

            10% {
                transform: scale(1.2);
                opacity: 1;
            }

            20% {
                transform: scale(1);
                opacity: 1;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .tooltip {
            opacity: 0;
            position: absolute;
            font-size: 12px;
            color: white;
            background: #555;
            padding: 8px;
            top: 15px;
            border-radius: 15%;
            top: 45px;
        }

        .tooltip:after {
            content: "";
            position: absolute;
            background: #555;
            clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
            height: 18px;
            width: 18px;
            top: -10px;
            left: 7px;
        }

        .icon:hover>.tooltip {
            animation: ani 0.4s ease-out forwards;
            animation-delay: 0.3s;
        }

        /* kelola_barangs */

        .utama{
            height : 50%;
        }
        .box_kelola{
            position: relative;
            width: 50%;
            height: 50%;
            margin-left: 2%;
            margin-right: 2%;
            top: 25px;

            background: rgba(255, 255, 255, 0.5);
            box-shadow: 6px 0px 10px rgba(0, 0, 0, 0.25);
            border-radius: 30px;
        }

        .box_kelola1{
            position: relative;
            width: 30%;
            height: 50%;
            margin-left: 2%;
            margin-right: 2%;
            top: 25px;

            background: rgba(255, 255, 255, 0.5);
            box-shadow: 6px 0px 10px rgba(0, 0, 0, 0.25);
            border-radius: 30px;
        }

        .text {
            position: relative;
            width: 131px;
            height: 16px;
            top: 13px;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 17px;
            line-height: 21px;
            display: flex;
            align-items: center;
            text-align: center;
            color: #000000;
            margin-left:30%;
        }

        .box_foto {
            position: relative;
            width: 95px;
            height: 95px;
            margin-top: 30px;
            margin-left: 30%;
            margin-right: 28%;
            margin-bottom:5px;
            background-color: rgba(150, 150, 150, 0.75);
            border: 0px solid #ccc;
            border-radius: 10px;
            /* padding-left: 23px; */
            /* padding-top: 15px; */
        }

        .drop-container {
            margin-top : 27px;
            margin-left : 27px;
            margin-right : 27px;
            margin-bottom : 10px;
            position: relative;
            display: flex;
            gap: 10px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 70px;
            weight: 100%;
            padding: 5px;
            border-radius: 10px;
            border: 2px dashed #555;
            color: #444;
            cursor: pointer;
            transition: background .2s ease-in-out, border .2s ease-in-out;
        }

        .drop-container:hover {
            background-color: rgba(150, 133, 143, 0.5);
            border-color: grey;
        }

        .drop-container:hover .drop-title {
            color: #222;
        }

        .drop-title {
            color: #444;
            font-size: 10px;
            font-weight: bold;
            text-align: center;
            transition: color .2s ease-in-out;
        }

        #images {
            width: 140px;
            height: 24px;
            font-size: 10px;
            padding: 1px;
        }

        .box {
            width: 210px;
            height: 130px;
            background-color: rgba(300, 300, 300, 0.5);
            border: 2px solid #ccc;
            border-radius: 30px;
        }

        .box_isi{
            /* position: static; */
            width: 94%;
            height: 25px;
            top: 110;
            background-color: rgba(300, 300, 300, 0.5);
            border: 0px solid #ccc;
            border-radius: 7px;
            color: black;
            padding-left:5px;
        }

        .isi{
            padding-top :5px;
        }

        .box_add {
            position: relative;
            width: 40%;
            height: 5%;
            margin-left: 5%;
            margin-right: 1%;
            top: 13px;
            background-color: #96858F;
            border: 0px solid #ccc;
            border-radius: 20px;
            text-align: center;
            font-size: 15px;
            box-shadow: 6px 0px 10px rgba(0, 0, 0, 0.25);
        }

        .box_list {
            position: relative;
            width: 63%;
            height: 500px;
            left: 1.7%;
            right: 5%;
            top: 27px;
            background: #96858F;
            box-shadow: 6px 0px 10px rgba(0, 0, 0, 0.25);
            border-radius: 30px;
        }

        .list{
            margin-left:10%;
            margin-right:10%;
        }

        .box_listTam{
            position: relative;
            width: 97%;
            height: 380px;
            left: 2%;
            right: 2%;
            top: 35px;
            background: #96858F;
            box-shadow: 6px 0px 10px rgba(0, 0, 0, 0.25);
            border-radius: 30px;
            justify-content:center;
        }

        label {
            margin-bottom: 0px; /* Memberikan jarak antara label dengan elemen berikutnya */
        }
        .pagination{
            margin-left: 27%;
            right:0%;
        }

        .box_tenda {
            position: relative;
            width: 150px;
            height: 35px;
            /* left: 35%; */
            top: 18px;
            margin-bottom: 10px;
            text-align: center;
            background: #FFFFFF;
            opacity: 0.6;
            border-radius: 10px;
            margin-left: 2%;
            margin-right: 2%;
            padding-right:10%;
        }

        .tambahan{
            position:relative;
            margin-left:11.5%
        }
        
        .box_panah{
            position: relative;
            width: 40%;
            height: 35px;
            top: 18px;
            margin-bottom:9px;
            text-align:center;
            background: #FFFFFF;
            opacity: 0.6;
            border-radius: 10px;
            padding-top:1%;
            justify-content: center;
        }

        .box_panah_tenda{
            left:20%;
        }

        .hapus_edit {}

        .tenda {
            margin-left: 5%;
            margin-right: 5%;
        }

        .nama {
            font-size: 15px;
            margin-left: 15px;
            font-family: 'Inter';
            font-style: normal;
        }

        .panah {
            position: relative;
            width: 35px;
            height: 35px;
            left: 90%;
            top: 60px;
            text-align:center;
            background: #FFFFFF;
            opacity: 0.6;
            border-radius: 10px;
            text-align: center;
            font-size: 25px;
        }

        #text-input {
            padding-left: 7px;
            color: black;
            border: none;
            font-size: 12px;
        }

        .upload {
            font-size: 10px;
            position: relative;
            left: 24%;
        }

        .pencil {
            margin-left: 77%;
            top: 0%;
            position: relative:
        }

        /* chat */
        #before-chat {
            position: fixed;
            bottom: 0;
            right: 8px;

            width: 276px;
            height: 40px;
            border-radius: 16px 16px 0px 0px;
            background-color: #673A54;
            box-shadow: 0 3px 8px rgb(0, 0, 0, 0.8);

            color: white;
            font-family: 'ABeeZee', sans-serif;
            cursor: pointer;
        }

        #before-chat div {
            margin-top: 8px;
            margin-left: 16px;
        }

        #after-chat {
            position: fixed;
            bottom: 0;
            right: 8px;

            width: 276px;
            height: 320px;
            background-color: white;
            border-radius: 10px 10px 0px 0px;
            box-shadow: 0 3px 8px rgb(0, 0, 0, 0.8);

            overflow: auto;
            padding-bottom: 32px;

            display: none;
        }

        #header-chat {
            position: fixed;
            bottom: 1;

            width: 276px;
            height: 40px;
            border-radius: 0px 0px 8px 8px;
            background-color: #673A54;
            box-shadow: 0 3px 8px rgb(0, 0, 0, 0.4);

            color: white;
            font-family: 'ABeeZee', sans-serif;
            cursor: pointer;

            border-collapse: collapse;
            display: flex;
            justify-content: center;
            padding-top: 8px;
        }

        #header-chat #minimize-chat {
            padding-left: 32px;
            padding-right: 16px;
        }

        #header-chat img {
            width: 24px;
            height: 24px;
        }

        #choose-user .form-select {
            background-color: #834c6c;
            border: none;
            color: white;
            font-family: 'ABeeZee', sans-serif;
            width: 128px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            border-radius: 8px;
            box-shadow: 0 1px 2px rgb(0, 0, 0, 0.4);
            padding: 2px;
            outline: 0;
        }

        #footer-chat {
            position: fixed;
            bottom: 0;

            width: 276px;
            height: 40px;
            border-radius: 8px 8px 0px 0px;
            background-color: #A7688D;

            color: white;
            font-family: 'ABeeZee', sans-serif;
            cursor: pointer;

            display: flex;
            justify-content: center;
            border-collapse: collapse;
            padding-top: 6px;
        }

        #chat-text,
        #send-chat {
            padding-right: 8px;
            padding-left: 8px;
        }

        #chat-text input {
            outline: 0;
        }

        #footer-chat img {
            width: 16px;
            height: 16px;
        }

        #footer-chat input {
            box-shadow: 0 3px 8px rgb(0, 0, 0, 0.4);
            border-radius: 16px;
            border: none;
            padding-left: 8px;
            width: 192px;
        }

        #send-chat {
            background-color: white;
            padding: 2.5px 6px 2.5px 6px;
            border-radius: 50%;
            box-shadow: 0 3px 8px rgb(0, 0, 0, 0.4);
            cursor: pointer;
            display: none;
        }

        #send-chat:hover {
            background-color: #D5D5D5;
        }

        #content-chat {
            font-family: 'ABeeZee', sans-serif;
            margin-top: 48px;
        }

        #receiver td {
            padding-right: 4px;
            padding-left: 4px;
            margin-top: 4px;
        }

        #sender {
            display: flex;
            justify-content: flex-end;
            border-collapse: collapse;
        }

        #sender td {
            padding-right: 4px;
            padding-left: 4px;
            margin-top: 4px;
        }

        #sender img,
        #receiver img {
            width: 24px;
            height: 24px;
        }

        #chat-receiver {
            background-color: #D5D5D5;
            border-radius: 0px 8px 8px 8px;
            color: rgb(0, 0, 0);
            box-shadow: 0 2px 4px rgb(0, 0, 0, 0.4);
            padding-right: 8px;
            padding-left: 8px;
            max-width: 192px;
        }

        #chat-sender {
            background-color: #96858F;
            border-radius: 8px 0px 8px 8px;
            color: white;
            box-shadow: 0 2px 4px rgb(0, 0, 0, 0.4);
            padding-right: 8px;
            padding-left: 8px;
            max-width: 192px;
        }

        #maximize-chat a img:hover {
            width: 26px;
            height: 26px;
        }

        #minimize-chat img:hover {
            width: 22px;
            height: 22px;
        }

        /* header */
        /* a.active {
            background-color: #96858F;
            border-radius: 16px;
            box-shadow: 0 2px 4px rgb(0, 0, 0, 0.4);
            text-decoration: underline;
        } */

        .header-link {
            text-decoration: none;
        }

        .header-link.active {
            text-decoration: underline;
        }

    </style>

    <script>
        const loginId = {{ Auth::user() -> id}};
        const userProfile = '{{ Auth::user()->photo_profile }}';

        let enabled = false;

        $(document).ready(function () {
            var pageTitle = "@yield('title')";

            if (pageTitle === 'Dashboard') {
                // console.log(pageTitle);
                $('#main-content').css({
                    "background-image": "url('{{asset('static/image/main-background-home.png')}}')",
                });
            } else {
                $('#main-content').css({
                    "background-image": "url('{{asset('static/image/main-background-all.png')}}')",
                });
            }

            // Mendapatkan URL saat ini
            var currentUrl = window.location.href;
            // Mencari tautan header yang sesuai dengan URL saat ini
            $('.header-link').each(function () {
                var linkUrl = $(this).attr('href');
                var shortUrl = linkUrl.split('/');
                // console.log(shortUrl);
                if (shortUrl[1] != '') {
                    if (currentUrl.indexOf(linkUrl) > -1) {
                        $('.header-link:contains("Home")').removeClass('active');
                        // console.log(linkUrl);
                        $(this).addClass('active');
                    }
                }
            });

            // Delete Account
            $('#confirmDeleteButton').click(function () {
                $('#deleteForm').submit(); // Submit form when delete button is clicked
                $('#confirmDeleteModal').modal('hide'); // Close modal
            });
        });

        function close_sidebar() {
            if (!enabled) {
                $('.photo-profile').css({
                    "width": "48px",
                    "height": "48px",
                });

                $('#username').hide();
                enabled = true;
            } else {
                $('.photo-profile').css({
                    "width": "72px",
                    "height": "72px",
                });

                $('#username').show();
                enabled = false;
            }
        }
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper" onclick="closeChat()">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light shadow-sm">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" role="button" onclick="close_sidebar()"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link header-link active">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/cart" class="nav-link header-link">Cart</a>
                </li>
                @if (Auth::user()->id == 1)
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/kelolaBarang" class="nav-link header-link">Item</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/paket" class="nav-link">Paket</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/order" class="nav-link">Order</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/report" class="nav-link">Report</a>
                </li>
                @endif
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/account" class="nav-link header-link">Account</a>
                </li>
                @if (Auth::user()->id > 1)
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/contact-us" class="nav-link header-link">Contact Us</a>
                </li>
                @endif
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item mt-3 mr-4">
                    <p id="brand">Malang Camp</p>
                </li>
                <li class="nav-item mt-2">
                    <img src="{{asset('static/image/malang-camp-logo-2.png')}}" alt="malang-camp-logo" id="logo">
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4 main-color">
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="mt-3 pb-3 mb-3 text-center">
                    <div>
                        <img src="{{asset(Auth::user()->photo_profile)}}" class="img-circle elevation-2 photo-profile"
                            alt="User Image" href="/account">
                        <a href="/account" class="d-block mt-2 text-white">
                            <h6 id="username">{{Auth::user()->name}}</h6>
                        </a>
                    </div>
                    <hr color="white" />

                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        {{-- @foreach ($items as $item)
                          <a href="{{ route('items.index',$items->id) }}" class="d-block mb-4">{{$item->nama}}</a>
                        <hr color="white" />
                        @endforeach --}}
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" id="main-background">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col col-lg-3">

                            <!-- SidebarSearch Form -->
                            <div class="container">
                                <input class="main shadow" placeholder="Search" /><span class="searchicon"></span>
                            </div>

                        </div><!-- /.col -->
                        <div class="col">
                            <ol class="breadcrumb float-sm-right">
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content" id="main-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->
            </section>
            <footer class="text-center mt-8">
                <strong class="text-dark">&copy; 2023 Malang Camp</strong>
            </footer>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <div id="live-chat">
        <div id="before-chat" onclick="openChat()">
            <div>
                <span>LiveChat</span>
            </div>
        </div>
        <div id="after-chat">
            <table>
                <tr id="header-chat">
                    <td id="choose-user">
                        <select class="form-select" aria-label="Default select example">
                            @if (Auth::user()->id > 1)

                            <option value={{ $users->id }} selected><span>{{ $users->name }}</span><strong> (5)</strong>
                            </option>

                            @elseif (Auth::user()->id == 1)

                            @foreach ($users as $user)

                            <option value={{ $user->id }} selected><span>{{ $user->name }}</span><strong> (5)</strong>
                            </option>

                            @endforeach

                            @endif
                        </select>
                    </td>
                    <td id="minimize-chat" onclick="closeChat()">
                        <img src="{{asset('static/image/minimize-2-icon.png')}}" alt="minimize-icon">
                    </td>
                    <td id="maximize-chat">
                        <a href="/api/live-chat"><img src="{{asset('static/image/maximize-icon.png')}}"
                                alt="maximize-icon"></a>
                    </td>
                </tr>
            </table>
            <div id="content-chat">
                <table id="receiver">
                    <tr>
                        <td>
                            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="receiver-img">
                        </td>
                        <td id="chat-receiver">
                            Selamat Siang
                        </td>
                    </tr>
                </table>
                <table id="sender">
                    <tr>
                        <td id="chat-sender">
                            Selamat Siang
                        </td>
                        <td>
                            <img src="dist/img/AdminLTELogo.png" class="img-circle elevation-2" alt="sender-img">
                        </td>
                    </tr>
                </table>
            </div>
            <table>
                <tr id="footer-chat">
                    <td>
                        <div id="chat-text">
                            <input id="chat-input" type="text" placeholder="Type message" oninput="checkInputChat()">
                        </div>
                    </td>
                    <td>
                        <div id="send-chat" onclick="sendChat()">
                            <img src="{{asset('static/image/send-icon.png')}}" alt="send-icon">
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{asset('dist/js/demo.js')}}"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
    <script src="{{asset('static/js/live-chat.js')}}"></script>
</body>

</html>
