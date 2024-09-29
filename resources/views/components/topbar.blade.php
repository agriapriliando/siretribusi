<div class="py-2 bg-light d-print-none">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <style>
                .green {
                    color: #006202 !important;
                }

                .green:hover {
                    text-decoration: underline;
                }
            </style>
            @if (Auth::user())
                <div class="col-lg-12 text-center">
                    <div class="badge badge-info">Selamat Datang, {{ Auth::user()->name }}</div>
                </div>
            @else
                <div class="col-lg-12 text-center">
                    <a href="#" class="small mr-3 green"><span class="icon-question-circle-o mr-2"></span> Ajukan Pertanyaan?</a>
                    <a href="#" class="small mr-3 green"><span class="icon-phone2 mr-2"></span> {{ $user->nohp }}</a>
                    <a href="#" class="small mr-3 green"><span class="icon-envelope-o mr-2"></span>
                        info@simdida.go.id</a>
                </div>
            @endif
        </div>
    </div>
</div>
