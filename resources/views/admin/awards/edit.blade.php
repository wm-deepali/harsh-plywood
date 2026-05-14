{{-- resources/views/admin/awards/edit.blade.php --}}

@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">

            <div class="breadcrumb-wrapper">

                <ol class="breadcrumb bg-transparent mb-0">

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.awards.index') }}">Manage Awards</a>
                    </li>

                    <li class="breadcrumb-item active">
                        Edit Award
                    </li>

                </ol>

            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Edit Award</strong>
                </div>

                <div class="card-body">

                    <form id="awardForm"
                        method="POST"
                        enctype="multipart/form-data"
                        action="{{ route('admin.awards.update', $award->id) }}">

                        @csrf
                        @method('PUT')

                        {{-- Title --}}
                        <div class="form-group">

                            <label>Title</label>

                            <input type="text"
                                name="title"
                                class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title', $award->title) }}"
                                placeholder="Enter title">

                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>

                        {{-- Image --}}
                        <div class="form-group mt-3">

                            <label>Image</label>

                            <input type="file"
                                name="image"
                                id="image"
                                class="form-control @error('image') is-invalid @enderror">

                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            {{-- Old Image --}}
                            @if($award->image)

                                <div class="mt-3" id="oldImage">

                                    <img src="{{ asset('storage/'.$award->image) }}"
                                        width="100"
                                        class="border p-1 rounded">

                                </div>

                            @endif

                            {{-- Preview --}}
                            <div class="mt-2" id="preview"></div>

                        </div>

                        {{-- Status --}}
                        <div class="form-group mt-3">

                            <div class="custom-control custom-checkbox">

                                <input type="checkbox"
                                    name="status"
                                    id="status"
                                    class="custom-control-input"
                                    {{ old('status', $award->status) ? 'checked' : '' }}>

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
                                Update Award

                            </button>

                            <a href="{{ route('admin.awards.index') }}"
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

        let oldImage = document.getElementById('oldImage');

        if(oldImage){
            oldImage.style.display = 'none';
        }

    };

    reader.readAsDataURL(file);

});


// prevent double submit
document.getElementById('awardForm').addEventListener('submit', function () {

    let btn = document.getElementById('saveBtn');

    btn.disabled = true;

    btn.innerHTML =
        '<i class="fa fa-spinner fa-spin"></i> Updating...';

});

</script>