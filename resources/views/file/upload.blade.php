@extends('layouts.app')
@push('style')
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

    <link rel="stylesheet" href="{{ asset('assets') }}/css/aos.css">
    <link href="{{ asset('assets') }}/css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
@endpush

@section('content')
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
        <x-navbar></x-navbar>
        <style>
            .dt-search {
                padding: 20px 0 !important;
            }

            .dt-paging {
                padding-top: 20px;
            }

            .bg-img {
                background-image: url("{{ asset('') }}assets/images/bg_1.jpg")
            }
        </style>
        <div class="my-5">
            {{-- content --}}
            <div class="container my-4 mb-5">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-6 mb-5">
                        <h2 class="section-title-underline">
                            <span>Cara Pembayaran Retribusi</span>
                        </h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <p>Hai, Andrian. Silahkan melakukan pembayaran melalui QRIS berikut ini sejumlah
                            <span style="font-size: 25px;" class="badge badge-warning" id="nilai" data-rupiah="650000">Rp
                                650.000</span>
                            <button id="poper" onclick="copyText()" type="button" class="btn btn-sm btn-success" data-toggle="popover" data-content="Copied">
                                Salin Nominal
                            </button>
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <img src="{{ asset('assets') }}/images/qrcode.png" style="max-width: 300px;" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Isi Keterangan</label>
                                <input type="text" id="username" class="form-control form-control" placeholder="Contoh : Bayar Bulan Maret 2024, Kontainer 01 dan 03">
                                <small class="text-muted">Contoh : Bayar Bulan Maret 2024, Kontainer 01 dan 03</small>
                            </div>
                            <div class="mb-2">
                                <label for="username">Unggah Bukti Pembayaran</label>
                                <div class="custom-file">
                                    <input onchange="namafile()" type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <small>File Max 1Mb atau 1024Kb</small>
                            </div>
                            <div>
                                <input type="submit" value="Unggah" class="btn btn-success btn-block px-5">
                            </div>
                        </div>
                    </div>
                    <script>
                        function namafile() {
                            var fileName = document.querySelector("#customFile");
                            //replace the "Choose a file" label
                            console.log(fileName.files[0].name);
                            document.querySelector(".custom-file-label").innerHTML = fileName.files[0].name;
                        }

                        function copyText() {
                            var nilai = document.querySelector("#nilai");
                            console.log(nilai.dataset.rupiah);
                            navigator.clipboard.writeText(nilai.dataset.rupiah);
                            setTimeout(() => {
                                $('#poper').popover('hide')
                            }, 2000);
                        }
                    </script>
                </div>
                <div class="row d-none">
                    <div class="col-md-6 form-group">
                        <label for="username">Nama Lengkap</label>
                        <input type="text" id="username" class="form-control form-control-lg">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="username">NIK</label>
                        <input type="text" id="username" class="form-control form-control-lg">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="username">No HP</label>
                        <input type="text" id="username" class="form-control form-control-lg" inputmode="numeric">
                        <small class="text-muted">Pastikan No Whatsapp Aktif</small>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="email">Alamat</label>
                        <textarea type="text" id="email" class="form-control form-control-lg"></textarea>
                    </div>
                    <div class="col-md-6 mb-3 mt-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Unggah Bukti Bayar</label>
                        </div>
                        <small>File Max 1Mb atau 1024Kb</small>
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="submit" value="Tambah" class="btn btn-success btn-lg px-5">
                        <input type="button" value="Kembali" class="btn btn-warning btn-lg px-5">
                    </div>
                </div>
            </div>
            {{-- end content --}}
            <div class="site-section ftco-subscribe-1 bg-img">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <h2>Subscribe to us!</h2>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,</p>
                        </div>
                        <div class="col-lg-5">
                            <form action="" class="d-flex">
                                <input type="text" class="rounded form-control mr-2 py-3" placeholder="Enter your email">
                                <button class="btn btn-primary rounded py-3 px-4" type="submit">Send</button>
                            </form>
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

        @push('scripts')
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
            <script src="{{ asset('assets') }}/js/aos.js"></script>
            <script src="{{ asset('assets') }}/js/jquery.fancybox.min.js"></script>
            <script src="{{ asset('assets') }}/js/jquery.sticky.js"></script>
            <script src="{{ asset('assets') }}/js/jquery.mb.YTPlayer.min.js"></script>

            <script src="{{ asset('assets') }}/js/main.js"></script>

            <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
            <script src="https://cdn.datatables.net/2.1.3/js/dataTables.bootstrap4.js"></script>
            <script src="https://cdn.datatables.net/buttons/3.1.1/js/dataTables.buttons.js"></script>
            <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.bootstrap4.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.print.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.colVis.min.js"></script>
            <script src=""></script>
            <script>
                new DataTable('#example', {
                    // responsive: true,
                    // dom: 'Bfrtip',
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
                    ]
                })
                $(function() {
                    $('[data-toggle="popover"]').popover({
                        trigger: 'focus'
                    })
                })
            </script>
        @endpush
    </div>
@endsection
