<div class="row justify-content-center m-0">
    <style>
        .ftco-cover {
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            position: relative;
        }

        .ftco-cover:before {
            position: absolute;
            content: "";
            background: #009141;
            opacity: .7;
            z-index: 1;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }
    </style>
    <div class="col-md-6 ftco-cover bg-img">
        <div class="row justify-content-center align-items-center h-100 text-center" style="height: 100px;">
            <div class="col-lg-7" style="z-index: 2; color: aliceblue;">
                <h2>Login</h2>
                <p>Selamat Datang di Sistem Informasi Retribusi Perdagangan Kota Palangka Raya</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 p-5">
        <form wire:submit.prevent="login">
            <div class="row">
                @if (session('message'))
                    <div class="col-12 alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal - </strong>{{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="col-md-12 form-group">
                    <label for="username">Username</label>
                    <input wire:model.live="username" type="text" id="username" class="form-control form-control-lg">
                    @error('username')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12 form-group">
                    <label for="pword">Password</label>
                    <div class="input-group" x-data="{ show: true }">
                        <input wire:model.live="password" :type="show ? 'password' : 'text'" name="password" id="password" autocomplete="off" type="password"class="form-control form-control-lg">
                        <div class="input-group-append">
                            <button @click="show = !show" :class="{ 'd-none': !show, 'd-block': show }" class="btn btn-outline-secondary" type="button"><i class="icon-eye"></i></button>
                            <button @click="show = !show" :class="{ 'd-block': !show, 'd-none': show }" class="btn btn-outline-secondary" type="button"><i class="icon-eye-slash"></i></button>
                        </div>
                    </div>
                    @error('password')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <input type="submit" value="Log In" class="btn btn-success px-5">
                </div>
            </div>
        </form>
    </div>
</div>
