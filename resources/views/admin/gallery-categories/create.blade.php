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
            <a href="{{ route('admin.gallery-categories.index') }}">
                Gallery Categories
            </a>
        </li>

        <li class="breadcrumb-item active">
            Add Category
        </li>

    </ol>

</div>

<div class="card shadow-sm">

<div class="card-header">
    <strong>Add Gallery Category</strong>
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

<form id="categoryForm"
      method="POST"
      action="{{ route('admin.gallery-categories.store') }}">

    @csrf

    <div class="form-group">

        <label>
            Category Name *
        </label>

        <input type="text"
               name="name"
               class="form-control"
               value="{{ old('name') }}"
               required>

    </div>

    <div class="form-group mt-3">

        <div class="custom-control custom-checkbox">

            <input type="checkbox"
                   name="status"
                   id="status"
                   value="1"
                   class="custom-control-input"
                   checked>

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
            Save

        </button>

        <a href="{{ route('admin.gallery-categories.index') }}"
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

document.getElementById('categoryForm').addEventListener('submit', function () {

    let btn = document.getElementById('saveBtn');

    btn.disabled = true;

    btn.innerHTML =
        '<i class="fa fa-spinner fa-spin"></i> Saving...';

});

</script>