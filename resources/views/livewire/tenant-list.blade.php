<div class="site-section">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-6 mb-5">
                <h2 class="section-title-underline">
                    <span>Daftar Penyewa / Wajib Retribusi</span>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="{{ url('tenant/create') }}" wire:navigate class="btn btn-success mb-2"><i class="icon-plus"></i> Tambah</a>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No Hp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tenants as $tenant)
                            <tr wire:key={{ $tenant->id }}>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tenant->nama }} <br>
                                    <div class="badge badge-pill badge-warning">NIK : {{ $tenant->nik }}</div>
                                </td>
                                <td><a href="#" class="btn btn-sm btn-success"><i class="icon-whatsapp"></i>
                                        {{ $tenant->nohp }}</a>
                                </td>
                                <td class="d-flex">
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
            </div>
        </div>
    </div>
</div>
