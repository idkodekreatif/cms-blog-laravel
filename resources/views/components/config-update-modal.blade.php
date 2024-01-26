<!-- Modal -->
@foreach ($configs as $config)
<div class="modal fade" id="configurationUpdate{{ $config->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="configurationUpdateLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="configurationUpdateLabel">Update Configuration</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('config.update', ['config' => $config->id]) }}" method="post">
                <div class="modal-body">
                    @csrf
                    @method('PUT')

                    <div class="mb-1">
                        <label for="Name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="Name" value="{{ old('name', $config->name) }}" readonly>

                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-1">
                        <label for="value" class="form-label">Value</label>
                        <textarea name="value" class="form-control @error('name') is-invalid @enderror" id="value"
                            cols="30" rows="10">{{ old('name', $config->value) }}</textarea>

                        @error('value')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach