<x-apps-layouts title="Categories">
    @push('styles')
    @endpush
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6>Categories table</h6>
                        </div>
                        <div class="col-6 text-end">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#categoriesCreate">
                                Add new
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        No
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Name</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Slug</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Created at</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <p class="text-xs text-secondary font-weight-bold mb-0">{{
                                                    $loop->iteration }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $category->name }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs text-secondary mb-0">{{ $category->slug }}</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $category->created_at
                                            }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="font-weight-bold text-xs btn btn-warning btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#categoriesUpdate{{ $category->id }}">
                                            Update
                                        </button>

                                        <form action="{{ route('categories.destroy', $category->id) }}" method="post"
                                            style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="font-weight-bold text-xs btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this category {{ $category->name }}?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include the modal component -->
    <x-categories-create-modal />

    <x-categories-update-modal :categories="$categories" />

    @push('scripts')
    @endpush
</x-apps-layouts>