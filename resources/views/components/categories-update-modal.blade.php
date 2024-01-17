@foreach ($categories as $category)
<!-- Modal -->
<div class="modal-dialog">
    <div class="modal fade" id="categories{{ $category->id }}" tabindex="-1" aria-labelledby="categories"
        aria-hidden="true">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="categories">update New Categories</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('categories.store', ['categories' => $category->id]) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="mb-1">
                        <label for="Name" class="form-label">Name</label>

                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="Name" placeholder="name" autofocus autocomplete="name"
                            value="{{ old('name', $category->name) }}">
                        @error('name')

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