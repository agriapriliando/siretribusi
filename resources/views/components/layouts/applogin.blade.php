<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets') }}/fonts/icomoon/style.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon-simbida-32x32.png') }}">

    {{-- <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/fonts/flaticon/font/flaticon.css">

    {{-- <link rel="stylesheet" href="{{ asset('assets') }}/css/aos.css"> --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">

</head>

<body>
    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>

        <x-topbar></x-topbar>
        <style>
            .bg-img {
                background-image: url("{{ asset('') }}assets/images/bg_1.jpg")
            }

            input[type=text]:focus,
            textarea[type=text]:focus {
                outline: none;
                border: 3px solid #017e03;
                box-shadow: 0 0 3px #017e03;
            }

            .ftco-cover {
                background-size: cover;
                background-position: center center;
                background-repeat: no-repeat;
                position: relative;
            }

            .ftco-cover:before {
                position: absolute;
                content: "";
                background: #127945;
                opacity: .7;
                z-index: 1;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
            }
        </style>
        @yield('content')
        <div class="{{ request()->is('login*') ? '' : 'mt-5' }}">
            {{-- content --}}
            {{-- end content --}}

            <div class="site-section ftco-subscribe-1 bg-img {{ request()->is('login*') ? 'd-none' : '' }} d-print-none">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col text-center">
                            <h2>Simbida</h2>
                            <p>Sistem Informasi Retribusi Perdagangan</p>
                            <p>Dinas Perdagangan, Koperasi, UKM dan Perindustrian Kota Palangka Raya, Kalimantan Tengah</p>
                        </div>
                    </div>
                </div>
            </div>


            <x-footer></x-footer>
        </div>
        <!-- .site-wrap -->

        <!-- loader -->
    </div>
    @stack('scripts')
</body>

</html>
