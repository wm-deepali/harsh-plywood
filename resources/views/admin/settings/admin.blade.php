{{-- resources/views/admin/settings/admin.blade.php --}}

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

                    <li class="breadcrumb-item active">
                        Admin Settings
                    </li>

                </ol>

            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Admin Settings</strong>
                </div>

                <div class="card-body">

                    {{-- Success --}}
                    @if(session('success'))

                        <div class="alert alert-success">

                            {{ session('success') }}

                        </div>

                    @endif

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

                    <form id="adminForm"
                          method="POST"
                          enctype="multipart/form-data"
                          action="{{ route('admin.settings.admin') }}">

                        @csrf

                        {{-- Login Details --}}
                        <h5 class="mb-3">
                            Login Details
                        </h5>

                        <div class="form-group">

                            <label>Admin Login Email *</label>

                            <input type="email"
                                   name="login_email"
                                   class="form-control @error('login_email') is-invalid @enderror"
                                   value="{{ old('login_email', $admin->email ?? '') }}"
                                   required>

                            @error('login_email')

                                <span class="text-danger">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>

                        <div class="form-group mt-3">

                            <label>New Password</label>

                            <input type="password"
                                   name="password"
                                   class="form-control @error('password') is-invalid @enderror">

                            @error('password')

                                <span class="text-danger">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>

                        <div class="form-group mt-3">

                            <label>Confirm Password</label>

                            <input type="password"
                                   name="password_confirmation"
                                   class="form-control">

                        </div>

                        <hr class="mt-4">

                        {{-- Branding --}}
                        <h5 class="mb-3">
                            Branding Settings
                        </h5>

                        {{-- Profile Picture --}}
                        <div class="form-group">

                            <label>Profile Picture</label>

                            <div class="upload-box text-center p-4 border rounded bg-light">

                                <input type="file"
                                       name="profile"
                                       id="profile"
                                       accept="image/*"
                                       class="d-none">

                                <div onclick="document.getElementById('profile').click()"
                                     style="cursor:pointer;">

                                    <i class="fa fa-user-circle fa-3x text-primary"></i>

                                    <h5 class="mt-2 mb-1">
                                        Upload Profile Picture
                                    </h5>

                                    <p class="text-muted mb-0">
                                        Click here to upload image
                                    </p>

                                </div>

                            </div>

                            @error('profile')

                                <span class="text-danger d-block mt-2">
                                    {{ $message }}
                                </span>

                            @enderror

                            <div id="profilePreview" class="mt-3">

                                @if(!empty($data->profile))

                                    <img src="{{ asset('storage/' . $data->profile) }}"
                                         width="100"
                                         height="100"
                                         class="border rounded"
                                         style="object-fit:cover;">

                                @endif

                            </div>

                        </div>

                        {{-- Login Logo --}}
                        <div class="form-group mt-4">

                            <label>Login Page Logo</label>

                            <div class="upload-box text-center p-4 border rounded bg-light">

                                <input type="file"
                                       name="login_logo"
                                       id="login_logo"
                                       accept="image/*"
                                       class="d-none">

                                <div onclick="document.getElementById('login_logo').click()"
                                     style="cursor:pointer;">

                                    <i class="fa fa-image fa-3x text-primary"></i>

                                    <h5 class="mt-2 mb-1">
                                        Upload Login Logo
                                    </h5>

                                    <p class="text-muted mb-0">
                                        Click here to upload logo
                                    </p>

                                </div>

                            </div>

                            @error('login_logo')

                                <span class="text-danger d-block mt-2">
                                    {{ $message }}
                                </span>

                            @enderror

                            <div id="logoPreview" class="mt-3">

                                @if(!empty($data->login_logo))

                                    <img src="{{ asset('storage/' . $data->login_logo) }}"
                                         width="140"
                                         class="border rounded p-1 bg-white">

                                @endif

                            </div>

                        </div>

                        <hr class="mt-4">

                        {{-- Contact --}}
                        <h5 class="mb-3">
                            Contact Settings
                        </h5>

                        <div class="form-group">

                            <label>Email ID For Receiving Enquiries</label>

                            <input type="email"
                                   name="enquiry_email"
                                   class="form-control @error('enquiry_email') is-invalid @enderror"
                                   value="{{ old('enquiry_email', $data->enquiry_email ?? '') }}">

                            @error('enquiry_email')

                                <span class="text-danger">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>

                        {{-- Buttons --}}
                        <div class="mt-4">

                            <button type="submit"
                                    id="saveBtn"
                                    class="btn btn-success">

                                <i class="fa fa-save"></i>
                                Save Settings

                            </button>

                            <a href="{{ route('admin.dashboard') }}"
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

    // Profile Preview
    document.getElementById('profile').addEventListener('change', function () {

        previewImage(this, 'profilePreview');

    });

    // Logo Preview
    document.getElementById('login_logo').addEventListener('change', function () {

        previewImage(this, 'logoPreview');

    });

    // Preview Function
    function previewImage(input, target) {

        let file = input.files[0];

        if (!file) return;

        let reader = new FileReader();

        reader.onload = function (e) {

            document.getElementById(target).innerHTML = `
                <img src="${e.target.result}"
                     width="120"
                     class="border rounded p-1 bg-white">
            `;

        };

        reader.readAsDataURL(file);

    }

    // Prevent Double Submit
    document.getElementById('adminForm').addEventListener('submit', function () {

        let btn = document.getElementById('saveBtn');

        btn.disabled = true;

        btn.innerHTML =
            '<i class="fa fa-spinner fa-spin"></i> Saving...';

    });

</script>