<div class="site-section">
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>SUKSES - </strong>{{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row justify-content-center text-center">
            <div class="col-lg-8 mb-5">
                <h2 class="section-title-underline"> <i class="icon-plus"></i>
                    <span>Tambah Akun Pengguna</span>
                </h2>
            </div>
        </div>
        <form wire:submit.prevent="create">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="username">Nama Pengguna</label>
                    <input wire:model.live="name" type="text" id="name" class="form-control form-control-lg">
                    @error('name')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="username">Username</label>
                    <small class="text-muted">Digunakan untuk Login</small>
                    <input wire:model.blur="username" type="text" id="username" class="form-control form-control-lg">
                    @error('username')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label>Email</label>
                    <input wire:model.blur="email" type="text" id="email" class="form-control form-control-lg">
                    @error('email')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="pword">Password</label>
                    <div class="input-group" x-data="{ show: true }">
                        <input wire:model="password" :type="show ? 'password' : 'text'" name="password" id="password" autocomplete="off" type="password"class="form-control form-control-lg">
                        <div class="input-group-append">
                            <button @click="show = !show" :class="{ 'd-none': !show, 'd-block': show }" class="btn btn-outline-secondary" type="button"><i class="icon-eye"></i></button>
                            <button @click="show = !show" :class="{ 'd-block': !show, 'd-none': show }" class="btn btn-outline-secondary" type="button"><i class="icon-eye-slash"></i></button>
                        </div>
                    </div>
                    @error('password')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12 form-group">
                    <input type="submit" value="Update" class="btn btn-success btn-lg px-5">
                    <button wire:click.prevent="resetForm" class="btn btn-warning btn-lg px-5" type="button"><i class="icon-refresh"></i> Reset</button>
                    <a href="{{ url('user/list') }}" wire:navigate class="btn btn-warning btn-lg px-5"><i class="icon-arrow-left"></i> Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
