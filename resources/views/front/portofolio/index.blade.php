<x-apps-front-layouts title="Kode Kreatif | Portofolios">
    @push('styles')
    @endpush
    <div class="blog-section">
        <div class="container">
            {{-- <div class="mb-5">
                <form action="{{ route('portofolio') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input class="form-control" type="text" name="keywords" placeholder="Enter search portofolio..."
                            aria-label="Enter search portofolio..." aria-describedby="button-search" />
                        <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                    </div>
                </form>
            </div>
            @if ($keywords)
            <p>Showing portofolios with keywords: <b>{{ $keywords }}</b></p>
            @endif --}}


            <div class="row">
                @forelse ($portofolios as $portofolio )
                <div class="col-12 col-sm-6 col-md-4 mb-5">
                    <div class="post-entry" style="height: 100%;">
                        <a href="{{ url('portofolio/'.$portofolio->slug) }}" class="post-thumbnail">
                            <img src="{{ asset('storage/back/img/portofolio/'. $portofolio->img) }}" alt="Image"
                                class="img-fluid" style="object-fit: cover; width: 100%; height: auto;">
                        </a>
                        <div class="post-content-entry">
                            <h3><a href="{{ url('portofolio/'.$portofolio->slug) }}">{{ $portofolio->title }}</a></h3>
                            <p class="card-text" style="height: 60px; overflow: hidden;">
                                {!! Str::limit(strip_tags($portofolio->description), 100, '...') !!}
                            </p>
                            <div class="meta">
                                <span>by <a href="#">{{ $portofolio->user->name }}</a></span>
                                <span>on <a href="#">{{ \Carbon\Carbon::parse($portofolio->created_at)->format('M d, Y')
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
                {{ $portofolios->links() }}
            </div>
        </div>
    </div>
    @push('scripts')
    @endpush
</x-apps-front-layouts>