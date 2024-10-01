@extends('components.layouts.applogin')

@section('content')
    <div class="w-100 my-0 py-0">
        <div class="row justify-content-center mx-0 px-0">
            <div class="col-md-6">
                <img src="{{ asset('') }}assets/images/bg_1.jpg" alt="" class="img-fluid">
            </div>
            <div class="col-md-6 ftco-cover bg-img d-none">
                <div class="row justify-content-center align-items-center h-100 text-center" style="min-height: 200px;">
                    <div class="col-lg-7" style="z-index: 2; color: aliceblue;">
                        <h2>Login</h2>
                        <p>Selamat Datang di Sistem Retribusi Perdagangan Kota Palangka Raya</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 p-5">
                <form action="{{ url('login') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="row">
                        @session('status')
                            <div class="col-md-12 form-group" id="alert">
                                <div class="alert alert-danger">{{ session('status') }}</div>
                            </div>
                        @endsession
                        <div class="col-md-12 form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" value="{{ old('username') }}" class="form-control form-control-lg @error('username') is-invalid @enderror">
                            @error('username')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="pword">Password</label>
                            <input type="text" id="pword" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror">
                            @error('password')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <button type="submit" class="btn btn-success px-5">Log In</button>
                            <div class="mt-4 d-none">
                                <a href="#" class="green">Lupa Password?</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- .site-wrap -->
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
    @endpush
@endsection
