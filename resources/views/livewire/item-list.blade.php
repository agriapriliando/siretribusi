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
                    <span>Daftar Objek Retribusi</span>
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
                        <div class="form-group">
                            <select wire:model.live="status" class="form-control" id="exampleFormControlSelect1">
                                <option value="">Semua Status</option>
                                <option value="Aktif">Aktif</option>
                                <option value="non aktif">Non Aktif</option>
                            </select>
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
                        <a href="{{ url('item/create') }}" wire:navigate class="btn btn-success float-right"><i class="icon-plus"></i> Tambah</a>
                    </div>
                    <div class="col-12 table-responsive">
                        <table class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    <th class="d-print-none">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                    <tr wire:key={{ $item->id }}>
                                        <td scope="row">{{ ($items->currentpage() - 1) * $items->perpage() + $loop->index + 1 }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td class="d-flex d-print-none">
                                            <a href="{{ url('item/' . $item->id) }}" wire:navigate class="btn btn-sm btn-warning mr-1"><i class="icon-pencil"></i></a>
                                            <button {{ $item->status == 'Aktif' ? 'disabled' : '' }} type="button" wire:click="hapusItem({{ $item->id }})"
                                                wire:confirm="Yakin ingin menghapus {{ $item->nama }}?" class="btn btn-sm btn-danger"><i class="icon-trash"></i></button>
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
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    <th class="d-print-none">Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    </div>
