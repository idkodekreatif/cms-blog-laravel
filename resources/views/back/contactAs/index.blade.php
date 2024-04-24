<x-apps-layouts title="Code Creative | Contact As">
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
                            Email</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Description</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contactAs as $contact)
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <p class="text-xs text-secondary mb-0">{{ $loop->iteration }}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">{{ $contact->first_name }}
                                {{ $contact->last_name }}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs text-secondary mb-0">{{ $contact->email }}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs text-secondary mb-0">{!! Str::limit(strip_tags($contact->description),
                                100, '...') !!}</p>
                        </td>
                        <td class="align-middle">
                            <a href="#" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal"
                                data-bs-target="#contactAs{{ $contact->id }}">
                                show
                            </a>
                            <a href="{{ route('contact-as.destroy', ['id' => $contact->id]) }}"
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

    <x-contactas-show-modal :contactAs="$contactAs" />
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
