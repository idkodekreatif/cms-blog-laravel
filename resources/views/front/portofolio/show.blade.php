<x-apps-front-layouts title="Code Creative | {{ $portofolio->title }}">
    @push('styles')
    <style>
        .portofolio-content img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            border-radius: 10px;
        }
    </style>
    @endpush

    <div class="container">
        <div class="row">
            <!-- Portofolio entries -->
            <div class="col-lg-8 mt-7" data-aos="zoom-in">
                <!-- Featured portofolio post -->
                <div class="card mb-4">
                    <a href="{{ url('portofolio/'.$portofolio->slug) }}"><img class="card-img-top"
                            src="{{ asset('storage/back/img/portofolio/'. $portofolio->img) }}"
                            alt="{{ $portofolio->title }}" /></a>
                    <div class="card-body">
                        <div class="small text-muted">
                            {{ \Carbon\Carbon::parse($portofolio->created_at)->format('Y-m-d') }} | <a
                                href="{{ url('category/'. $portofolio->categories->slug) }}">
                                {{ $portofolio->categories->name }}
                            </a> | {{ $portofolio->user->name }}
                        </div>
                        <div class="small text-muted">
                            {{ $portofolio->views }} views
                        </div>
                        <h2 class="card-title">{{ $portofolio->title }}</h2>
                        <div class="portofolio-content">
                            {!! $portofolio->description !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4 d-none d-md-block">
                <x-widget-show-portofolio-front />
            </div>
        </div>
    </div>
    @push('scripts')
    @endpush
</x-apps-front-layouts>
