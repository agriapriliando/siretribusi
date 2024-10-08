<div class="site-section">
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>SUKSES - </strong>{!! session('message') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row justify-content-center text-center">
            <div class="col-lg-6 mb-5">
                <h2 class="section-title-underline">
                    <span>Daftar Akun Pengguna</span>
                </h2>
            </div>
        </div>
        <div wire:ignore.self class="row">
            <div class="col">
                <div class="row d-flex justify-content-end">
                    <div class="col-12 col-md-6">
                        <div class="input-group mb-3">
                            <input type="text" wire:model.live.debounce.500ms="search" class="form-control" placeholder="Pencarian">
                            <div class="input-group-append">
                                <button wire:click="resetSearch" class="input-group-text" id="basic-addon2">Reset</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <div class="form-group mr-2">
                            <select wire:model.live="pagelength" class="form-control" id="exampleFormControlSelect1">
                                <option value="10">Lihat 10</option>
                                <option value="20">Lihat 20</option>
                                <option value="500">Lihat Semua</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <a href="{{ url('user/create') }}" wire:navigate class="btn btn-success float-right"><i class="icon-plus"></i> Tambah</a>
                    </div>
                    <div class="col-12">
                        <p class="bg-primary text-white rounded px-2 py-1">No Kontak Konfirmasi Pembayaran : {{ $adminvalidasi->nohp }} <a href="{{ url('user/' . $adminvalidasi->id) }}"> Ubah</a>
                        </p>
                    </div>
                    <div class="col-12 table-responsive">
                        <table class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama | username</th>
                                    <th>Email | No HP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $u)
                                    <tr wire:key={{ $u->id }}>
                                        <td scope="row">{{ ($users->currentpage() - 1) * $users->perpage() + $loop->index + 1 }}</td>
                                        <td>{{ $u->name }} <br> <span class="badge pill-badge badge-warning">{{ $u->username }}</span></td>
                                        <td>{{ $u->email }} <br> {{ $u->nohp }}</td>
                                        <td class="d-flex">
                                            <a href="{{ url('user/' . $u->id) }}" wire:navigate class="btn btn-sm btn-warning mr-1"><i class="icon-pencil"></i></a>
                                            @if ($u->rentals_count == 0)
                                                <button type="button" wire:click="delete({{ $u->id }})" wire:confirm="Yakin ingin menghapus Akun : {{ $u->name }}?"
                                                    class="btn btn-sm btn-danger" {{ $u->rentals_count == 0 ? '' : 'disabled' }}><i class="icon-trash"></i></button>
                                            @else
                                                <button type="button"
                                                    onclick="alert('Akun {{ $u->name }} Tidak Bisa Dihapus, karena masih ada transaksi tertaut akun ini. Cek Daftar Transaksi.')"
                                                    class="btn btn-sm btn-danger"><i class="icon-trash"></i> X</button>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td scope="row"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="d-flex">
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
