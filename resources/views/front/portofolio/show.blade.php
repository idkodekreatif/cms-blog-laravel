<x-apps-front-layouts title="Kode Kreatif | {{ $portofolio->title }}">
    @push('styles')
    @endpush
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8 mt-7" data-aos="zoom-in">
                <!-- Featured blog post-->
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
                        <p class="card-text">{!!$portofolio->description !!}</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 d-none d-md-block">
                <x-widget-front />
            </div>
        </div>
    </div>
    @push('scripts')
    @endpush
</x-apps-front-layouts>