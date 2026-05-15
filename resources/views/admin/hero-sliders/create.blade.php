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
                    <a href="{{ route('admin.hero-sliders.index') }}">
                        Hero Slider
                    </a>
                </li>

                <li class="breadcrumb-item active">
                    Add Slide
                </li>

            </ol>

        </div>

        <div class="card shadow-sm">

            <div class="card-header">
                <strong>Add Hero Slide</strong>
            </div>

            <div class="card-body">

                @if ($errors->any())

                    <div class="alert alert-danger">

                        <ul class="mb-0">

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                <form id="sliderForm" method="POST" enctype="multipart/form-data"
                    action="{{ route('admin.hero-sliders.store') }}">

                    @csrf

                    <div class="form-group">

                        <label>
                            Subtitle
                        </label>

                        <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle') }}">

                    </div>

                    <div class="form-group mt-3">

                        <label>
                            Heading *
                        </label>

                        <input type="text" name="heading" class="form-control" value="{{ old('heading') }}" required>

                    </div>

                    <div class="form-group mt-3">

                        <label>
                            Description
                        </label>

                        <textarea name="description" rows="5" class="form-control">{{ old('description') }}</textarea>

                    </div>

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group mt-3">

                                <label>
                                    Button Text
                                </label>

                                <input type="text" name="button_text" class="form-control"
                                    value="{{ old('button_text') }}">

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group mt-3">

                                <label>
                                    Button Link
                                </label>

                                <input type="text" name="button_link" class="form-control"
                                    value="{{ old('button_link') }}">

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group mt-3">

                                <label>
                                    Sort Order
                                </label>

                                <input type="number" name="sort_order" class="form-control"
                                    value="{{ old('sort_order', 0) }}">

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group mt-3">

                                <label>
                                    Background Image *
                                </label>

                                <input type="file" name="image" required class="form-control">

                            </div>

                        </div>

                    </div>

                    <div class="form-group mt-3">

                        <div class="custom-control custom-checkbox">

                            <input type="checkbox" name="status" id="status" value="1" class="custom-control-input"
                                checked>

                            <label class="custom-control-label" for="status">
                                Active
                            </label>

                        </div>

                    </div>

                    <div class="mt-4">

                        <button type="submit" id="saveBtn" class="btn btn-success">

                            <i class="fa-solid fa-save"></i>
                            Save

                        </button>

                        <a href="{{ route('admin.hero-sliders.index') }}" class="btn btn-secondary">

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

    document.getElementById('sliderForm').addEventListener('submit', function () {

        let btn = document.getElementById('saveBtn');

        btn.disabled = true;

        btn.innerHTML =
            '<i class="fa fa-spinner fa-spin"></i> Saving...';

    });

</script>