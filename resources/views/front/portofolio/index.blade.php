<x-apps-front-layouts title="Kode Kreatif | Portofolios">
    @push('styles')
    <style>
        .category-tabs {
            text-align: center;
            /* Membuat tombol berada di tengah */
        }

        .category-tabs .tab-button {
            margin: 5px;
            color: #3b5d50;
            background-color: rgb(255, 255, 255);
            border-color: #3b5d50;
            padding: 6px 20px;
            /* Padding horizontal lebih lebar untuk efek oval */
            font-size: 14px;
            border-radius: 50rem;
            /* Membuat bentuk seperti pil */
        }

        .category-tabs .tab-button:hover {
            background-color: #3b5d50;
            /* Warna latar belakang hijau saat dihover */
            color: #fff;
            /* Warna teks menjadi putih saat dihover */
        }

        .portofolio-container {
            display: flex;
            flex-wrap: wrap;
        }

        .portofolio-item {
            flex: 0 0 calc(33.33% - 20px);
            margin: 10px;
        }

        .portofolio-item .post-entry {
            height: 100%;
        }

        .portofolio-item {
            padding: 15px;
            background-color: #fff;
            border-radius: 8px;
        }

        /* .portofolio-item .post-content-entry {
            padding: 15px;
            background-color: #fff;
            border-radius: 8px;
        } */

        .portofolio-item .post-content-entry h3 a {
            color: #333;
        }

        .portofolio-item .card-text {
            height: 60px;
            overflow: hidden;
        }

        .portofolio-item .meta {
            margin-top: 15px;
            font-size: 14px;
            color: #777;
        }
    </style>
    @endpush
    <div class="blog-section">
        <div class="container">
            <div class="category-tabs">
                <button class="btn btn-outline-primary btn-sm tab-button" data-id="all">All</button>
                @foreach ($categories as $category)
                <button class="btn btn-outline-primary btn-sm tab-button" data-id="{{ $category->id }}">{{
                    $category->name
                    }}</button>
                @endforeach
            </div>
            <div class="portofolio-container row">
                @forelse ($portofolios as $portofolio )
                <div class="portofolio-item col-12 col-sm-6 col-md-4 mb-5">
                    <div class="post-entry">
                        <a href="{{ url('portofolio/'.$portofolio->slug) }}" class="post-thumbnail">
                            <img src="{{ asset('storage/back/img/portofolio/'. $portofolio->img) }}" alt="Image"
                                class="img-fluid">
                        </a>
                        <div class="post-content-entry">
                            <h3><a href="{{ url('portofolio/'.$portofolio->slug) }}">{{ $portofolio->title }}</a>
                            </h3>
                            <p class="card-text">
                                {!! Str::limit(strip_tags($portofolio->description), 100, '...') !!}
                            </p>
                            <div class="meta">
                                <span>by <a href="#">{{ $portofolio->user->name }}</a></span>
                                <span>on {{ \Carbon\Carbon::parse($portofolio->created_at)->format('M d, Y') }}</span>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
        $('.tab-button').click(function() {
            var categoryId = $(this).data('id');
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
                    html += '<div class="portofolio-item col-12 col-sm-6 col-md-4 mb-5">' +
                        '<div class="post-entry">' +
                        '<a href="/portofolio/' + portofolio.slug + '" class="post-thumbnail">' +
                        '<img src="/storage/back/img/portofolio/' + portofolio.img + '" alt="Image" class="img-fluid"></a>' +
                        '<div class="post-content-entry">' +
                        '<h3><a href="/portofolio/' + portofolio.slug + '">' + portofolio.title + '</a></h3>' +
                        '<p class="card-text">' +
                        portofolio.description.substring(0, 100) + '...</p>' +
                        '<div class="meta">' +
                        '<span>by <a href="#">' + portofolio.user.name + '</a></span>' +
                        '<span>on ' + portofolio.published + '</span>' +
                        '</div></div></div></div>';
                });
            } else {
                html = '<div class="col-12"><h3>No Portfolios Found</h3></div>';
            }
            $('.portofolio-container').html(html);
        }
    });
    </script>
    @endpush
</x-apps-front-layouts>