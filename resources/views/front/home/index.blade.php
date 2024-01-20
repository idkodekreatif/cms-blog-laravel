<x-apps-front-layouts title="{{ isset($keywords) ? 'Kode Kreatif | ' . $keywords : 'Kode Kreatif | blog' }}">
    @push('styles')
    @endpush
    <div class="row" data-aos="fade-in">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4">
                <a href="{{ url('p/'.$latest_posts->slug) }}"><img class="card-img-top"
                        src="{{ asset('storage/back/img/'. $latest_posts->img) }}" alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted">{{ \Carbon\Carbon::parse($latest_posts->created_at)->format('Y-m-d')
                        }}</div>
                    <div class="small text-muted">
                        <a href="{{ url('c/'. $latest_posts->categories->slug) }}">
                            {{ $latest_posts->categories->name }}
                        </a>
                    </div>
                    <h2 class="card-title">{{ $latest_posts->title }}</h2>
                    <p class="card-text">{!! Str::limit(strip_tags($latest_posts->description), 200, '...') !!}</a>
                        <a class="btn btn-primary" href="{{ url('p/'.$latest_posts->slug) }}">Read more →</a>
                </div>
            </div>
            <!-- Nested row for non-featured blog posts-->
            <div class="row" data-aos="fade-up">
                @foreach ($old_posts as $old_post)
                <div class="col-lg-6">
                    <!-- Blog post-->
                    <div class="card mb-4">
                        <a href="{{ url('p/'.$old_post->slug) }}"><img class="card-img-top" width="50%" height="25%"
                                src="{{ asset('storage/back/img/'. $old_post->img) }}" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted">
                                {{ \Carbon\Carbon::parse($old_post->created_at)->format('Y-m-d') }}
                            </div>
                            <div class="small text-muted">
                                <a href="{{ url('c/'. $old_post->categories->slug) }}">
                                    {{ $old_post->categories->name }}
                                </a>
                            </div>
                            <h2 class="card-title h4">{{ $old_post->title }}</h2>
                            <p class="card-text">{!! Str::limit(strip_tags($old_post->description), 150, '...') !!}
                            </p>
                            <a class="btn btn-primary" href="{{ url('p/'.$old_post->slug) }}">Read more →</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Pagination-->
            <nav aria-label="Pagination">
                <hr class="my-0" />
                <div class="mt-2">
                    {{ $old_posts->links() }}
                </div>
            </nav>
        </div>

        <x-widget-front :categories_posts="$categories_posts" />
    </div>
    @push('scripts')
    @endpush
</x-apps-front-layouts>