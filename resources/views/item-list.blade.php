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
            <div class="col-lg-6 mb-5">
                <h2 class="section-title-underline">
                    <span>Daftar Objek Disewakan</span>
                </h2>
            </div>
        </div>
        <div wire:ignore.self class="row">
            <div class="col">
                <a href="{{ url('item/create') }}" wire:navigate class="btn btn-success mb-2"><i class="icon-plus"></i> Tambah</a>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            <tr wire:key={{ $item->id }}>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td class="d-flex">
                                    <a href="{{ url('item/' . $item->id) }}" wire:navigate class="btn btn-sm btn-warning mr-1"><i class="icon-pencil"></i></a>
                                    <button type="button" wire:click="hapusItem({{ $item->id }})" wire:confirm="Yakin ingin menghapus {{ $item->nama }}?" class="btn btn-sm btn-danger"><i
                                            class="icon-trash"></i></button>
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
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
