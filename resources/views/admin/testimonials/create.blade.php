{{-- resources/views/admin/testimonials/create.blade.php --}}

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
                        <a href="{{ route('admin.testimonials.index') }}">
                            Manage Testimonials
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Add Testimonial
                    </li>
                </ol>
            </div>
        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Add Testimonial</strong>
                </div>

                <div class="card-body">

                    {{-- Global Validation Errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="testimonialForm"
                          method="POST"
                          enctype="multipart/form-data"
                          action="{{ route('admin.testimonials.store') }}">

                        @csrf

                        {{-- Name --}}
                        <div class="form-group">
                            <label>Name *</label>

                            <input type="text"
                                   name="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title') }}"
                                   required>

                            @error('title')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        {{-- Designation --}}
                        <div class="form-group mt-3">
                            <label>Designation</label>

                            <input type="text"
                                   name="designation"
                                   class="form-control @error('designation') is-invalid @enderror"
                                   value="{{ old('designation') }}">

                            @error('designation')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        {{-- Image --}}
                        <div class="form-group mt-3">
                            <label>Image</label>

                            <input type="file"
                                   name="image"
                                   class="form-control @error('image') is-invalid @enderror">

                            @error('image')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        {{-- Feedback --}}
                        <div class="form-group mt-3">
                            <label>Feedback *</label>

                            <textarea name="feedback"
                                      rows="5"
                                      required
                                      class="form-control @error('feedback') is-invalid @enderror">{{ old('feedback') }}</textarea>

                            @error('feedback')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        {{-- Status --}}
                        <div class="form-group mt-3">

                            <div class="custom-control custom-checkbox">

                                <input type="checkbox"
                                       name="status"
                                       id="status"
                                       class="custom-control-input"
                                       value="1"
                                       {{ old('status', 1) ? 'checked' : '' }}>

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
                                Save Testimonial

                            </button>

                            <a href="{{ route('admin.testimonials.index') }}"
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

    document.getElementById('testimonialForm').addEventListener('submit', function () {

        let btn = document.getElementById('saveBtn');

        btn.disabled = true;

        btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saving...';

    });

</script>