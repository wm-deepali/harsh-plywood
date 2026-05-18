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

                        <a href="{{ route('admin.counters.index') }}">

                            Counter Section

                        </a>

                    </li>

                    <li class="breadcrumb-item active">

                        Edit Counter

                    </li>

                </ol>

            </div>

        </div>

        {{-- Alerts --}}
        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show">

                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"></button>

            </div>

        @endif

        @if(session('error'))

            <div class="alert alert-danger alert-dismissible fade show">

                {{ session('error') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"></button>

            </div>

        @endif

        @if ($errors->any())

            <div class="alert alert-danger alert-dismissible fade show">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"></button>

            </div>

        @endif

        <div class="content-wrapper pb-4">

            <form action="{{ route('admin.counters.update', $counter->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="card shadow-sm">

                    <div class="card-header">

                        <strong>

                            Edit Counter

                        </strong>

                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-6">

                                <label>
                                    Title
                                </label>

                                <input type="text"
                                       name="title"
                                       class="form-control @error('title') is-invalid @enderror"
                                       value="{{ old('title', $counter->title) }}"
                                       required>

                                @error('title')

                                    <div class="invalid-feedback">

                                        {{ $message }}

                                    </div>

                                @enderror

                            </div>

                            <div class="col-md-6">

                                <label>
                                    Counter Value
                                </label>

                                <input type="text"
                                       name="counter_value"
                                       class="form-control @error('counter_value') is-invalid @enderror"
                                       value="{{ old('counter_value', $counter->counter_value) }}"
                                       required>

                                @error('counter_value')

                                    <div class="invalid-feedback">

                                        {{ $message }}

                                    </div>

                                @enderror

                            </div>

                        </div>

                        <div class="row mt-3">

                            <div class="col-md-6">

                                <label>
                                    Counter Suffix
                                </label>

                                <input type="text"
                                       name="counter_suffix"
                                       class="form-control @error('counter_suffix') is-invalid @enderror"
                                       value="{{ old('counter_suffix', $counter->counter_suffix) }}"
                                       placeholder="+ / K / %">

                                @error('counter_suffix')

                                    <div class="invalid-feedback">

                                        {{ $message }}

                                    </div>

                                @enderror

                            </div>

                            <div class="col-md-6">

                                <label>
                                    Icon Class
                                </label>

                                <input type="text"
                                       name="icon"
                                       class="form-control @error('icon') is-invalid @enderror"
                                       value="{{ old('icon', $counter->icon) }}"
                                       placeholder="fa-regular fa-face-smile">

                                @error('icon')

                                    <div class="invalid-feedback">

                                        {{ $message }}

                                    </div>

                                @enderror

                            </div>

                        </div>

                        <div class="form-group mt-3">

                            <label>

                                <input type="checkbox"
                                       name="status"
                                       {{ old('status', $counter->status) ? 'checked' : '' }}>

                                Active

                            </label>

                        </div>

                        <button type="submit"
                                class="btn btn-primary mt-3">

                            Update Counter

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

@include('admin.footer')