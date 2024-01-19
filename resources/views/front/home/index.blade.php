<x-apps-front-layouts title="Kode Kreatif">
    @push('styles')
    @endpush
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4">
                <a href="#!"><img class="card-img-top" src="{{ asset('storage/back/img/'. $latest_posts->img) }}"
                        alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted">{{ \Carbon\Carbon::parse($latest_posts->created_at)->format('Y-m-d')
                        }}</div>
                    <h2 class="card-title">{{ $latest_posts->title }}</h2>
                    <p class="card-text">{{ Str::limit(strip_tags($latest_posts->description), 200, '...') }}</a>
                </div>
            </div>
            <!-- Nested row for non-featured blog posts-->
            <div class="row">
                @foreach ($old_posts as $old_post)
                <div class="col-lg-6">
                    <!-- Blog post-->
                    <div class="card mb-4">
                        <a href="#!"><img class="card-img-top" width="50%" height="25%"
                                src="{{ asset('storage/back/img/'. $old_post->img) }}" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted">{{
                                \Carbon\Carbon::parse($old_post->created_at)->format('Y-m-d')
                                }}</div>
                            <h2 class="card-title h4">{{ $old_post->title }}</h2>
                            <p class="card-text">{{ Str::limit(strip_tags($old_post->description), 150, '...') }}
                            </p>
                            <a class="btn btn-primary" href="#!">Read more →</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Pagination-->
            <nav aria-label="Pagination">
                <hr class="my-0" />
                <ul class="pagination justify-content-center my-4">
                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"
                            aria-disabled="true">Newer</a></li>
                    <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                    <li class="page-item"><a class="page-link" href="#!">2</a></li>
                    <li class="page-item"><a class="page-link" href="#!">3</a></li>
                    <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                    <li class="page-item"><a class="page-link" href="#!">15</a></li>
                    <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                </ul>
            </nav>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Search widget-->
            <div class="card mb-4">
                <div class="card-header">Search</div>
                <div class="card-body">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Enter search term..."
                            aria-label="Enter search term..." aria-describedby="button-search" />
                        <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                    </div>
                </div>
            </div>
            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    @foreach ($categories_posts as $category)
                    <span class="badge text-bg-primary">{{ $category->name }}</span>
                    @endforeach
                </div>
            </div>
            <!-- Side widget-->
            <div class="card mb-4">
                <div class="card-header">Side Widget</div>
                <div class="card-body">You can put anything you want inside of these side widgets. They are easy to
                    use, and feature the Bootstrap 5 card component!</div>
            </div>
        </div>
    </div>
    @push('scripts')
    @endpush
</x-apps-front-layouts>