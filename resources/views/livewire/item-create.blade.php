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
            <div class="col-lg-4 mb-5">
                <h2 class="section-title-underline"> <i class="icon-plus"></i>
                    <span>Tambah Objek Sewa</span>
                </h2>
            </div>
        </div>
        <form wire:submit.prevent="create">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="username">Nama Item</label>
                    <input wire:model.blur="nama" type="text" id="nama" class="form-control form-control-lg">
                    @error('nama')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="email">Status</label>
                    <input type="text" class="form-control form-control-lg" value="Non Aktif" disabled>
                    <small class="text-muted">Status menjadi Aktif secara otomatis, saat Objek Disewakan</small>
                </div>
                <div class="col-md-6 form-group">
                    <label for="email">Keterangan</label>
                    <textarea wire:model="keterangan" type="text" id="keterangan" class="form-control form-control-lg"></textarea>
                </div>
                <div class="col-md-12 form-group">
                    <input type="submit" value="Tambah" class="btn btn-success btn-lg px-5" wire:loading.attr="disabled">
                    <input wire:click.prevent="resetform" type="button" value="Reset" class="btn btn-warning btn-lg px-5">
                    <a href="{{ url('item/list') }}" wire:navigate class="btn btn-warning btn-lg px-5"><i class="icon-arrow-left"></i> Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
