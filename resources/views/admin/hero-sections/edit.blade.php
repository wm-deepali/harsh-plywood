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
                        <a href="{{ route('admin.settings.hero-sections.index') }}">
                            Hero Sections
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Edit Hero Section
                    </li>

                </ol>
            </div>

        </div>

        <div class="content-wrapper pb-4">

            <form action="{{ route('admin.settings.hero-sections.update', $heroSection->id) }}" method="POST">

                @csrf

                <div class="card">
                    <div class="card-body">

                        <h4 class="mb-4">
                            {{ $heroSection->page_name }}
                        </h4>

                        <div class="form-group mb-3">
                            <label>Heading</label>

                            <input type="text" name="heading" class="form-control"
                                value="{{ old('heading', $heroSection->heading) }}">

                            @error('heading')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Sub Heading</label>

                            <textarea name="sub_heading" rows="5"
                                class="form-control">{{ old('sub_heading', $heroSection->sub_heading) }}</textarea>

                            @error('sub_heading')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Update Hero Section
                        </button>

                    </div>
                </div>

            </form>

        </div>
    </div>

</div>

@include('admin.footer')