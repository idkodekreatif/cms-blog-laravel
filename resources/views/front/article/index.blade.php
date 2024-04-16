<x-apps-front-layouts title="Code Creative | Article">
    @push('styles')
    <style>
        .post-thumbnail img {
            width: 100%;
            height: auto;
            object-fit: cover;
            /* Ensure that images are not stretched */
        }

        .post-content-entry h3 {
            font-size: 1.25rem;
            /* Base font size for large devices */
        }

        .meta {
            font-size: 0.875rem;
            /* Base meta font size */
        }

        /* Smaller devices (tablets, 768px and below) */
        @media (max-width: 768px) {
            .post-content-entry h3 {
                font-size: 1rem;
                /* Smaller font size on small devices */
            }

            .meta {
                font-size: 0.75rem;
                /* Smaller meta font size */
            }
        }

        /* Very small devices (phones, 576px and below) */
        @media (max-width: 576px) {
            .post-content-entry h3 {
                font-size: 0.9rem;
                /* Even smaller font size for very small devices */
            }

            .meta {
                font-size: 0.7rem;
                /* Even smaller meta font size */
            }
        }

        .article-item {
            /* flex: 0 0 calc(33.33% - 20px); */
            margin: 5px;
            padding: 15px;
            background-color: #fff;
            border-radius: 8px;
        }
    </style>
    @endpush

    <div class="container py-4">
        <div class="row">
            <!-- Main content area -->
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="blog-section">
                    @if ($keywords)
                    <p class="m-4">Showing articles with keywords: <b>{{ $keywords }}</b></p>
                    @endif

                    <div class="row m-3">
                        @forelse ($articles as $article)
                        <div class=" article-item col-lg-4 col-md-6 col-sm-12 mb-5">
                            <div class="post-entry">
                                <a href="{{ url('article/'.$article->slug) }}" class="post-thumbnail">
                                    <img src="{{ asset('storage/back/img/articles/'. $article->img) }}" alt="Image"
                                        class="img-fluid">
                                </a>
                                <div class="post-content-entry">
                                    <h3><a href="{{ url('article/'.$article->slug) }}">{{ $article->title }}</a></h3>
                                    <p class="card-text">{!! Str::limit(strip_tags($article->description), 100, '...')
                                        !!}
                                    </p>
                                    <div class="meta">
                                        <span>by <a href="#">{{ $article->user->name }}</a></span>
                                        <span>on <a href="#">{{ \Carbon\Carbon::parse($article->created_at)->format('M
                                                d,
                                                Y') }}</a></span>
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