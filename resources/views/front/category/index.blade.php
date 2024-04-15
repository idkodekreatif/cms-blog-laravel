<x-apps-front-layouts title="Kode Kreatif | Categories">
    @push('styles')
    @endpush

    <div class="container">
        <div class="mb-2">
            <form action="{{ route('article') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="keywords" placeholder="Enter search article..."
                        aria-label="Enter search article..." aria-describedby="button-search" />
                    <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                </div>
            </form>
        </div>

        <p>Showing categories with keywords: <b>{{ $categories }}</b></p>

        <div class="row">
            @if (count($articles) > 0)
            <!-- Blog entries-->
            @foreach ($articles as $article)
            <div class="col-lg-6">
                <!-- Blog post-->
                <div class="card mb-4">
                    <a href="{{ url('article/'.$article->slug) }}"><img class="card-img-top" width="50%" height="25%"
                            src="{{ asset('storage/back/img/articles/'. $article->img) }}" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">
                            {{ \Carbon\Carbon::parse($article->created_at)->format('Y-m-d') }}
                        </div>
                        <div class="small text-muted">
                            <a href="{{ url('category/'. $article->categories->slug) }}">
                                {{ $article->categories->name }}
                            </a>
                        </div>
                        <h2 class="card-title h4">{{ $article->title }}</h2>
                        <p class="card-text">{!! Str::limit(strip_tags($article->description), 150, '...') !!}
                        </p>
                        <a class="btn btn-primary" href="{{ url('article/'.$article->slug) }}">Read more →</a>
                    </div>
                </div>
            </div>
            @endforeach
            @elseif (count($portofolios) > 0)
            <!-- Portofolio entries-->
            @foreach ($portofolios as $portofolio)
            <div class="col-lg-6">
                <!-- Portofolio post-->
                <div class="card mb-4">
                    <a href="{{ url('portofolio/'.$portofolio->slug) }}"><img class="card-img-top" width="50%"
                            height="25%" src="{{ asset('storage/back/img/portofolio/'. $portofolio->img) }}"
                            alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">
                            {{ \Carbon\Carbon::parse($portofolio->created_at)->format('Y-m-d') }}
                        </div>
                        <div class="small text-muted">
                            <a href="{{ url('category/'. $portofolio->categories->slug) }}">
                                {{ $portofolio->categories->name }}
                            </a>
                        </div>
                        <h2 class="card-title h4">{{ $portofolio->title }}</h2>
                        <p class="card-text">{!! Str::limit(strip_tags($portofolio->description), 150, '...') !!}
                        </p>
                        <a class="btn btn-primary" href="{{ url('portofolio/'.$portofolio->slug) }}">Read more →</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <h3>No Data Found</h3>
            @endif
        </div>
    </div>

    @push('scripts')
    @endpush
</x-apps-front-layouts>