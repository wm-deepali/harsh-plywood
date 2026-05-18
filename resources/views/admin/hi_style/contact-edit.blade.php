{{-- resources/views/admin/hi_style/contact-edit.blade.php --}}

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
                        <a href="{{ route('admin.hi-style.index') }}">
                            Hi Style Page
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Contact Section
                    </li>

                </ol>

            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Edit Contact Section</strong>
                </div>

                <div class="card-body">

                    <form method="POST"
                        action="{{ route('admin.hi-style.contact.update') }}">

                        @csrf

                        @if ($errors->any())

                            <div class="alert alert-danger">

                                <ul class="mb-0">

                                    @foreach ($errors->all() as $error)

                                        <li>{{ $error }}</li>

                                    @endforeach

                                </ul>

                            </div>

                        @endif

                        <div class="form-group">

                            <label>Contact Heading</label>

                            <input type="text"
                                name="contact_heading"
                                class="form-control"
                                value="{{ old('contact_heading', $hi_style->contact_heading ?? '') }}">

                            @error('contact_heading')

                                <small class="text-danger">
                                    {{ $message }}
                                </small>

                            @enderror

                        </div>

                        <div class="form-group mt-3">

                            <label>Contact Description</label>

                            <textarea name="contact_description"
                                rows="5"
                                class="form-control">{{ old('contact_description', $hi_style->contact_description ?? '') }}</textarea>

                            @error('contact_description')

                                <small class="text-danger">
                                    {{ $message }}
                                </small>

                            @enderror

                        </div>

                        <div class="form-group mt-3">

                            <label>Phone</label>

                            <input type="text"
                                name="contact_phone"
                                class="form-control"
                                value="{{ old('contact_phone', $hi_style->contact_phone ?? '') }}">

                            @error('contact_phone')

                                <small class="text-danger">
                                    {{ $message }}
                                </small>

                            @enderror

                        </div>

                        <div class="form-group mt-3">

                            <label>Email</label>

                            <input type="email"
                                name="contact_email"
                                class="form-control"
                                value="{{ old('contact_email', $hi_style->contact_email ?? '') }}">

                            @error('contact_email')

                                <small class="text-danger">
                                    {{ $message }}
                                </small>

                            @enderror

                        </div>

                        <div class="mt-4">

                            <button type="submit"
                                class="btn btn-success">

                                Update Contact Section

                            </button>

                            <a href="{{ route('admin.hi-style.index') }}"
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