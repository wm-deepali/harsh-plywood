@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        <div class="card shadow-sm">

            <div class="card-header">
                <strong>Add HRB Brand</strong>
            </div>

            <div class="card-body">

                <form method="POST"
                    enctype="multipart/form-data"
                    action="{{ route('admin.hrb-brands.store') }}">

                    @csrf

                    @if ($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <div class="form-group">

                        <label>Brand Name</label>

                        <input type="text"
                            name="brand_name"
                            class="form-control"
                            value="{{ old('brand_name') }}">

                        @error('brand_name')

                            <small class="text-danger">
                                {{ $message }}
                            </small>

                        @enderror

                    </div>

                    <div class="form-group mt-3">

                        <label>Brand Logo</label>

                        <input type="file"
                            name="brand_logo"
                            class="form-control">

                        <small class="text-muted">
                            Allowed: JPG, JPEG, PNG, WEBP | Max Size: 2 MB
                        </small>

                        @error('brand_logo')

                            <br>

                            <small class="text-danger">
                                {{ $message }}
                            </small>

                        @enderror

                    </div>

                    <div class="form-group mt-3">

                        <div class="custom-control custom-checkbox">

                            <input type="checkbox"
                                name="status"
                                id="status"
                                class="custom-control-input"
                                {{ old('status', 1) ? 'checked' : '' }}>

                            <label class="custom-control-label"
                                for="status">

                                Active

                            </label>

                        </div>

                    </div>

                    <div class="mt-4">

                        <button type="submit"
                            class="btn btn-success">

                            Save Brand

                        </button>

                        <a href="{{ route('admin.hrb-brands.index') }}"
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