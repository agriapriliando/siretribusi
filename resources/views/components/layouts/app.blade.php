<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets') }}/fonts/icomoon/style.css">

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

    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
        @if (request()->is('login*'))
        @else
            <x-navbar></x-navbar>
        @endif
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
        </style>
        <div class="{{ request()->is('login*') ? '' : 'mt-5' }}">
            {{-- content --}}
            {{ $slot }}
            {{-- end content --}}
            @if (Auth::user())
                <div class="d-none d-print-block text-center">Dicetak oleh {{ Auth::user()->name }} pada {{ \Carbon\Carbon::now()->translatedFormat('l, d M Y H:i:s') }}</div>
            @endif

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
        <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
                <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
                <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78" />
            </svg>
        </div>
    </div>

    <script src="{{ asset('assets') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('assets') }}/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="{{ asset('assets') }}/js/jquery-ui.js"></script>
    <script src="{{ asset('assets') }}/js/popper.min.js"></script>
    <script src="{{ asset('assets') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('assets') }}/js/jquery.stellar.min.js"></script>
    <script src="{{ asset('assets') }}/js/jquery.countdown.min.js"></script>
    <script src="{{ asset('assets') }}/js/jquery.easing.1.3.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('assets') }}/js/jquery.fancybox.min.js"></script>
    <script src="{{ asset('assets') }}/js/jquery.sticky.js"></script>

    <script src="{{ asset('assets') }}/js/main.js"></script>

    @stack('scripts')
</body>

</html>
