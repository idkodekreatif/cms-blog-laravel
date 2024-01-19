<x-apps-layouts title="Article - Create">
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
                        <h6>Create Article</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" class="form-control" id="title"
                                            value="{{ old('title') }}" placeholder="Title.." autocomplete="title">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="Categories" class="form-label">Categories</label>
                                        <select class="form-select" id="Categories" name="categories_id"
                                            aria-label="Default select categories_id">
                                            <option value="" hidden>Open this select categories</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="description" id="description"
                                    rows="3">{{ old('description') }}</textarea>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="image" class="form-label">Image Max: 2Mb</label>
                                    <input type="file" name="img" class="form-control image" id="image">
                                </div>
                                <div class="col-md-6">
                                    <label for="image" class="form-label">Image Preview</label>
                                    <br>
                                    <img src="" class="img-thumbnail image-preview" id="image-preview" width="50%"
                                        alt="" srcset="">
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" name="status" aria-label="Default select status">
                                        <option selected>Open this select menu</option>
                                        <option value="0">Private</option>
                                        <option value="1">Published</option>
                                    </select>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="Published" class="form-label">Published</label>
                                        <input type="date" name="published" class="form-control" id="published"
                                            value="{{ old('published') }}">
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
        <script>
            $('#image').change(function(){
            previewImages(this);
        });

        function previewImages(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();

                reader.onload = function(e){
                    $('.image-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        </script>
        @endpush
</x-apps-layouts>