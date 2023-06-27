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

    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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

    <link rel="stylesheet" href="{{asset('//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('/resources/demos/style.css')}}"> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    {{-- Import Style Layout CSS --}}
    <link rel="stylesheet" href="{{asset('static/css/style-layout.css')}}">

    <script>
        const loginId = {{Auth::user()->id}};
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
                        $('#paket-header').addClass('active');
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

            // Enter to Search
            let searchInput = $('#search-input');
            let searchForm = $('#search-form');

            searchInput.on('keyup', function (event) {
                // console.log(event);
                if (event.key === 'Enter') {
                    // console.log('enter');
                    searchForm.submit();
                }
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#status_order').change(function() {
            let formTransaksi = $('#form-transaksi');
	        formTransaksi.submit()
        });
    });
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
                <li class="nav-item d-none d-sm-inline-block" id="header-paket">
                    <a href="/paket" class="nav-link header-link">Paket</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/kelolaPesanan" class="nav-link">Order</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/laporanTransaksi" class="nav-link">Report</a>
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
                <div class="mt-3 pb-3 text-center">
                    <div>

                        <!-- <img src="{{asset(Auth::user()->photo_profile)}}" class="img-circle elevation-2 photo-profile" alt="User Image" href="/account"> -->

                        <img src="{{asset('storage/'.Auth::user()->photo_profile)}}"
                            class="img-circle elevation-2 photo-profile" alt="User Image" href="/account">
                        <a href="/account" class="d-block mt-2 text-white">
                            <h6 id="username">{{Auth::user()->name}}</h6>
                        </a>
                    </div>
                    <hr color="white" />
                </div>

                <!-- Sidebar Menu -->
                <nav>
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false" onclick="window.location.href = '/tambahPesanan'" style="cursor: pointer">
                        <div style="display: flex; justify-content: space-between;">
                            <a href="/tambahPesanan" class="d-block mb-3 text-white"> List Barang</a>
                            <img src="{{asset('static/image/Expand_right.png')}}">
                        </div>
                        <hr color="white" />
                    </ul>
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false" onclick="window.location.href = '/paketMember'" style="cursor: pointer">
                        <div style="display: flex; justify-content: space-between;">
                            <a href="/paketMember" class="d-block mb-3 text-white"> Paket Barang</a>
                            <img src="{{asset('static/image/Expand_right.png')}}">
                        </div>
                        <hr color="white" />
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
                                @yield('search')
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

                @yield('scripts')

                <script>
               $("a").click(function () {
                     $(".session").visibility(2);});
                   </script>
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

                            <option value={{ $users->id }} id="chat-notif-{{ $users->id }}" selected>{{ $users->name }}</option>

                            @elseif (Auth::user()->id == 1)

                            @foreach ($users as $user)

                            <option value={{ $user->id }} id="chat-notif-{{ $user->id }}" selected>{{ $user->name }}</option>

                            @endforeach

                            @endif
                        </select>
                    </td>
                    <td id="minimize-chat" onclick="closeChat()">
                        <img src="{{asset('static/image/minimize-2-icon.png')}}" alt="minimize-icon">
                    </td>
                    <td id="maximize-chat">
                        <a href="/live-chat/"><img src="{{asset('static/image/maximize-icon.png')}}"
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

    <script src="dist/js/pages/dashboard.js"></script>

    {{-- script preview img --}}
    <script>
        function previewImage(event) {
        var input = event.target;
        var preview = document.getElementById('preview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
            preview.setAttribute('src', e.target.result);
            preview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.setAttribute('src', '#');
            preview.style.display = 'none';
        }
        }
    </script>

    {{-- script lightbox belum fix dipakai--}}
    {{-- <script>
        function openLightbox(image) {
            var lightbox = document.getElementById('lightbox');
            var lightboxImage = document.getElementById('lightbox-image');

            lightbox.style.display = 'block';
            lightboxImage.src = image.src;
        }

        function closeLightbox() {
            var lightbox = document.getElementById('lightbox');
            lightbox.style.display = 'none';
        }
    </script> --}}

    <script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
    <script src="{{asset('static/js/live-chat-layout.js')}}"></script>
</body>

</html>
