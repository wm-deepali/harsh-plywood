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
                        <a href="{{ route('admin.about.index') }}">
                            About Us
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Vision
                    </li>

                </ol>

            </div>

        </div>

        <div class="content-wrapper pb-4">

            <form action="{{ route('admin.about.vision.update') }}" method="POST">

                @csrf

                <div class="card shadow-sm">

                    <div class="card-header">
                        <strong>Edit Vision</strong>
                    </div>

                    <div class="card-body">

                        <div class="form-group">

                            <label>
                                Heading
                            </label>

                            <input type="text" name="heading" class="form-control"
                                value="{{ old('heading', $section->heading) }}">

                        </div>

                        <div class="form-group mt-3">

                            <label>
                                Detail Content
                            </label>

                            <textarea name="content" id="editor"
                                class="form-control">{{ old('content', $section->content) }}</textarea>

                        </div>

                        <button type="submit" class="btn btn-primary mt-3">

                            Update Vision

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

@include('admin.footer')

<script src="https://cdn.ckeditor.com/4.25.1/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('editor');
</script>