<x-apps-front-layouts title="Code Creative | Portofolio">
    @push('styles')
    <style>
        .article-item {
            border-radius: 8px;
        }
    </style>
    @endpush

    <div class="container py-4">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
                @if ($keywords)
                <p class="m-4">Showing articles with keywords: <b>{{ $keywords }}</b></p>
                @endif

                <div class="row g-4">
                    @forelse ($articles as $article)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="article-item bg-white border-radius-xl p-4">
                            <div class="post-entry">
                                <a href="{{ url('article/'.$article->slug) }}" class="post-thumbnail">
                                    <!-- Menambahkan class article-img -->
                                    <img src="{{ asset('storage/back/img/articles/'. $article->img) }}" alt="Image"
                                        class="img-fluid article-img">
                                </a>
                                <div class="post-content-entry">
                                    <h3><a href="{{ url('article/'.$article->slug) }}">{{ $article->title }}</a></h3>
                                    <p class="card-text">{!! Str::limit(strip_tags($article->description), 100, '...')
                                        !!}
                                    </p>
                                    <div class="meta">
                                        <span>by <a href="#">{{ $article->user->name }}</a></span>
                                        <span>on {{ \Carbon\Carbon::parse($article->created_at)->format('M d, Y')
                                            }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col">
                        <h3>Not Found</h3>
                    </div>
                    @endforelse

                    <div class="m-4 text-center">
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>

            <!-- Sidebar widget area -->
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="widget-section">
                    <x-widget-article-front />
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    @endpush
</x-apps-front-layouts>