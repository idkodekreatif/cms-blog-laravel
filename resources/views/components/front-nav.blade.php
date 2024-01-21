<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Kode Kreatif<span>.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
            aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li><a class="nav-link" href="Javascript:void(0)">About us</a></li>
                <li class="nav-item {{ request()->is('article') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('article') }}">Artikel</a>
                </li>
                <li><a class="nav-link" href="Javascript:void(0)">Contact us</a></li>
            </ul>

        </div>
    </div>

</nav>