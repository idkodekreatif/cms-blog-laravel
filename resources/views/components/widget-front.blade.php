<!-- Side widgets-->
@props(['categories_posts'])
<div class="col-lg-4">
    <!-- Search widget-->
    <div class="card mb-4">
        <div class="card-header">Search</div>
        <div class="card-body">
            <form action="{{ route('article_search') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="keywords" placeholder="Enter search article..."
                        aria-label="Enter search article..." aria-describedby="button-search" />
                    <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            @foreach ($categories_posts as $category)
            <a href="{{ url('c/'. $category->slug) }}">
                <span class="badge text-bg-primary">{{ $category->name }}</span>
            </a>
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