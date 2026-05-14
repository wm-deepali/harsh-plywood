{{-- resources/views/admin/galleries/create.blade.php --}}

@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        <div class="breadcrumbs-top bg-light mb-3">

            <ol class="breadcrumb mb-0">

                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">
                        Dashboard
                    </a>
                </li>

                <li class="breadcrumb-item">
                    <a href="{{ route('admin.galleries.index') }}">
                        Gallery
                    </a>
                </li>

                <li class="breadcrumb-item active">
                    Add Image
                </li>

            </ol>

        </div>

        <div class="card shadow-sm">

            <div class="card-header">
                <strong>Add Gallery Image</strong>
            </div>

            <div class="card-body">

                {{-- Validation Errors --}}
                @if ($errors->any())

                    <div class="alert alert-danger">

                        <ul class="mb-0">

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                <form id="galleryForm"
                      method="POST"
                      enctype="multipart/form-data"
                      action="{{ route('admin.galleries.store') }}">

                    @csrf

                    {{-- Title --}}
                    <div class="form-group">

                        <label>Title (Optional)</label>

                        <input type="text"
                               name="title"
                               class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title') }}">

                        @error('title')

                            <span class="text-danger">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>

                    {{-- Image --}}
                    <div class="form-group mt-3">

                        <label>Image *</label>

                        <input type="file"
                               name="image"
                               required
                               class="form-control @error('image') is-invalid @enderror">

                        @error('image')

                            <span class="text-danger">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>

                    {{-- Status --}}
                    <div class="form-group mt-3">

                        <div class="custom-control custom-checkbox">

                            <input type="checkbox"
                                   name="status"
                                   id="status"
                                   value="1"
                                   class="custom-control-input"
                                   {{ old('status', 1) ? 'checked' : '' }}>

                            <label class="custom-control-label" for="status">
                                Active
                            </label>

                        </div>

                    </div>

                    {{-- Buttons --}}
                    <div class="mt-4">

                        <button type="submit"
                                id="saveBtn"
                                class="btn btn-success">

                            <i class="fa-solid fa-save"></i>
                            Save

                        </button>

                        <a href="{{ route('admin.galleries.index') }}"
                           class="btn btn-secondary">

                            Cancel

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')

<script>

    document.getElementById('galleryForm').addEventListener('submit', function () {

        let btn = document.getElementById('saveBtn');

        btn.disabled = true;

        btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saving...';

    });

</script>