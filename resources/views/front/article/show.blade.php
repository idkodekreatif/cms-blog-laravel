<x-apps-front-layouts title="Code Creative | {{ $article->title }}">
    @push('styles')
    <style>
        .article-content img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            border-radius: 10px;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .small.text-muted {
            font-size: 14px;
        }

        .card {
            border-radius: 10px;
        }

        .card-img-top {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
    </style>
    @endpush

    <div class="container">
        <div class="row mt-5">
            <!-- Blog entries-->
            <div class="col-lg-8 mt-7" data-aos="zoom-in">
                <!-- Featured blog post-->
                <div class="card mb-4">
                    <a href="{{ url('article/'.$article->slug) }}"><img class="card-img-top"
                            src="{{ asset('storage/back/img/articles/'. $article->img) }}"
                            alt="{{ $article->title }}" /></a>
                    <div class="card-body">
                        <div class="small text-muted">
                            {{ \Carbon\Carbon::parse($article->created_at)->format('Y-m-d') }} | <a
                                href="{{ url('category/'. $article->categories->slug) }}">
                                {{ $article->categories->name }}
                            </a> | {{ $article->user->name }}
                        </div>
                        <div class="small text-muted">
                            {{ $article->views }} views
                        </div>
                        <h2 class="card-title">{{ $article->title }}</h2>
                        <div class="article-content">
                            {!! $article->description !!}
                        </div>
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