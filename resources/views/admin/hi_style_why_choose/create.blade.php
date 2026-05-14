@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        <div class="card shadow-sm">

            <div class="card-header">
                <strong>Add Item</strong>
            </div>

            <div class="card-body">

                <form method="POST"
                    enctype="multipart/form-data"
                    action="{{ route('admin.hi-style-why-choose.store') }}">

                    @csrf

                    <div class="form-group">

                        <label>Title</label>

                        <input type="text"
                            name="title"
                            class="form-control">

                    </div>

                    <div class="form-group mt-3">

                        <label>Short Content</label>

                        <textarea name="short_content"
                            rows="5"
                            class="form-control"></textarea>

                    </div>

                    <div class="form-group mt-3">

                        <label>Icon Class</label>

                        <input type="text"
                            name="icon"
                            class="form-control"
                            placeholder="fa fa-home">

                    </div>

                    <div class="form-group mt-3">

                        <label>Image</label>

                        <input type="file"
                            name="image"
                            class="form-control">

                    </div>

                    <div class="form-group mt-3">

                        <div class="custom-control custom-checkbox">

                            <input type="checkbox"
                                name="status"
                                id="status"
                                class="custom-control-input"
                                checked>

                            <label class="custom-control-label"
                                for="status">

                                Active

                            </label>

                        </div>

                    </div>

                    <div class="mt-4">

                        <button type="submit"
                            class="btn btn-success">

                            Save Item

                        </button>

                        <a href="{{ route('admin.hi-style-why-choose.index') }}"
                            class="btn btn-secondary">

                            Cancel

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')