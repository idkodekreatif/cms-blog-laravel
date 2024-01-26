@props(['breadcrumbs'])
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                @foreach (Breadcrumbs::generate(Route::currentRouteName()) as $breadcrumb)
                @if ($breadcrumb->url && !$loop->last)
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><a
                        href="{{ $breadcrumb->url }}">{{
                        $breadcrumb->title }}</a></li>
                @else
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{ $breadcrumb->title }}</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">{{ $breadcrumb->title }}</h6>
            @endif
            @endforeach
        </nav>
        {{-- <nav>
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="text-sm leading-normal">
                    <a class="opacity-50 text-slate-700" href="javascript:void(0)">Pages</a>
                </li>
                @foreach (Breadcrumbs::generate(Route::currentRouteName()) as $breadcrumb)
                @if ($breadcrumb->url && !$loop->last)
                <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']"
                    aria-current="page"><a class="opacity-50 text-slate-700" href="{{ $breadcrumb->url }}">{{
                        $breadcrumb->title }}</a></li>
                @else
                <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']"
                    aria-current="page">{{ $breadcrumb->title }}</li>
            </ol>
            <h6 class="mb-0 font-bold capitalize">{{ $breadcrumb->title }}</h6>
            @endif
            @endforeach
        </nav> --}}
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">


                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();"
                            class="nav-link text-body font-weight-bold px-0">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <i class="fa fa-sign-out me-sm-1" aria-hidden="true"></i>
                            <span class="d-sm-inline d-none">Sign Out</span>
                        </a>
                    </li>

                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</nav>