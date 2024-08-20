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

    <link rel="stylesheet" href="{{ asset('assets') }}/js/select2/select2.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/js/select2/select2-bootstrap4.min.css">
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

            input[type=text]:focus,
            textarea[type=text]:focus {
                outline: none;
                border: 3px solid #017e03;
                box-shadow: 0 0 3px #017e03;
            }
        </style>
        <div class="my-5">
            {{-- content --}}
            <div class="site-section">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-6 mb-5">
                            <h2 class="section-title-underline"> <i class="icon-plus"></i>
                                <span>Tambah Data Transaksi Sewa</span>
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="username">Pilih Wajib Retribusi</label>
                            <select class="form-select" id="penyewa" data-placeholder="Cari Nama/ No Hp">
                                <option></option>
                                <option>Andrea - 09182328923</option>
                                <option>Dudu - 09823838333</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="username">Pilih Objek Sewa</label>
                            <select class="form-select" id="objeksewa" data-placeholder="Cari Lokasi">
                                <option></option>
                                <option disabled="disabled">Kontainer 01 - Sedang Aktif</option>
                                <option>Kontainer 02</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="username">Bidang</label>
                            <select class="form-select" id="bidang" data-placeholder="Pilih Bidang">
                                <option>Kuliner</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="username">Merk Usaha</label>
                            <input type="text" id="merk_usaha" class="form-control form-control">
                            <small class="yexy-muted">Contoh : Warung Bahagia, Rumah Makan Sejahtera</small>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="username">Tanggal Mulai</label>
                            <input type="date" id="username" class="form-control form-control">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="username">Tanggal Berakhir</label>
                            <input type="date" id="username" class="form-control form-control">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="username">Biaya Sewa Bulanan</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                </div>
                                <input type="text" inputmode="numeric" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="submit" value="Tambah" class="btn btn-success btn-lg px-5">
                            <input type="button" value="Kembali" class="btn btn-warning btn-lg px-5">
                        </div>
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
            </script>
            <script src="{{ asset('assets') }}/js/select2/select2.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#penyewa').select2({
                        theme: "bootstrap4",
                        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                        placeholder: $(this).data('placeholder'),
                    });
                    $('#objeksewa').select2({
                        theme: "bootstrap4",
                        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                        placeholder: $(this).data('placeholder'),
                    });
                    $('#bidang').select2({
                        theme: "bootstrap4",
                        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                        placeholder: $(this).data('placeholder'),
                    });
                });
            </script>
        @endpush
    </div>
@endsection
