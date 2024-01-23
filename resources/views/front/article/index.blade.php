<x-apps-front-layouts title="Kode Kreatif | Article">
    @push('styles')
    @endpush
    <div class="blog-section">
        <div class="container">
            <div class="mb-5">
                <form action="{{ route('article') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input class="form-control" type="text" name="keywords" placeholder="Enter search article..."
                            aria-label="Enter search article..." aria-describedby="button-search" />
                        <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                    </div>
                </form>
            </div>
            @if ($keywords)
            <p>Showing articles with keywords: <b>{{ $keywords }}</b></p>
            @endif


            <div class="row">
                @forelse ($articles as $article )
                <div class="col-12 col-sm-6 col-md-4 mb-5">
                    <div class="post-entry" style="height: 100%;">
                        <a href="{{ url('p/'.$article->slug) }}" class="post-thumbnail">
                            <img src="{{ asset('storage/back/img/'. $article->img) }}" alt="Image" class="img-fluid"
                                style="object-fit: cover; width: 100%; height: auto;">
                        </a>
                        <div class="post-content-entry">
                            <h3><a href="{{ url('p/'.$article->slug) }}">{{ $article->title }}</a></h3>
                            <p class="card-text" style="height: 60px; overflow: hidden;">
                                {!! Str::limit(strip_tags($article->description), 100, '...') !!}
                            </p>
                            <div class="meta">
                                <span>by <a href="#">{{ $article->user->name }}</a></span>
                                <span>on <a href="#">{{ \Carbon\Carbon::parse($article->created_at)->format('M d, Y')
                                        }}</a></span>
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

            <div class="my-4 text-center">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
    @push('scripts')
    @endpush
</x-apps-front-layouts>