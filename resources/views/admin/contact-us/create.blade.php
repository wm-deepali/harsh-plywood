@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        <div class="card">

            <div class="card-header">
                <strong>Add Contact</strong>
            </div>

            <div class="card-body">

                <form method="POST"
                    action="{{ route('admin.contact-us.store') }}">

                    @csrf

                    <div class="form-group">
                        <label>Type</label>
                        <input type="text"
                            name="type"
                            class="form-control"
                            placeholder="Head Office / Warehouse"
                            value="{{ old('type') }}">

                        @error('type')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label>Title</label>
                        <input type="text"
                            name="title"
                            class="form-control"
                            value="{{ old('title') }}">

                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label>Description</label>
                        <textarea name="description"
                            class="form-control"
                            rows="4">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group mt-3">
                        <label>Address</label>
                        <textarea name="address"
                            class="form-control"
                            rows="3">{{ old('address') }}</textarea>

                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label>Phone</label>
                        <input type="text"
                            name="phone"
                            class="form-control"
                            value="{{ old('phone') }}">

                        @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label>Email</label>
                        <input type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email') }}">

                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label>Timing</label>
                        <input type="text"
                            name="timing"
                            class="form-control"
                            value="{{ old('timing') }}">
                    </div>

                    <div class="form-group mt-3">
                        <label>Google Map Iframe</label>

                        <textarea name="map_iframe"
                            class="form-control"
                            rows="5"></textarea>
                    </div>

                    <div class="form-group mt-3">

                        <div class="custom-control custom-checkbox">

                            <input type="checkbox"
                                name="status"
                                id="status"
                                class="custom-control-input"
                                checked>

                            <label class="custom-control-label" for="status">
                                Active
                            </label>

                        </div>

                    </div>

                    <div class="mt-4">

                        <button type="submit"
                            class="btn btn-success">

                            Save Contact

                        </button>

                        <a href="{{ route('admin.contact-us.index') }}"
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