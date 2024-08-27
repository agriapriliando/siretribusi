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
                    <span>Daftar Penyewa / Wajib Retribusi</span>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-end">
                    <a href="{{ url('tenant/create') }}" wire:navigate class="btn btn-success mb-3 mr-2"><i class="icon-plus"></i> Tambah</a>
                    <input type="text" wire:model.live.debounce.400ms="search" class="form-control mr-2" placeholder="Pencarian" style="max-width: 250px">
                    <div class="form-group">
                        <select wire:model.live="pagelength" class="form-control" id="exampleFormControlSelect1">
                            <option value="10">Lihat 10</option>
                            <option value="20">Lihat 20</option>
                            <option value="500">Lihat Semua</option>
                        </select>
                    </div>
                </div>
                <table class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No Hp</th>
                            <th class="d-print-none">Aksi</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th><input type="text" wire:model.live.debounce.400ms = "search_namanik"></th>
                            <th><input type="text" wire:model.live.debounce.400ms = "search_nohp"></th>
                            <th class="d-print-none"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tenants as $tenant)
                            <tr wire:key={{ $tenant->id }}>
                                <td>{{ ($tenants->currentpage() - 1) * $tenants->perpage() + $loop->index + 1 }}</td>
                                <td>{{ $tenant->nama }} <br>
                                    <div class="badge badge-pill badge-warning">NIK : {{ $tenant->nik }}</div>
                                </td>
                                <td><a href="#" class="btn btn-sm btn-success"><i class="icon-whatsapp"></i>
                                        {{ $tenant->nohp }}</a>
                                </td>
                                <td class="d-flex d-print-none">
                                    <a href="{{ url('tenant/' . $tenant->id) }}" wire:navigate class="btn btn-sm btn-warning mr-1"><i class="icon-pencil"></i></a>
                                    <button type="button" wire:click="hapusTenant('{{ $tenant->id }}')" wire:confirm="Yakin ingin menghapus {{ $tenant->nama }}?" class="btn btn-sm btn-danger"><i
                                            class="icon-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No Hp</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
                {{ $tenants->links() }}
            </div>
        </div>
    </div>
</div>
