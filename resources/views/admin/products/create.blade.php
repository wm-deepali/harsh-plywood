{{-- resources/views/admin/products/create.blade.php --}}

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
                        <a href="{{ route('admin.products.index') }}">
                            Manage Products
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Add Product
                    </li>

                </ol>

            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Add Product</strong>
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

                    <form id="productForm"
                          method="POST"
                          enctype="multipart/form-data"
                          action="{{ route('admin.products.store') }}">

                        @csrf

                        {{-- Category --}}
                        <div class="form-group">

                            <label>Category *</label>

                            <select name="category_id"
                                    class="form-control @error('category_id') is-invalid @enderror"
                                    required>

                                <option value="">
                                    Select Category
                                </option>

                                @foreach($categories as $c)

                                    <option value="{{ $c->id }}"
                                        {{ old('category_id') == $c->id ? 'selected' : '' }}>

                                        {{ $c->name }}

                                    </option>

                                @endforeach

                            </select>

                            @error('category_id')

                                <span class="text-danger">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>

                        {{-- Product Name --}}
                        <div class="form-group mt-3">

                            <label>Product Name *</label>

                            <input type="text"
                                   name="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}"
                                   required>

                            @error('name')

                                <span class="text-danger">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>

                        {{-- Product Info --}}
                        <div class="form-group mt-3">

                            <label>Product Info</label>

                            <textarea name="product_info"
                                      class="form-control @error('product_info') is-invalid @enderror"
                                      rows="4">{{ old('product_info') }}</textarea>

                            @error('product_info')

                                <span class="text-danger">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>

                        {{-- Product Images --}}
                        <div class="form-group mt-3">

                            <label>Product Images</label>

                            {{-- Upload Box --}}
                            <div class="upload-box text-center p-4 border rounded position-relative bg-light">

                                <input type="file"
                                       id="images"
                                       name="images[]"
                                       multiple
                                       accept="image/*"
                                       class="d-none">

                                <div id="uploadTrigger" style="cursor:pointer;">

                                    <i class="fa fa-cloud-upload fa-3x text-primary"></i>

                                    <h5 class="mt-2 mb-1">
                                        Upload Product Images
                                    </h5>

                                    <p class="text-muted mb-0">
                                        Click here to select images
                                    </p>

                                </div>

                            </div>

                            @error('images.*')

                                <span class="text-danger d-block mt-2">
                                    {{ $message }}
                                </span>

                            @enderror

                            {{-- Preview Area --}}
                            <div id="previewContainer"
                                 class="d-flex flex-wrap mt-3"></div>

                        </div>

                        {{-- Status --}}
                        <div class="form-group mt-3">

                            <div class="custom-control custom-checkbox">

                                <input type="checkbox"
                                       name="status"
                                       id="status"
                                       class="custom-control-input"
                                       checked>

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

                                <i class="fa fa-save"></i>
                                Save Product

                            </button>

                            <a href="{{ route('admin.products.index') }}"
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

    // Prevent Double Submit
    document.getElementById('productForm').addEventListener('submit', function () {

        let btn = document.getElementById('saveBtn');

        btn.disabled = true;

        btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saving...';

    });

    let selectedFiles = [];

    const imageInput = document.getElementById('images');

    const previewContainer = document.getElementById('previewContainer');

    const uploadTrigger = document.getElementById('uploadTrigger');

    // Open file picker
    uploadTrigger.addEventListener('click', function () {

        imageInput.click();

    });

    // Add images
    imageInput.addEventListener('change', function (e) {

        let newFiles = Array.from(e.target.files);

        newFiles.forEach(file => {

            selectedFiles.push(file);

        });

        renderPreviews();

    });

    // Render previews
    function renderPreviews() {

        previewContainer.innerHTML = '';

        let dt = new DataTransfer();

        selectedFiles.forEach((file, index) => {

            dt.items.add(file);

            let reader = new FileReader();

            reader.onload = function (e) {

                let box = document.createElement('div');

                box.classList.add(
                    'position-relative',
                    'mr-2',
                    'mb-2'
                );

                box.innerHTML = `
                    <img src="${e.target.result}"
                         class="border rounded"
                         style="
                            width:100px;
                            height:100px;
                            object-fit:cover;
                         ">

                    <button type="button"
                            onclick="removeImage(${index})"
                            class="btn btn-danger btn-sm"
                            style="
                                position:absolute;
                                top:-8px;
                                right:-8px;
                                border-radius:50%;
                                width:24px;
                                height:24px;
                                padding:0;
                                line-height:22px;
                            ">
                        ×
                    </button>
                `;

                previewContainer.appendChild(box);

            };

            reader.readAsDataURL(file);

        });

        imageInput.files = dt.files;

    }

    // Remove image
    function removeImage(index) {

        selectedFiles.splice(index, 1);

        renderPreviews();

    }

</script>