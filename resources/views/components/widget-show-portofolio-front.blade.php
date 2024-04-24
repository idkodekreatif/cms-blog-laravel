<!-- Side widgets-->
@props(['categories_posts'])
<div class="sticky-top" data-aos="fade-left">
    <!-- Search widget-->
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('portofolio') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="keywords" placeholder="Enter search portofolio..."
                        aria-label="Enter search portofolio..." aria-describedby="button-search" />
                    <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12 col-md-12 mt-4 mt-md-0">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
                <p>Popular Portofolio categories can be selected.</p>
                <hr>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0 custom-badge-row">
                    @foreach ($categories_posts as $category)
                    <li>
                        <span class="badge rounded-pill custom-border">
                            <a href="{{ url('category/'. $category->slug) }}" class="text-primary">{{ $category->name }}
                                ({{
                                $category->portofolios_count }})</a>
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- Populer widget-->

    <div class="col-12 col-md-12 mt-4 mt-md-0">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Popular Posting</h6>
                <p>The most popular portofolio can be seen.</p>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0 ">
                    @foreach ($popular_portofolio as $portofolio)
                    <li>
                        <span class="badge rounded-pill custom-border">
                            <a href="{{ url('portofolio/'. $portofolio->slug) }}">{{
                                Str::limit(strip_tags($portofolio->title),
                                35,
                                '...') }}</a>
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!-- Side widget-->
    <div class="card mb-4">
        <div class="card-header">Side Widget</div>
        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to
            use, and feature the Bootstrap 5 card component!</div>
    </div>
</div>