{{-- resources/views/admin/teams/edit.blade.php --}}

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
                        <a href="{{ route('admin.teams.index') }}">
                            Manage Team
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Edit Team Member
                    </li>

                </ol>

            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Edit Team Member</strong>
                </div>

                <div class="card-body">

                    <form id="teamForm"
                        method="POST"
                        enctype="multipart/form-data"
                        action="{{ route('admin.teams.update', $team->id) }}">

                        @csrf
                        @method('PUT')

                        {{-- Name --}}
                        <div class="form-group">

                            <label>Name *</label>

                            <input type="text"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $team->name) }}">

                            @error('name')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                        {{-- Designation --}}
                        <div class="form-group mt-3">

                            <label>Designation</label>

                            <input type="text"
                                name="designation"
                                class="form-control"
                                value="{{ old('designation', $team->designation) }}">

                        </div>

                        {{-- Short Content --}}
                        <div class="form-group mt-3">

                            <label>Short Content</label>

                            <textarea name="short_content"
                                rows="4"
                                class="form-control">{{ old('short_content', $team->short_content) }}</textarea>

                        </div>

                        {{-- Facebook --}}
                        <div class="form-group mt-3">

                            <label>Facebook Link</label>

                            <input type="url"
                                name="facebook"
                                class="form-control"
                                value="{{ old('facebook', $team->facebook) }}">

                        </div>

                        {{-- Linkedin --}}
                        <div class="form-group mt-3">

                            <label>Linkedin Link</label>

                            <input type="url"
                                name="linkedin"
                                class="form-control"
                                value="{{ old('linkedin', $team->linkedin) }}">

                        </div>

                        {{-- Twitter --}}
                        <div class="form-group mt-3">

                            <label>Twitter Link</label>

                            <input type="url"
                                name="twitter"
                                class="form-control"
                                value="{{ old('twitter', $team->twitter) }}">

                        </div>

                        {{-- Instagram --}}
                        <div class="form-group mt-3">

                            <label>Instagram Link</label>

                            <input type="url"
                                name="instagram"
                                class="form-control"
                                value="{{ old('instagram', $team->instagram) }}">

                        </div>

                        {{-- Youtube --}}
                        <div class="form-group mt-3">

                            <label>Youtube Link</label>

                            <input type="url"
                                name="youtube"
                                class="form-control"
                                value="{{ old('youtube', $team->youtube) }}">

                        </div>

                        {{-- Image --}}
                        <div class="form-group mt-3">

                            <label>Image</label>

                            <input type="file"
                                name="image"
                                id="image"
                                class="form-control">

                            {{-- Old Image --}}
                            @if($team->image)

                                <div class="mt-3" id="oldImage">

                                    <img src="{{ asset('storage/'.$team->image) }}"
                                        width="100"
                                        class="border p-1 rounded">

                                </div>

                            @endif

                            {{-- Preview --}}
                            <div class="mt-3" id="preview"></div>

                        </div>

                        {{-- Status --}}
                        <div class="form-group mt-3">

                            <div class="custom-control custom-checkbox">

                                <input type="checkbox"
                                    name="status"
                                    id="status"
                                    class="custom-control-input"
                                    {{ old('status', $team->status) ? 'checked' : '' }}>

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
                                Update Team Member

                            </button>

                            <a href="{{ route('admin.teams.index') }}"
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
document.getElementById('teamForm').addEventListener('submit', function () {

    let btn = document.getElementById('saveBtn');

    btn.disabled = true;

    btn.innerHTML =
        '<i class="fa fa-spinner fa-spin"></i> Updating...';

});

</script>