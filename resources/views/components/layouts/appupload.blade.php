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
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.1/css/buttons.bootstrap4.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/fonts/flaticon/font/flaticon.css">

    {{-- <link rel="stylesheet" href="{{ asset('assets') }}/css/aos.css"> --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link href="{{ asset('assets') }}/css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
</head>

<body>
    <div class="site-wrap">

        <x-topbar></x-topbar>
        <style>
            input[type=text]:focus,
            textarea[type=text]:focus {
                outline: none;
                border: 3px solid #017e03;
                box-shadow: 0 0 3px #017e03;
            }
        </style>
        <div class="my-5">
            {{-- content --}}
            {{ $slot }}
            {{-- end content --}}

        </div>
        <x-footer></x-footer>
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
    <script src="{{ asset('assets') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('assets') }}/js/jquery.easing.1.3.js"></script>
    {{-- <script src="{{ asset('assets') }}/js/aos.js"></script> --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('assets') }}/js/jquery.fancybox.min.js"></script>
    <script src="{{ asset('assets') }}/js/jquery.sticky.js"></script>
    <script src="{{ asset('assets') }}/js/jquery.mb.YTPlayer.min.js"></script>

    <script src="{{ asset('assets') }}/js/main.js"></script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="popover"]').popover({
                trigger: 'focus'
            })
        });
    </script>
</body>

</html>
