{{-- resources/views/admin/settings/social.blade.php --}}

@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        {{-- BREADCRUMB --}}
        <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">

            <div class="breadcrumb-wrapper">

                <ol class="breadcrumb bg-transparent mb-0">

                    <li class="breadcrumb-item">

                        <a href="{{ route('admin.dashboard') }}">

                            Dashboard

                        </a>

                    </li>

                    <li class="breadcrumb-item active">

                        Social Media Settings

                    </li>

                </ol>

            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">

                    <strong>

                        Social Media Links

                    </strong>

                </div>

                <div class="card-body">

                    {{-- SUCCESS MESSAGE --}}
                    @if(session('success'))

                        <div class="alert alert-success alert-dismissible fade show">

                            {{ session('success') }}

                            <button type="button"
                                    class="close"
                                    data-dismiss="alert">

                                &times;

                            </button>

                        </div>

                    @endif

                    {{-- ERROR MESSAGE --}}
                    @if(session('error'))

                        <div class="alert alert-danger alert-dismissible fade show">

                            {{ session('error') }}

                            <button type="button"
                                    class="close"
                                    data-dismiss="alert">

                                &times;

                            </button>

                        </div>

                    @endif

                    {{-- VALIDATION ERRORS --}}
                    @if ($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form id="socialForm"
                          method="POST"
                          action="{{ route('admin.settings.social') }}">

                        @csrf

                        <div class="row">

                            {{-- FACEBOOK --}}
                            <div class="col-md-6 mb-4">

                                <label>

                                    Facebook URL

                                </label>

                                <input type="url"
                                       name="facebook"
                                       class="form-control @error('facebook') is-invalid @enderror"
                                       value="{{ old('facebook', $data->facebook ?? '') }}"
                                       placeholder="https://facebook.com/yourpage">

                                @error('facebook')

                                    <span class="invalid-feedback d-block">

                                        {{ $message }}

                                    </span>

                                @enderror

                            </div>

                            {{-- INSTAGRAM --}}
                            <div class="col-md-6 mb-4">

                                <label>

                                    Instagram URL

                                </label>

                                <input type="url"
                                       name="instagram"
                                       class="form-control @error('instagram') is-invalid @enderror"
                                       value="{{ old('instagram', $data->instagram ?? '') }}"
                                       placeholder="https://instagram.com/yourprofile">

                                @error('instagram')

                                    <span class="invalid-feedback d-block">

                                        {{ $message }}

                                    </span>

                                @enderror

                            </div>

                            {{-- YOUTUBE --}}
                            <div class="col-md-6 mb-4">

                                <label>

                                    Youtube URL

                                </label>

                                <input type="url"
                                       name="youtube"
                                       class="form-control @error('youtube') is-invalid @enderror"
                                       value="{{ old('youtube', $data->youtube ?? '') }}"
                                       placeholder="https://youtube.com/yourchannel">

                                @error('youtube')

                                    <span class="invalid-feedback d-block">

                                        {{ $message }}

                                    </span>

                                @enderror

                            </div>

                            {{-- GOOGLE PLUS --}}
                            <div class="col-md-6 mb-4">

                                <label>

                                    Google Plus URL

                                </label>

                                <input type="url"
                                       name="google_plus"
                                       class="form-control @error('google_plus') is-invalid @enderror"
                                       value="{{ old('google_plus', $data->google_plus ?? '') }}"
                                       placeholder="https://plus.google.com">

                                @error('google_plus')

                                    <span class="invalid-feedback d-block">

                                        {{ $message }}

                                    </span>

                                @enderror

                            </div>

                            {{-- LINKEDIN --}}
                            <div class="col-md-6 mb-4">

                                <label>

                                    LinkedIn URL

                                </label>

                                <input type="url"
                                       name="linkedin"
                                       class="form-control @error('linkedin') is-invalid @enderror"
                                       value="{{ old('linkedin', $data->linkedin ?? '') }}"
                                       placeholder="https://linkedin.com/company/companyname">

                                @error('linkedin')

                                    <span class="invalid-feedback d-block">

                                        {{ $message }}

                                    </span>

                                @enderror

                            </div>

                            {{-- TWITTER --}}
                            <div class="col-md-6 mb-4">

                                <label>

                                    Twitter / X URL

                                </label>

                                <input type="url"
                                       name="twitter"
                                       class="form-control @error('twitter') is-invalid @enderror"
                                       value="{{ old('twitter', $data->twitter ?? '') }}"
                                       placeholder="https://x.com/username">

                                @error('twitter')

                                    <span class="invalid-feedback d-block">

                                        {{ $message }}

                                    </span>

                                @enderror

                            </div>

                        </div>

                        {{-- BUTTONS --}}
                        <div class="mt-3">

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

    // PREVENT DOUBLE SUBMIT
    document.getElementById('socialForm').addEventListener('submit', function ()
    {
        let btn = document.getElementById('saveBtn');

        btn.disabled = true;

        btn.innerHTML =
            '<i class="fa fa-spinner fa-spin"></i> Saving...';
    });

</script>