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
                        Interior Packages Section
                    </li>

                </ol>

            </div>

        </div>

        <div class="content-wrapper pb-4">

            {{-- SUCCESS --}}
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

            {{-- ERROR --}}
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

            {{-- VALIDATION --}}
            @if ($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form method="POST"
                  action="{{ route('admin.home-package-section.update') }}"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    {{-- LEFT SECTION --}}
                    <div class="col-md-12">

                        <div class="card mb-4">

                            <div class="card-header">
                                <h5 class="mb-0">Left Section</h5>
                            </div>

                            <div class="card-body">

                                <div class="mb-3">

                                    <label>Logo</label>

                                    <input type="file"
                                           name="left_logo"
                                           class="form-control">

                                    <small class="text-muted d-block mt-1">
                                        Allowed: JPG, JPEG, PNG, WEBP |
                                        Recommended: 300×150px |
                                        Max: 2MB
                                    </small>

                                </div>

                                @if(!empty($section->left_logo))

                                    <div class="mb-3">

                                        <img src="{{ asset('storage/'.$section->left_logo) }}"
                                             width="120">

                                    </div>

                                @endif

                                <div class="mb-3">

                                    <label>Description</label>

                                    <textarea name="left_description"
                                              rows="6"
                                              class="form-control">{{ old('left_description', $section->left_description ?? '') }}</textarea>

                                </div>

                                <div class="mb-3">

                                    <label>Contact Button Text</label>

                                    <input type="text"
                                           name="left_contact_text"
                                           class="form-control"
                                           value="{{ old('left_contact_text', $section->left_contact_text ?? 'Contact Now') }}">

                                </div>

                                <div class="mb-3">

                                    <label>Contact Button Link</label>

                                    <input type="text"
                                           name="left_contact_link"
                                           class="form-control"
                                           value="{{ old('left_contact_link', $section->left_contact_link ?? '#') }}">

                                </div>

                                <div class="mb-3">

                                    <label>Whatsapp Button Text</label>

                                    <input type="text"
                                           name="left_whatsapp_text"
                                           class="form-control"
                                           value="{{ old('left_whatsapp_text', $section->left_whatsapp_text ?? 'Whatsapp Now') }}">

                            

                                </div>

                                <div class="mb-3">

                                    <label>Whatsapp Button Link</label>

                                    <input type="text"
                                           name="left_whatsapp_link"
                                           class="form-control"
                                           value="{{ old('left_whatsapp_link', $section->left_whatsapp_link ?? '#') }}">
                                           <small class="text-muted">
    Example: https://wa.me/919876543210
</small>

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- MIDDLE SECTION --}}
                    <div class="col-md-12">

                        <div class="card mb-4">

                            <div class="card-header">
                                <h5 class="mb-0">Middle Section</h5>
                            </div>

                            <div class="card-body">

                                <div class="mb-3">

                                    <label>Subtitle</label>

                                    <input type="text"
                                           name="middle_subtitle"
                                           class="form-control"
                                           value="{{ old('middle_subtitle', $section->middle_subtitle ?? '') }}">

                                </div>

                                <div class="mb-3">

                                    <label>Title</label>

                                    <textarea name="middle_title"
                                              rows="4"
                                              class="form-control">{{ old('middle_title', $section->middle_title ?? '') }}</textarea>

                                </div>

                                <hr>

                                <h6>Features</h6>

                                {{-- FEATURE 1 --}}
                                <div class="mb-3">

                                    <label>Feature 1 Icon</label>

                                    <input type="text"
                                           name="feature_icon_1"
                                           class="form-control"
                                           placeholder="fa-solid fa-bag-shopping"
                                           value="{{ old('feature_icon_1', $section->feature_icon_1 ?? '') }}">

                                </div>

                                <div class="mb-3">

                                    <label>Feature 1 Text</label>

                                    <input type="text"
                                           name="feature_text_1"
                                           class="form-control"
                                           value="{{ old('feature_text_1', $section->feature_text_1 ?? '') }}">

                                </div>

                                {{-- FEATURE 2 --}}
                                <div class="mb-3">

                                    <label>Feature 2 Icon</label>

                                    <input type="text"
                                           name="feature_icon_2"
                                           class="form-control"
                                           value="{{ old('feature_icon_2', $section->feature_icon_2 ?? '') }}">

                                </div>

                                <div class="mb-3">

                                    <label>Feature 2 Text</label>

                                    <input type="text"
                                           name="feature_text_2"
                                           class="form-control"
                                           value="{{ old('feature_text_2', $section->feature_text_2 ?? '') }}">

                                </div>

                                {{-- FEATURE 3 --}}
                                <div class="mb-3">

                                    <label>Feature 3 Icon</label>

                                    <input type="text"
                                           name="feature_icon_3"
                                           class="form-control"
                                           value="{{ old('feature_icon_3', $section->feature_icon_3 ?? '') }}">

                                </div>

                                <div class="mb-3">

                                    <label>Feature 3 Text</label>

                                    <input type="text"
                                           name="feature_text_3"
                                           class="form-control"
                                           value="{{ old('feature_text_3', $section->feature_text_3 ?? '') }}">

                                </div>

                                <div class="mb-3">

                                    <label>Button Text</label>

                                    <input type="text"
                                           name="middle_button_text"
                                           class="form-control"
                                           value="{{ old('middle_button_text', $section->middle_button_text ?? 'Book Consult') }}">

                                </div>

                                <div class="mb-3">

                                    <label>Button Link</label>

                                    <input type="text"
                                           name="middle_button_link"
                                           class="form-control"
                                           value="{{ old('middle_button_link', $section->middle_button_link ?? '#') }}">

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- RIGHT SECTION --}}
                    <div class="col-md-12">

                        <div class="card mb-4">

                            <div class="card-header">
                                <h5 class="mb-0">Right Section</h5>
                            </div>

                            <div class="card-body">

                                <div class="mb-3">

                                    <label>Logo</label>

                                    <input type="file"
                                           name="right_logo"
                                           class="form-control">

                                    <small class="text-muted d-block mt-1">
                                        Allowed: JPG, JPEG, PNG, WEBP |
                                        Recommended: 300×150px |
                                        Max: 2MB
                                    </small>

                                </div>

                                @if(!empty($section->right_logo))

                                    <div class="mb-3">

                                        <img src="{{ asset('storage/'.$section->right_logo) }}"
                                             width="120">

                                    </div>

                                @endif

                                <div class="mb-3">

                                    <label>Description</label>

                                    <textarea name="right_description"
                                              rows="6"
                                              class="form-control">{{ old('right_description', $section->right_description ?? '') }}</textarea>

                                </div>

                                <div class="mb-3">

                                    <label>Contact Button Text</label>

                                    <input type="text"
                                           name="right_contact_text"
                                           class="form-control"
                                           value="{{ old('right_contact_text', $section->right_contact_text ?? 'Contact Now') }}">

                                </div>

                                <div class="mb-3">

                                    <label>Contact Button Link</label>

                                    <input type="text"
                                           name="right_contact_link"
                                           class="form-control"
                                           value="{{ old('right_contact_link', $section->right_contact_link ?? '#') }}">

                                </div>

                                <div class="mb-3">

                                    <label>Whatsapp Button Text</label>

                                    <input type="text"
                                           name="right_whatsapp_text"
                                           class="form-control"
                                           value="{{ old('right_whatsapp_text', $section->right_whatsapp_text ?? 'Whatsapp Now') }}">

                                </div>

                                <div class="mb-3">

                                    <label>Whatsapp Button Link</label>

                                    <input type="text"
                                           name="right_whatsapp_link"
                                           class="form-control"
                                           value="{{ old('right_whatsapp_link', $section->right_whatsapp_link ?? '#') }}">

                                           <small class="text-muted">
    Example: https://wa.me/919876543210
</small>

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- BUTTON --}}
                    <div class="col-md-12">

                        <button type="submit"
                                class="btn btn-primary">

                            <i class="fa fa-save"></i>
                            Update Section

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

@include('admin.footer')