<x-apps-front-layouts title="{{ isset($keywords) ? 'Code Creative | ' . $keywords : 'Code Creative ' }}">
    @push('styles')
    <style>
        .client {
            color: #3b5d50;
        }
    </style>
    @endpush
    <div class="popular-product bg-partners bg-secondary-subtle">
        <div class="container">
            <div class="p-3">
                <div class="text-center p-2 m-3">
                    <p class=" with-lines client">Client</p>
                    <h2 class="h4 text-secondary mb-2">Who Have Collaborated</h2>
                    <p class="text-secondary with-lines">Collaborating for Success</p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-2">
                        <img src="image_url_1" alt="Image partner 1" class="img-fluid">
                    </div>
                    <div class="col-md-2">
                        <img src="image_url_2" alt="Image partner 2" class="img-fluid">
                    </div>
                    <div class="col-md-2">
                        <img src="image_url_3" alt="Image partner 3" class="img-fluid">
                    </div>
                    <div class="col-md-2">
                        <img src="image_url_4" alt="Image partner 4" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (!isset($keywords))
    <!-- Start Popular Product -->
    <div class="popular-product">
        <div class="blog-section">
            <div class="container">
                <div class="row">

                    <!-- Start Column 1 (Code Creative) -->
                    <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                        <h2 class="mb-4 section-title">Code Creative.</h2>
                        <p class="mb-4">Code Creative brings logic and art together, presenting programming
                            solutions
                            that
                            don't
                            only efficient, but also inspiring and enriching the user experience.</p>
                        <p><a href="{{ route('article') }}" class="btn">Explore</a></p>
                    </div>
                    <!-- End Column 1 -->

                    <!-- Start Column 2 (Product Items) -->
                    <div class="col-md-12 col-lg-9">
                        <div class="row">

                            <h2 class="section-title mb-4">Popular Post</h2>

                            @foreach ($popular_posts as $latest)

                            <div class="col-12 col-md-6 mb-4">
                                <div class="product-item-sm">
                                    <div class="thumbnail">
                                        <a href="{{ url('article/'.$latest->slug) }}">
                                            <img src="{{ asset('storage/back/img/articles/'. $latest->img) }}"
                                                alt="Image" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="pt-3">
                                        <h3><a href="{{ url('article/'.$latest->slug) }}">{{ $latest->title }}</a>
                                        </h3>
                                        <p>{!! Str::limit(strip_tags($latest->description), 100, '...') !!}</p>
                                        <p><a href="{{ url('article/'.$latest->slug) }}">Read More</a></p>
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
    </div>
    @endif
    <!-- End Popular Product -->


    <!-- Start Portfolio Section -->
    <div class="portfolio-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6">
                    <h2 class="section-title">Portfolio</h2>
                </div>
                <div class="col-md-6 text-start text-md-end">
                    <a href="{{ route('portofolio') }}" class="more">View All Portfolios</a>
                </div>
            </div>
            <div class="row">
                <!-- Portfolio Item -->
                @foreach ($latest_portofolios as $portofolio)
                <div class="col-12 col-sm-6 col-md-4 mb-4">
                    <div class="post-entry" style="height: 100%;">
                        <a href="{{ url('portofolio/'.$portofolio->slug) }}" class="post-thumbnail">
                            <img src="{{ asset('storage/back/img/portofolio/'. $portofolio->img) }}" alt="Burger Image"
                                class="img-fluid">
                        </a>
                        <div class="post-content-entry">
                            <h3><a href="{{ url('portofolio/'.$portofolio->slug) }}">{{ $portofolio->title }}</a>
                            </h3>
                            <p class="card-text">{!! Str::limit(strip_tags($portofolio->description), 100, '...')
                                !!}
                            </p>
                            <div class="meta">
                                <span>by <a href="#">{{ $portofolio->user->name }}</a></span> <span>on <a href="#">{{
                                        \Carbon\Carbon::parse($portofolio->created_at)->format('M d, Y')
                                        }}</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Portfolio Section -->

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
                    <div class="post-entry" style="height: 100%;">
                        <a href="{{ url('article/'.$old_post->slug) }}" class="post-thumbnail"><img
                                src="{{ asset('storage/back/img/articles/'. $old_post->img) }}" alt="Image"
                                class="img-fluid"></a>
                        <div class="post-content-entry">
                            <h3><a href="{{ url('article/'.$old_post->slug) }}">{{ $old_post->title }}</a></h3>
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
