<x-apps-layouts title="Kode Kreatif | Configuration">
    @push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    @endpush
    <div class="container-fluid">
        <div class="card p-4 shadow">
            <table class="table align-configs-center mb-0" id="datatable">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            No
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            Name</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Value</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($configs as $config)
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <p class="text-xs text-secondary mb-0">{{ $loop->iteration }}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">{{ $config->name }}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs text-secondary mb-0">{{ $config->value }}</p>
                        </td>
                        <td class="align-middle">
                            <a type="button" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal"
                                data-bs-target="#configurationUpdate{{ $config->id }}">
                                Edit
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <x-config-update-modal :configs="$configs" />
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