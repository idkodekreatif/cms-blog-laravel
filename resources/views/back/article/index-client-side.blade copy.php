<x-apps-layouts title="Article">
    @push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    @endpush
    <div class="row">
        <div class="col-6 d-flex align-items-center">
            <h6>Categories table</h6>
        </div>
        <div class="col-6 text-end">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                data-bs-target="#categoriesCreate">
                Add new
            </button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table align-items-center mb-0" id="datatable">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        No
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Title</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Categories</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Views</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Status</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Publish Date</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                                <p class="text-xs text-secondary font-weight-bold mb-0">{{
                                    $loop->iteration }}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $article->title }}</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs text-secondary mb-0">{{ $article->categories->name }}</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs text-secondary mb-0">{{ $article->views }}x</p>
                    </td>
                    <td class="align-middle text-center">
                        @if ($article->status == 0)
                        <span class="badge badge-sm bg-gradient-secondary">Private</span>
                        @else
                        <span class="badge badge-sm bg-gradient-success">Published</span>
                        @endif
                    </td>
                    <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $article->published
                            }}</span>
                    </td>
                    <td class="align-middle text-center">
                        <button type="button" class="font-weight-bold text-xs btn btn-secondary btn-sm"
                            data-bs-toggle="modal" data-bs-target="#categoriesUpdate{{ $article->id }}">
                            Show
                        </button>
                        <!-- Button trigger modal -->
                        <button type="button" class="font-weight-bold text-xs btn btn-warning btn-sm"
                            data-bs-toggle="modal" data-bs-target="#categoriesUpdate{{ $article->id }}">
                            Update
                        </button>

                        <form action="{{ route('categories.destroy', $article->id) }}" method="post"
                            style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-weight-bold text-xs btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this article {{ $article->name }}?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
                $('#datatable').DataTable({
                    "order": [], // You can specify default sorting here if needed
                    "columnDefs": [{
                        "targets": 'no-sort', // Add 'no-sort' class to the th where you don't want sorting
                        "orderable": false,
                    }]
                });
            });
    </script>
    @endpush
</x-apps-layouts>