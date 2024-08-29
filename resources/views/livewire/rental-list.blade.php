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
            <div class="col-lg-6 mb-2">
                <h2 class="section-title-underline">
                    <span>Daftar Penyewaan</span>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="row d-md-flex justify-content-end">
                    <div class="col-12 col-md-2">
                        <a href="{{ url('rental/create') }}" class="btn btn-success mb-3 mr-2 float-right"><i class="icon-plus"></i> Tambah</a>
                    </div>
                    <div class="col-12 col-md-4">
                        <input type="text" wire:model.live.debounce.400ms="search" class="form-control w-100 mr-2 mb-2" placeholder="Pencarian">
                    </div>
                    <div class="col-12 col-md-2 form-group">
                        <select wire:model.live="pagelength" class="form-control" id="exampleFormControlSelect1">
                            <option value="10">Lihat 10</option>
                            <option value="20">Lihat 20</option>
                            <option value="500">Lihat Semua</option>
                        </select>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Objek - Bidang</th>
                                <th>Nama | Merk</th>
                                <th>Kirim</th>
                                <th>Masa Sewa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rentals as $r)
                                <tr>
                                    <td>{{ ($rentals->currentpage() - 1) * $rentals->perpage() + $loop->index + 1 }}</td>
                                    <td>{{ $r->item->nama . ' - ' . $r->sector->nama }}</td>
                                    <td>{{ $r->tenant->nama }}<br>
                                        <div class="badge badge-pill badge-warning">{{ $r->merk_usaha }}</div>
                                    </td>
                                    <td><a target="_blank" href="{{ url('upload/' . $r->tenant_id . '/1') }}" class="btn btn-sm btn-success"><i class="icon-whatsapp"></i>
                                            Klik WA</a>
                                    </td>
                                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $r->tgl_mulai)->translatedFormat('j/m/Y') }}
                                        sd {{ \Carbon\Carbon::createFromFormat('Y-m-d', $r->tgl_selesai)->translatedFormat('j/m/Y') }}
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="#" class="btn btn-sm btn-warning mr-1"><i class="icon-pencil"></i></a>
                                            <form action="">
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="icon-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Objek</th>
                                <th>Nama | Merk</th>
                                <th>Kirim</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                {{-- {{ $tenants->links() }} --}}
            </div>
        </div>
    </div>
</div>
