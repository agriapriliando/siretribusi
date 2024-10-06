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
                    <div class="badge badge-info">Selamat Datang, {{ Auth::user()->name }} <a href="{{ url('logout') }}">Logout</a></div>
                </div>
            @else
                <div class="col-lg-12 text-center">
                    <a target="_blank" href="https://api.whatsapp.com/send/?phone={{ $user->nohp }}&text=Hai%20Admin%20Simbida%2C%20" class="small mr-3 green"><span
                            class="icon-question-circle-o mr-2"></span> Ajukan Pertanyaan?</a>
                    <a target="_blank" href="https://api.whatsapp.com/send/?phone={{ $user->nohp }}&text=Hai%20Admin%20Simbida%2C%20" class="small mr-3 green"><span class="icon-phone2 mr-2"></span>
                        {{ $user->nohp }}</a>
                    <a href="#" class="small mr-3 green d-none"><span class="icon-envelope-o mr-2"></span>
                        info@simdida.go.id</a>
                </div>
            @endif
        </div>
    </div>
</div>
