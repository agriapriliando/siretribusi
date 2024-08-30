<div>
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

        <div class="container">
            <div class="d-flex align-items-center">
                <div class="site-logo">
                    <a href="#" class="d-block">
                        <img src="{{ asset('assets') }}/images/logo_simbida.png" style="max-width: 160px" alt="Image" class="img-fluid">
                    </a>
                </div>
                <div class="mr-auto">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li class="{{ request()->is('rental*') ? 'active' : '' }}">
                                <a href="{{ url('rental/list') }}" wire:navigate class="nav-link text-left">Penyewaan</a>
                            </li>
                            <li class="{{ request()->is('upload*') ? 'active' : '' }}">
                                <a href="{{ url('upload/list') }}" wire:navigate class="nav-link text-left">Validasi</a>
                            </li>
                            <li class="has-children">
                                <a href="#" class="nav-link text-left">Data</a>
                                <ul class="dropdown">
                                    <li class="{{ request()->is('tenant*') ? 'active' : '' }}"><a href="{{ url('tenant/list') }}" wire:navigate>Penyewa</a></li>
                                    <li class="{{ request()->is('item*') ? 'active' : '' }}"><a href="{{ url('item/list') }}" wire:navigate>Objek Sewa</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-left text-underline text-white badge badge-danger p-2 px-3 mx-3">Logout</a>
                            </li>
                        </ul>
                        </ul>
                    </nav>

                </div>
                <div class="ml-auto">
                    <div class="social-wrap">
                        <a href="#"><span class="icon-facebook"></span></a>
                        <a href="#"><span class="icon-instagram"></span></a>

                        <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
                    </div>
                </div>

            </div>
        </div>

    </header>
</div>
