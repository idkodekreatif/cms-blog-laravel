<x-apps-front-layouts title="{{ isset($keywords) ? 'Kode Kreatif | ' . $keywords : 'Kode Kreatif ' }}">
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

                        <h2 class="section-title mb-4">Popular Post</h2>

                        @foreach ($latest_posts as $latest)

                        <div class="col-12 col-md-6 mb-4">
                            <div class="product-item-sm">
                                <div class="thumbnail">
                                    <a href="{{ url('p/'.$latest->slug) }}">
                                        <img src="{{ asset('storage/back/img/articles/'. $latest->img) }}" alt="Image"
                                            class="img-fluid">
                                    </a>
                                </div>
                                <div class="pt-3">
                                    <h3><a href="{{ url('p/'.$latest->slug) }}">{{ $latest->title }}</a></h3>
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


    <!-- Start Portfolio Section -->
    <div class="portfolio-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6">
                    <h2 class="section-title">Portfolio</h2>
                </div>
                <div class="col-md-6 text-start text-md-end">
                    <a href="javascript:void(0)" class="more">View All Portfolios</a>
                </div>
            </div>
            <div class="row mb-2">
                <ul class="filters_menu">
                    <li class="active" data-filter="*">All</li>
                    <li data-filter=".burger">Burger</li>
                    <li data-filter=".pizza">Pizza</li>
                    <li data-filter=".pasta">Pasta</li>
                    <li data-filter=".fries">Fries</li>
                </ul>
            </div>
            <div class="row">
                <!-- Portfolio Item -->
                <div class="col-12 col-sm-6 col-md-4 mb-4">
                    <div class="post-entry" style="height: 100%;">
                        <a href="javascript:void(0)" class="post-thumbnail">
                            <img src="https://via.placeholder.com/150" alt="Burger Image" class="img-fluid">
                        </a>
                        <div class="post-content-entry">
                            <h3><a href="javascript:void(0)">Delicious Burger</a></h3>
                            <p class="card-text">A mouth-watering burger with cheese and lettuce.</p>
                            <div class="meta">
                                <span>by <a href="#">Chef Baha</a></span> <span>on <a href="#">April 10, 2024</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Portfolio Item -->
                <div class="col-12 col-sm-6 col-md-4 mb-4">
                    <div class="post-entry" style="height: 100%;">
                        <a href="javascript:void(0)" class="post-thumbnail">
                            <img src="https://via.placeholder.com/150" alt="Pizza Image" class="img-fluid">
                        </a>
                        <div class="post-content-entry">
                            <h3><a href="javascript:void(0)">Classic Pizza</a></h3>
                            <p class="card-text">Classic Margherita Pizza with fresh tomatoes and basil.</p>
                            <div class="meta">
                                <span>by <a href="#">Chef Baha</a></span> <span>on <a href="#">April 9, 2024</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Portfolio Item -->
                <div class="col-12 col-sm-6 col-md-4 mb-4">
                    <div class="post-entry" style="height: 100%;">
                        <a href="javascript:void(0)" class="post-thumbnail">
                            <img src="https://via.placeholder.com/150" alt="Pasta Image" class="img-fluid">
                        </a>
                        <div class="post-content-entry">
                            <h3><a href="javascript:void(0)">Creamy Pasta</a></h3>
                            <p class="card-text">Delicious creamy pasta with mushrooms and parmesan cheese.</p>
                            <div class="meta">
                                <span>by <a href="#">Chef Baha</a></span> <span>on <a href="#">April 8, 2024</a></span>
                            </div>
                        </div>
                    </div>
                </div>
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
                        <a href="{{ url('p/'.$old_post->slug) }}" class="post-thumbnail"><img
                                src="{{ asset('storage/back/img/articles/'. $old_post->img) }}" alt="Image"
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