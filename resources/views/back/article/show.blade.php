<x-apps-layouts title="{{ isset($article->title) ? 'Code Creative | ' . $article->title : 'Code Creative | show' }}">
    @push('styles')
    @endpush
    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Show Article</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                        value="{{ $article->title }}" @disabled(true)>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="Categories" class="form-label">Categories</label>
                                    <select class="form-select" id="Categories" name="categories_id"
                                        aria-label="Default select categories_id" @disabled(true)>
                                        <option value="" hidden>{{ $article->categories->name }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="description" id="description" rows="3"
                                @disabled(true)>{!! $article->description !!}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label for="image" class="form-label">Image</label>
                                <div class="position-relative" style="width: 20rem;">
                                    @if ($article->img)
                                    <a href="{{ asset('storage/back/img/articles/' . $article->img) }}" target="_blank"
                                        rel="noopener noopener">
                                        <img src="{{ asset('storage/back/img/articles/' . $article->img) }}"
                                            width="100%" alt="{{ $article->img }}">
                                    </a>
                                    @else
                                    No image available
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="views" class="form-label">Views</label>
                                <input type="text" name="views" class="form-control" id="views" disabled
                                    value="{{ $article->views }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status" aria-label="Default select status"
                                    @disabled(true)>
                                    @if ($article->status == 1)
                                    <option>Published</option>
                                    @else
                                    <option>Private</option>
                                    @endif
                                </select>
                            </div>

                            <div class="col-6">
                                <label for="Published" class="form-label">Published</label>
                                <input type="date" name="published" class="form-control" id="published" @disabled(true)
                                    value="{{ $article->published }}">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a class="btn btn-primary m-4" href="{{ route('articles.index') }}">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>
        var options = {
                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
                    clipboard_handleImage: false,
                }

                CKEDITOR.replace( 'description', options );
    </script>
    @endpush
</x-apps-layouts>
