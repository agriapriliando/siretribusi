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
                <div class="row d-md-flex justify-content-end">
                    <div class="col-12 col-md-8">
                        <div class="input-group mb-3">
                            <input type="text" wire:model.live.debounce.500ms="search" class="form-control" placeholder="Pencarian">
                            <div class="input-group-append">
                                <button wire:click="resetSearch" class="input-group-text" id="basic-addon2">Reset</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <div class="form-group">
                            <select wire:model.live="pagelength" class="form-control" id="exampleFormControlSelect1">
                                <option value="10">Lihat 10</option>
                                <option value="20">Lihat 20</option>
                                <option value="500">Lihat Semua</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <a href="{{ url('tenant/create') }}" wire:navigate class="btn btn-success mb-3 float-right"><i class="icon-plus"></i> Tambah</a>
                    </div>
                </div>
                <div class="table-responsive">
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
                                    <td class="d-print-none">
                                        <div class="d-flex ">
                                            <a href="{{ url('tenant/' . $tenant->id) }}" wire:navigate class="btn btn-sm btn-warning mr-1"><i class="icon-pencil"></i></a>
                                            <button type="button" wire:click="hapusTenant('{{ $tenant->id }}')" wire:confirm="Yakin ingin menghapus {{ $tenant->nama }}?"
                                                class="btn btn-sm btn-danger"><i class="icon-trash"></i></button>
                                        </div>
                                        <div class="badge badge-primary">Created At : {{ \Carbon\Carbon::parse($tenant->created_at)->translatedFormat('j F Y H:i') }} WIB</div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>No Hp</th>
                                <th class="d-print-none">Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                {{ $tenants->links() }}
            </div>
        </div>
    </div>
</div>
