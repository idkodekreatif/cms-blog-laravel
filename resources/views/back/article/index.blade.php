<x-apps-layouts title="Article">
    @push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    @endpush
    <div class="card p-4 shadow">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <h6>Articles table</h6>
                </div>
                <div class="col-6 text-end">
                    <!-- Button trigger modal -->
                    <a href="{{ route('articles.create') }}" class="btn btn-outline-primary">
                        Add new
                    </a>
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

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @push('scripts')
    {{-- Datatables --}}
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    {{-- Datatables Ajax --}}
    <script>
        $(document).ready(function() {
           $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url()->current() }}',
                columns: [
                    {
                        'data': 'DT_RowIndex',
                        'name': 'DT_RowIndex',
                    },
                    {
                        'data': 'title',
                        'name': 'title',
                    },
                    {
                        'data': 'categories_id',
                        'name': 'categories_id',
                    },
                    {
                        'data': 'views',
                        'name': 'views',
                    },
                    {
                        'data': 'status',
                        'name': 'status',
                    },
                    {
                        'data': 'published',
                        'name': 'published',
                    },
                    {
                        'data': 'button',
                        'name': 'button',
                    },
                ]
            });
        });
    </script>
    @endpush
</x-apps-layouts>