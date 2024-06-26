<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

    <div class="container">
        {{-- <a class="navbar-brand" href="{{ url('/') }}">Code Creative<span>.</span></a> --}}
        <div class="logo-container">
            <a href="{{ url('/') }}"><img class="logo-img" src="{{ asset('assets/img/logo-white.png') }}"
                    alt="Logo" /></a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
            aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item {{ request()->is('article') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('article') }}">Artikel</a>
                </li>
                <li class="nav-item {{ request()->is('portofolio') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('portofolio') }}">Portofolio</a>
                </li>
                <li class="nav-item {{ request()->is('contact-as') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('contact_as') }}">Contact us</a>
                </li>
            </ul>

        </div>
    </div>

</nav>
