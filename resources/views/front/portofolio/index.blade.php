<x-apps-front-layouts title="Code Creative | Portofolio">
    @push('styles')
    <style>
        .post-entry {
            height: 100%;
        }

        .post-thumbnail img {
            object-fit: cover;
            width: 100%;
            height: auto;
        }

        .card-text,
        .meta {
            overflow: hidden;
            font-size: 14px;
            color: #777;
        }

        /* .card-text {
            height: 60px;
        } */

        .meta {
            margin-top: 10px;
        }

        .tab-button {
            margin: 5px;
            color: #3b5d50;
            background-color: rgb(255, 255, 255);
            border-color: #3b5d50;
            padding: 6px 20px;
            font-size: 14px;
            border-radius: 50rem;
        }

        .tab-button.active,
        .tab-button:hover {
            background-color: #3b5d50;
            color: white;
        }

        .category-tabs {
            text-align: center;
        }

        /* .portofolio-container {
            display: flex;
            flex-wrap: wrap;
        } */

        .portofolio-item {
            /* flex: 0 0 calc(33.33% - 20px); */
            margin: 5px;
            padding: 15px;
            background-color: #fff;
            border-radius: 8px;
        }

        .portofolio-item .post-content-entry h3 a {
            color: #333;
        }
    </style>
    @endpush

    <div class="container py-4">
        <div class="category-tabs">
            <button class="btn btn-outline-primary btn-sm tab-button" data-id="all">All</button>
            @foreach ($categories as $category)
            <button class="btn btn-outline-primary btn-sm tab-button" data-id="{{ $category->id }}">{{
                $category->name
                }}</button>
            @endforeach
        </div>

        <div class="portofolio-container row">
            <div class="col-lg-12 col-md-8 col-sm-12">
                <div class="blog-section">
                    {{-- @if ($keywords)
                    <p class="m-4">Showing articles with keywords: <b>{{ $keywords }}</b></p>
                    @endif --}}

                    <div class="row p-3">
                        @forelse ($portofolios as $portofolio )
                        <div class="portofolio-item col-sm-0 col-md-0">
                            <div class="post-entry">
                                <a href="{{ url('portofolio/'.$portofolio->slug) }}" class="post-thumbnail">
                                    <img src="{{ asset('storage/back/img/portofolio/'. $portofolio->img) }}" alt="Image"
                                        class="img-fluid">
                                </a>
                                <div class="post-content-entry">
                                    <h3><a href="{{ url('portofolio/'.$portofolio->slug) }}">{{ $portofolio->title
                                            }}</a>
                                    </h3>
                                    <p class="card-text">
                                        {!! Str::limit(strip_tags($portofolio->description), 100, '...') !!}
                                    </p>
                                    <div class="meta">
                                        <span>by <a href="#">{{ $portofolio->user->name }}</a></span>
                                        <span>on {{ \Carbon\Carbon::parse($portofolio->created_at)->format('M d, Y')
                                            }}</span>
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

                    <div class="m-4 text-center">
                        {{ $portofolios->links() }}
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-4">
                <!-- Widget Section -->
                <div class="widget-section">
                    <!-- Include your left side widget content here -->
                    <x-widget-show-portofolio-front />
                </div>
            </div> --}}
        </div>
    </div>

    @push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
        // Mengatur aksi klik pada setiap tab kategori
        $('.tab-button').click(function() {
            $('.tab-button').removeClass('active');
            $(this).addClass('active');
            var categoryId = $(this).data('id');
            // Memuat portofolio berdasarkan kategori atau menampilkan semua
            if (categoryId === 'all') {
                displayAllPortofolios();
            } else {
                $.ajax({
                    url: '{{ route("portofolio.category") }}',
                    method: 'GET',
                    data: { category_id: categoryId },
                    success: function(data) {
                        displayPortofolios(data.portofolios);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });

        function displayAllPortofolios() {
            $.ajax({
                url: '{{ route("portofolio.all") }}',
                method: 'GET',
                success: function(data) {
                    displayPortofolios(data.portofolios);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        function displayPortofolios(portofolios) {
            var html = '';
            if (portofolios.length > 0) {
                portofolios.forEach(function(portofolio) {
                    html += buildPortofolioHtml(portofolio);
                });
            } else {
                html = '<div class="col-12"><h3>No Portfolios Found</h3></div>';
            }
            $('.portofolio-container').html(html);
        }

        function buildPortofolioHtml(portofolio) {
            return '<div class="portofolio-item col-12 col-sm-6 col-md-0 mb-5">' +
                '<div class="post-entry">' +
                '<a href="/portofolio/' + portofolio.slug + '" class="post-thumbnail">' +
                '<img src="/storage/back/img/portofolio/' + portofolio.img + '" alt="Image" class="img-fluid"></a>' +
                '<div class="post-content-entry">' +
                '<h3><a href="/portofolio/' + portofolio.slug + '">' + portofolio.title + '</a></h3>' +
                '<p class="card-text">' + portofolio.description.substring(0, 100) + '...</p>' +
                '<div class="meta">' +
                '<span>by <a href="#">' + portofolio.user.name + '</a></span>' +
                '<span>on ' + portofolio.published + '</span>' +
                '</div></div></div></div>';
        }
    });
    </script>
    @endpush
</x-apps-front-layouts>