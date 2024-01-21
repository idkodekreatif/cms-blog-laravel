<x-apps-front-layouts title="{{ isset($keywords) ? 'Kode Kreatif | ' . $keywords : 'Kode Kreatif | blog' }}">
    @push('styles')
    @endpush

    @if (!isset($keywords))
    <!-- Start Popular Product -->
    <div class="popular-product">
        <div class="container">
            <div class="row">

                <!-- Start Column 1 (Kode Kreatif) -->
                <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                    <h2 class="mb-4 section-title">Kode Kreatif.</h2>
                    <p class="mb-4">Kode kreatif menyatukan logika dan seni, menghadirkan solusi pemrograman yang tidak
                        hanya efisien, tetapi juga menginspirasi dan memperkaya pengalaman pengguna.</p>
                    <p><a href="shop.html" class="btn">Explore</a></p>
                </div>
                <!-- End Column 1 -->

                <!-- Start Column 2 (Product Items) -->
                <div class="col-md-12 col-lg-9">
                    <div class="row">

                        <h2 class="section-title">Popular Post</h2>

                        @foreach ($latest_posts as $latest)

                        <div class="col-12 col-md-6 mb-4">
                            <div class="product-item-sm d-flex">
                                <div class="thumbnail">
                                    <img src="{{ asset('storage/back/img/'. $latest->img) }}" alt="Image"
                                        class="img-fluid">
                                </div>
                                <div class="pt-3">
                                    <h3>{{ $latest->title }}</h3>
                                    <p>{!! Str::limit(strip_tags($latest->description), 100, '...') !!}</p>
                                    <p><a href="{{ url('p/'.$latest->slug) }}">Read More</a></p>
                                </div>
                            </div>
                        </div>

                        @endforeach

                    </div>
                </div>
                <!-- End Column 2 -->

            </div>
        </div>
    </div>
    @endif
    <!-- End Popular Product -->

    <!-- Start Blog Section -->
    <div class="blog-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6">
                    <h2 class="section-title">Recent Blog</h2>
                </div>
                <div class="col-md-6 text-start text-md-end">
                    <a href="{{ route('article') }}" class="more">View All Posts</a>
                </div>
            </div>

            <div class="row">
                @foreach ($old_posts as $old_post)
                <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
                    <div class="post-entry">
                        <a href="{{ url('p/'.$old_post->slug) }}" class="post-thumbnail"><img
                                src="{{ asset('storage/back/img/'. $old_post->img) }}" alt="Image"
                                class="img-fluid"></a>
                        <div class="post-content-entry">
                            <h3><a href="{{ url('p/'.$old_post->slug) }}">{{ $old_post->title }}</a></h3>
                            <p class="card-text">{!! Str::limit(strip_tags($old_post->description), 100, '...') !!}
                            </p>
                            <div class="meta">
                                <span>by <a href="#">{{ $old_post->user->name }}</a></span> <span>on <a href="#">{{
                                        \Carbon\Carbon::parse($old_post->created_at)->format('M d, Y') }}</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <x-front-testimonial />
    <!-- End Blog Section -->
    @push('scripts')
    @endpush
</x-apps-front-layouts>