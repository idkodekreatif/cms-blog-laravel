<!-- Modal -->
@foreach ($contactAs as $contacts)
<div class="modal fade" id="contactAs{{ $contacts->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="contactAsLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="contactAsLabel">Contact As</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="Name" class="form-label">Name</label>
                    <input type="text"  class="form-control" id="Name"
                        value="{{ $contacts->first_name }} {{ $contacts->last_name }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">email</label>
                    <input type="text" class="form-control" id="email"
                        value="{{ $contacts->email }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="value" class="form-label">Description</label>
                    <textarea class="form-control" id="value"
                        cols="30" rows="10">{{ $contacts->description }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
