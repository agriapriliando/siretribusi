<div>
    <!-- Button trigger modal -->

    <!-- Modal delete-->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Yakin ingin Hapus?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal Lihat-->
    @if ($bukti)
        <div wire:ignore.self class="modal fade" id="myModal">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Bukti Bayar : {{ $bukti->nama }} | {{ $bukti->ket_by_tenant }}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <img src="{{ asset('storage/file_bukti/' . $bukti->file_bukti) }}" alt="" class="img-fluid">
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <a class="btn btn-success" href="{{ asset('storage/file_bukti/' . $bukti->file_bukti) }}" download>Unduh Bukti</a>
                        <a target="_blank" class="btn btn-success" href="{{ asset('storage/file_bukti/' . $bukti->file_bukti) }}">Open New Tab</a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    @endif
    <!-- end modal lihat -->
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
                        <span>Menu Validasi Bukti Pembayaran</span>
                    </h2>
                </div>
            </div>
            <div class="row">
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
                        <div class="col-6 col-md-4">
                            <div class="form-group">
                                <select wire:model.live="search_confirmed" class="form-control">
                                    <option value="">Semua Status</option>
                                    <option value="1">Valid</option>
                                    <option value="FALSE">Belum Valid</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 col-md-2">
                            <div class="form-group">
                                <select wire:model.live="pagelength" class="form-control">
                                    <option value="10">Lihat 10</option>
                                    <option value="20">Lihat 20</option>
                                    <option value="500">Lihat Semua</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Penyewa</th>
                                    <th>Kode</th>
                                    <th class="d-none d-md-block">Tanggal</th>
                                    <th class="d-print-none">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($uploads as $item)
                                    <tr wire:key={{ $item->id }} style="background-color: {{ $item->confirmed == 1 ? '#beffc8' : '#ffbebe' }};">
                                        <td>{{ ($uploads->currentpage() - 1) * $uploads->perpage() + $loop->index + 1 }}</td>
                                        <td style="max-width: 350px">
                                            {{ $item->nama }} <a target="_blank" href="https://api.whatsapp.com/send/?phone={{ $item->tenant->nohp }}&text=Hai%20{{ $item->tenant->nama }},"><i
                                                    style="color: #009c17;" class="icon-whatsapp"></i></a>
                                            <div style="font-style: italic">
                                                {{ $item->ket_by_tenant }}
                                            </div>
                                            <div style="font-style: italic">
                                                Sejumlah @currency($item->nominal)
                                            </div>
                                        </td>
                                        <td>
                                            <span class="font-weight-bold">{{ $item->kode }}</span>
                                            <button wire:click="lihat_bukti({{ $item->id }})" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">
                                                <i class="icon-eye"></i>
                                            </button><br>
                                            <span wire:confirm="Yakin Merubah Status Valid?" wire:click="ubah_status({{ $item->id }})"
                                                class="btn btn-sm {{ $item->confirmed == 1 ? 'btn-success' : 'btn-danger' }}">{{ $item->confirmed == 1 ? 'Valid by ' . $item->validator : 'Belum Valid' }}</span>
                                            <div class="d-md-none">
                                                <span class="badge pill-badge badge-warning">Submit {{ $item->created_at->format('d/m/Y H:i') }} Wib</span><br>
                                                <span class="badge pill-badge badge-warning">Updated {{ $item->updated_at->format('d/m/Y H:i') }} Wib</span>
                                            </div>
                                        </td>
                                        <td class="d-none d-md-block">
                                            Submit {{ $item->created_at->format('d, M Y H:i') }} Wib<br>
                                            Updated {{ $item->updated_at->format('d, M Y H:i') }} Wib
                                        </td>
                                        <td class="d-print-none">
                                            <div class="d-flex">
                                                <a href="{{ url('upload/update/' . $item->id) }}" wire:navigate class="btn btn-sm btn-warning mr-2"><i class="icon-pencil"></i></a>
                                                <button type="button" wire:click="hapusItem({{ $item->id }})"
                                                    wire:confirm="Yakin ingin menghapus bukti Pembayaran {{ $item->nama }}? Setelah terhapus, data tidak bisa dipulihkan."
                                                    class="btn btn-sm btn-danger"><i class="icon-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Penyewa</th>
                                    <th>Kode</th>
                                    <th class="d-none d-md-block">Tanggal</th>
                                    <th class="d-print-none">Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
