{{-- resources/views/admin/brands/create.blade.php --}}

@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">

            <div class="breadcrumb-wrapper">

                <ol class="breadcrumb bg-transparent mb-0">

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.brands.index') }}">
                            Manage Brands
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Add Brand
                    </li>

                </ol>

            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Add Brand</strong>
                </div>

                <div class="card-body">

                    <form id="brandForm"
                        method="POST"
                        enctype="multipart/form-data"
                        action="{{ route('admin.brands.store') }}">

                        @csrf

                        {{-- Brand Name --}}
                        <div class="form-group">

                            <label>Brand Name *</label>

                            <input type="text"
                                name="brand_name"
                                class="form-control @error('brand_name') is-invalid @enderror"
                                value="{{ old('brand_name') }}"
                                placeholder="Enter Brand Name">

                            @error('brand_name')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                        {{-- Image --}}
                        <div class="form-group mt-3">

                            <label>Brand Image *</label>

                            <input type="file"
                                name="image"
                                id="image"
                                class="form-control @error('image') is-invalid @enderror"
                                required>

                            @error('image')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                            {{-- Preview --}}
                            <div class="mt-3" id="preview"></div>

                        </div>

                        {{-- Show Home --}}
                        <div class="form-group mt-3">

                            <div class="custom-control custom-checkbox">

                                <input type="checkbox"
                                    name="show_home"
                                    id="show_home"
                                    class="custom-control-input"
                                    {{ old('show_home') ? 'checked' : '' }}>

                                <label class="custom-control-label"
                                    for="show_home">

                                    Show On Home Page

                                </label>

                            </div>

                        </div>

                        {{-- Show Brand Page --}}
                        <div class="form-group mt-2">

                            <div class="custom-control custom-checkbox">

                                <input type="checkbox"
                                    name="show_brand_page"
                                    id="show_brand_page"
                                    class="custom-control-input"
                                    checked>

                                <label class="custom-control-label"
                                    for="show_brand_page">

                                    Show On Brand Page

                                </label>

                            </div>

                        </div>

                        {{-- Status --}}
                        <div class="form-group mt-2">

                            <div class="custom-control custom-checkbox">

                                <input type="checkbox"
                                    name="status"
                                    id="status"
                                    class="custom-control-input"
                                    checked>

                                <label class="custom-control-label"
                                    for="status">

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
                                Save Brand

                            </button>

                            <a href="{{ route('admin.brands.index') }}"
                                class="btn btn-secondary">

                                Cancel

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')

<script>

document.getElementById('image').addEventListener('change', function () {

    let file = this.files[0];

    if (!file) return;

    let reader = new FileReader();

    reader.onload = function (e) {

        document.getElementById('preview').innerHTML =
            `<img src="${e.target.result}" width="100" class="border p-1 rounded">`;

    };

    reader.readAsDataURL(file);

});


// prevent double submit
document.getElementById('brandForm').addEventListener('submit', function () {

    let btn = document.getElementById('saveBtn');

    btn.disabled = true;

    btn.innerHTML =
        '<i class="fa fa-spinner fa-spin"></i> Saving...';

});

</script>