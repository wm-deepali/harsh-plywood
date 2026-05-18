@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        <div class="card shadow-sm">

            <div class="card-header">
                <strong>Add Offer</strong>
            </div>

            <div class="card-body">

                <form method="POST"
                    enctype="multipart/form-data"
                    action="{{ route('admin.hrb-offers.store') }}">

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

                        <label>Title</label>

                        <input type="text"
                            name="title"
                            class="form-control"
                            value="{{ old('title') }}">

                        @error('title')

                            <small class="text-danger">
                                {{ $message }}
                            </small>

                        @enderror

                    </div>

                    <div class="form-group mt-3">

                        <label>Short Content</label>

                        <textarea name="short_content"
                            rows="5"
                            class="form-control">{{ old('short_content') }}</textarea>

                        @error('short_content')

                            <small class="text-danger">
                                {{ $message }}
                            </small>

                        @enderror

                    </div>

                    <div class="form-group mt-3">

                        <label>Icon Class</label>

                        <input type="text"
                            name="icon"
                            class="form-control"
                            placeholder="fa fa-home"
                            value="{{ old('icon') }}">

                        @error('icon')

                            <small class="text-danger">
                                {{ $message }}
                            </small>

                        @enderror

                    </div>

                    <div class="form-group mt-3">

                        <label>Image</label>

                        <input type="file"
                            name="image"
                            class="form-control">

                             <small class="text-muted">
                                Allowed: JPG, JPEG, PNG, WEBP | Max Size: 2 MB
                            </small>
                            
                        @error('image')

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

                            Save Offer

                        </button>

                        <a href="{{ route('admin.hrb-offers.index') }}"
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