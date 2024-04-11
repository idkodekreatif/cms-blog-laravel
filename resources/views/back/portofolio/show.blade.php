<x-apps-layouts
    title="{{ isset($portofolio->title) ? 'Kode Kreatif | ' . $portofolio->title : 'Kode Kreatif | show' }}">
    @push('styles')
    @endpush
    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Show portofolio</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                        value="{{ $portofolio->title }}" @disabled(true)>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="Categories" class="form-label">Categories</label>
                                    <select class="form-select" id="Categories" name="categories_id"
                                        aria-label="Default select categories_id" @disabled(true)>
                                        <option value="" hidden>{{ $portofolio->categories->name }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="description" id="description" rows="3"
                                @disabled(true)>{!! $portofolio->description !!}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label for="image" class="form-label">Image</label>
                                <div class="position-relative" style="width: 20rem;">
                                    @if ($portofolio->img)
                                    <a href="{{ asset('storage/back/img/portofolio/' . $portofolio->img) }}"
                                        target="_blank" rel="noopener noopener">
                                        <img src="{{ asset('storage/back/img/portofolio/' . $portofolio->img) }}"
                                            width="100%" alt="{{ $portofolio->img }}">
                                    </a>
                                    @else
                                    No image available
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="views" class="form-label">Views</label>
                                <input type="text" name="views" class="form-control" id="views" disabled
                                    value="{{ $portofolio->views }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status" aria-label="Default select status"
                                    @disabled(true)>
                                    @if ($portofolio->status == 1)
                                    <option>Published</option>
                                    @else
                                    <option>Private</option>
                                    @endif
                                </select>
                            </div>

                            <div class="col-6">
                                <label for="Published" class="form-label">Published</label>
                                <input type="date" name="published" class="form-control" id="published" @disabled(true)
                                    value="{{ $portofolio->published }}">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a class="btn btn-primary m-4" href="{{ route('portofolio.index') }}">Back</a>
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