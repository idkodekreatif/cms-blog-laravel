<x-apps-front-layouts title="Kode Kreatif | {{ $article->title }}">
    @push('styles')
    @endpush
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8 mt-7" data-aos="zoom-in">
                <!-- Featured blog post-->
                <div class="card mb-4">
                    <a href="{{ url('p/'.$article->slug) }}"><img class="card-img-top"
                            src="{{ asset('storage/back/img/articles/'. $article->img) }}"
                            alt="{{ $article->title }}" /></a>
                    <div class="card-body">
                        <div class="small text-muted">
                            {{ \Carbon\Carbon::parse($article->created_at)->format('Y-m-d') }} | <a
                                href="{{ url('c/'. $article->categories->slug) }}">
                                {{ $article->categories->name }}
                            </a> | {{ $article->user->name }}
                        </div>
                        <div class="small text-muted">
                            {{ $article->views }} views
                        </div>
                        <h2 class="card-title">{{ $article->title }}</h2>
                        <p class="card-text">{!!$article->description !!}</a>
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