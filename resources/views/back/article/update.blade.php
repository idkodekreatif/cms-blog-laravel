ij<x-apps-layouts title="Article - Update">
    @push('styles')
    @endpush
    <!-- End Navbar -->
    <div class="container-fluid py-4">

        @if ($errors->any())
        <div class="my-3">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Update Article</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('articles.update', $article->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" class="form-control" id="title"
                                            value="{{ old('title', $article->title) }}" placeholder="Title.."
                                            autocomplete="title">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="Categories" class="form-label">Categories</label>
                                        <select class="form-select" id="Categories" name="categories_id"
                                            aria-label="Default select categories_id">
                                            @foreach ($categories as $category)
                                            @if ($category->id == $article->categories_id)
                                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                            @else
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="description" id="description"
                                    rows="3">{{ old('description', $article->description) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image Max: 2Mb</label>
                                <div class="position-relative" style="width: 20rem;">
                                    @if ($article->img)
                                    <a href="{{ asset('storage/back/img/' . $article->img) }}" target="_blank"
                                        rel="noopener noopener">
                                        <img src="{{ asset('storage/back/img/' . $article->img) }}" width="100%"
                                            alt="{{ $article->img }}">
                                    </a>
                                    @else
                                    No image available
                                    @endif
                                </div>
                                <input type="file" name="img" class="form-control" id="image">
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" name="status" aria-label="Default select status">
                                        <option value="0" {{ $article->status == 0 ? 'selected' : null }}>Private
                                        </option>
                                        <option value="1" {{ $article->status == 1 ? 'selected' : null }}>Published
                                        </option>
                                    </select>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="Published" class="form-label">Published</label>
                                        <input type="date" name="published" class="form-control" id="published"
                                            value="{{ old('published', $article->published) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="float-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @push('scripts')
        @endpush
</x-apps-layouts>