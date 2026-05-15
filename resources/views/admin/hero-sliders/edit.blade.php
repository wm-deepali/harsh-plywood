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
            Edit Slide
        </li>

    </ol>

</div>

<div class="card shadow-sm">

<div class="card-header">
    <strong>Edit Hero Slide</strong>
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

<form id="sliderForm"
      method="POST"
      enctype="multipart/form-data"
      action="{{ route('admin.hero-sliders.update', $slider->id) }}">

    @csrf
    @method('PUT')

    <div class="form-group">

        <label>
            Subtitle
        </label>

        <input type="text"
               name="subtitle"
               class="form-control"
               value="{{ old('subtitle', $slider->subtitle) }}">

    </div>

    <div class="form-group mt-3">

        <label>
            Heading *
        </label>

        <input type="text"
               name="heading"
               class="form-control"
               value="{{ old('heading', $slider->heading) }}"
               required>

    </div>

    <div class="form-group mt-3">

        <label>
            Description
        </label>

        <textarea name="description"
                  rows="5"
                  class="form-control">{{ old('description', $slider->description) }}</textarea>

    </div>

    <div class="row">

        <div class="col-md-6">

            <div class="form-group mt-3">

                <label>
                    Button Text
                </label>

                <input type="text"
                       name="button_text"
                       class="form-control"
                       value="{{ old('button_text', $slider->button_text) }}">

            </div>

        </div>

        <div class="col-md-6">

            <div class="form-group mt-3">

                <label>
                    Button Link
                </label>

                <input type="text"
                       name="button_link"
                       class="form-control"
                       value="{{ old('button_link', $slider->button_link) }}">

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-6">

            <div class="form-group mt-3">

                <label>
                    Sort Order
                </label>

                <input type="number"
                       name="sort_order"
                       class="form-control"
                       value="{{ old('sort_order', $slider->sort_order) }}">

            </div>

        </div>

        <div class="col-md-6">

            <div class="form-group mt-3">

                <label>
                    Background Image
                </label>

                <input type="file"
                       name="image"
                       class="form-control">

                @if($slider->image)

                    <div class="mt-3">

                        <img src="{{ asset('storage/' . $slider->image) }}"
                             width="140"
                             class="rounded border">

                    </div>

                @endif

            </div>

        </div>

    </div>

    <div class="form-group mt-3">

        <div class="custom-control custom-checkbox">

            <input type="checkbox"
                   name="status"
                   id="status"
                   value="1"
                   class="custom-control-input"
                   {{ old('status', $slider->status) ? 'checked' : '' }}>

            <label class="custom-control-label" for="status">
                Active
            </label>

        </div>

    </div>

    <div class="mt-4">

        <button type="submit"
                id="saveBtn"
                class="btn btn-success">

            <i class="fa-solid fa-save"></i>
            Update

        </button>

        <a href="{{ route('admin.hero-sliders.index') }}"
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

document.getElementById('sliderForm').addEventListener('submit', function () {

    let btn = document.getElementById('saveBtn');

    btn.disabled = true;

    btn.innerHTML =
        '<i class="fa fa-spinner fa-spin"></i> Updating...';

});

</script>