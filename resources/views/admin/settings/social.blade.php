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
                        Social Media Settings
                    </li>

                </ol>

            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Social Media Links</strong>
                </div>

                <div class="card-body">

                    {{-- Success Message --}}
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

                    <form id="socialForm"
                          method="POST"
                          action="{{ route('admin.settings.social') }}">

                        @csrf

                        {{-- Facebook --}}
                        <div class="form-group">

                            <label>
                                Facebook URL
                            </label>

                            <input type="url"
                                   name="facebook"
                                   class="form-control @error('facebook') is-invalid @enderror"
                                   value="{{ old('facebook', $data->facebook ?? '') }}"
                                   placeholder="https://facebook.com/yourpage">

                            @error('facebook')

                                <span class="text-danger">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>

                        {{-- Instagram --}}
                        <div class="form-group mt-3">

                            <label>
                                Instagram URL
                            </label>

                            <input type="url"
                                   name="instagram"
                                   class="form-control @error('instagram') is-invalid @enderror"
                                   value="{{ old('instagram', $data->instagram ?? '') }}"
                                   placeholder="https://instagram.com/yourprofile">

                            @error('instagram')

                                <span class="text-danger">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>

                        {{-- Youtube --}}
                        <div class="form-group mt-3">

                            <label>
                                Youtube URL
                            </label>

                            <input type="url"
                                   name="youtube"
                                   class="form-control @error('youtube') is-invalid @enderror"
                                   value="{{ old('youtube', $data->youtube ?? '') }}"
                                   placeholder="https://youtube.com/yourchannel">

                            @error('youtube')

                                <span class="text-danger">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>

                        {{-- Google Plus --}}
                        <div class="form-group mt-3">

                            <label>
                                Google Plus URL
                            </label>

                            <input type="url"
                                   name="google_plus"
                                   class="form-control @error('google_plus') is-invalid @enderror"
                                   value="{{ old('google_plus', $data->google_plus ?? '') }}"
                                   placeholder="https://plus.google.com">

                            @error('google_plus')

                                <span class="text-danger">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>

                        {{-- LinkedIn --}}
                        <div class="form-group mt-3">

                            <label>
                                LinkedIn URL
                            </label>

                            <input type="url"
                                   name="linkedin"
                                   class="form-control @error('linkedin') is-invalid @enderror"
                                   value="{{ old('linkedin', $data->linkedin ?? '') }}"
                                   placeholder="https://linkedin.com/company/companyname">

                            @error('linkedin')

                                <span class="text-danger">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>

                        {{-- Twitter --}}
                        <div class="form-group mt-3">

                            <label>
                                Twitter / X URL
                            </label>

                            <input type="url"
                                   name="twitter"
                                   class="form-control @error('twitter') is-invalid @enderror"
                                   value="{{ old('twitter', $data->twitter ?? '') }}"
                                   placeholder="https://x.com/username">

                            @error('twitter')

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

    // Prevent Double Submit
    document.getElementById('socialForm').addEventListener('submit', function () {

        let btn = document.getElementById('saveBtn');

        btn.disabled = true;

        btn.innerHTML =
            '<i class="fa fa-spinner fa-spin"></i> Saving...';

    });

</script>