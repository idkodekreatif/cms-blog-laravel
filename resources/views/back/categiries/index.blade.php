<x-apps-layouts title="Categories">
    @push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    @endpush
    <div class="card p-4 shadow">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <h6>Categories Table</h6>
                </div>
                <div class="col-6 text-end">
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                        data-bs-target="#categoriesCreate">
                        Add New
                    </button>
                </div>
            </div>

            <div class="table-responsive p-0 mt-3">
                <table class="table align-items-center mb-0" id="datatable">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Slug
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Created
                                at</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <p class="text-xs text-secondary font-weight-bold mb-0">{{ $loop->iteration }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $category->name }}</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <p class="text-xs text-secondary mb-0">{{ $category->slug }}</p>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{
                                    \Carbon\Carbon::parse($category->created_at)->format('M d, Y')
                                    }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <a href="#" class="text-warning font-weight-bold text-xs" data-bs-toggle="modal"
                                    data-bs-target="#categoriesUpdate{{ $category->id }}">
                                    update
                                </a>

                                <a href="{{route('categories.destroy', ['id' => $category->id])}}"
                                    class="text-danger font-weight-bold text-xs" style="margin-left: 5px;">
                                    delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Include the modal components -->
    <x-categories-create-modal />
    <x-categories-update-modal :categories="$categories" />

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