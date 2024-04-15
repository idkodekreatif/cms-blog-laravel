<x-apps-front-layouts title="Code Creative | Article">
    @push('styles')
    <style>
        .post-entry {
            height: 100%;
        }

        .post-thumbnail img {
            object-fit: cover;
            width: 100%;
            height: auto;
        }

        .card-text {
            height: 60px;
            overflow: hidden;
        }

        .meta {
            margin-top: 10px;
            font-size: 14px;
            color: #777;
        }
    </style>
    @endpush

    <div class="container py-4">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-section">
                    @if ($keywords)
                    <p class="m-4">Showing articles with keywords: <b>{{ $keywords }}</b></p>
                    @endif

                    <div class="row m-3">
                        @forelse ($articles as $article )
                        <div class="col-12 col-sm-6 col-md-4 mb-5">
                            <div class="post-entry">
                                <a href="{{ url('article/'.$article->slug) }}" class="post-thumbnail">
                                    <img src="{{ asset('storage/back/img/articles/'. $article->img) }}" alt="Image"
                                        class="img-fluid">
                                </a>
                                <div class="post-content-entry">
                                    <h3><a href="{{ url('article/'.$article->slug) }}">{{ $article->title }}</a></h3>
                                    <p class="card-text">
                                        {!! Str::limit(strip_tags($article->description), 100, '...') !!}
                                    </p>
                                    <div class="meta">
                                        <span>by <a href="#">{{ $article->user->name }}</a></span>
                                        <span>on <a href="#">{{ \Carbon\Carbon::parse($article->created_at)->format('M
                                                d, Y') }}</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <h3>Not Found</h3>
                        </div>
                        @endforelse
                    </div>

                    <div class="m-4 text-center">
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Widget Section -->
                <div class="widget-section">
                    <!-- Include your left side widget content here -->
                    <x-widget-article-front />
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    @endpush
</x-apps-front-layouts>
