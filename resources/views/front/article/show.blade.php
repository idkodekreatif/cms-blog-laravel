<x-apps-front-layouts title="Kode Kreatif">
    @push('styles')
    @endpush
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4">
                <a href="{{ url('p/'.$article->slug) }}"><img class="card-img-top"
                        src="{{ asset('storage/back/img/'. $article->img) }}" alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted">{{ \Carbon\Carbon::parse($article->created_at)->format('Y-m-d')
                        }}
                        {{ $article->categories->name }}</div>
                    <h2 class="card-title">{{ $article->title }}</h2>
                    <p class="card-text">{!!$article->description !!}</a>
                </div>
            </div>
        </div>

        <x-widget-front :categories_posts="$categories_posts" />
    </div>
    @push('scripts')
    @endpush
</x-apps-front-layouts>
