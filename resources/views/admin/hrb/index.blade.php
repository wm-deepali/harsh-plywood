@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    <div class="app-content container-fluid">

        <div class="breadcrumbs-top bg-light mb-3">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">HRB Page</li>
            </ol>
        </div>

        <div class="content-wrapper pb-4">

            <!-- HERO -->
            <div class="card mb-3">
                <div class="card-header"><strong>Hero Section</strong></div>
                <div class="card-body">

                    <form method="POST" action="{{ route('admin.hrb.update', 'hero') }}">
                        @csrf

                        <input type="text" name="heading" class="form-control mb-2" placeholder="Heading"
                            value="{{ $hero->heading ?? '' }}">

                        <input type="text" name="sub_heading" class="form-control mb-2" placeholder="Sub Heading"
                            value="{{ $hero->sub_heading ?? '' }}">

                        <textarea name="short_description"
                            class="form-control mb-2">{{ $hero->short_description ?? '' }}</textarea>

                        <input type="text" name="button_text" class="form-control mb-2" placeholder="Button Text"
                            value="{{ $hero->button_text ?? '' }}">

                        <button class="btn btn-success">Save</button>

                    </form>

                </div>
            </div>

            <!-- DETAIL 1 -->
            <div class="card mb-3">
                <div class="card-header"><strong>Detail Section</strong></div>
                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.hrb.update', 'detail') }}">
                        @csrf

                        <textarea name="content" id="detail"
                            class="form-control mb-2">{{ $detail->content ?? '' }}</textarea>

                        <input type="file" name="image" class="form-control mb-2">

                        @if(!empty($detail->image))
                            <img src="{{ asset('storage/' . $detail->image) }}" width="120">
                        @endif

                        <button class="btn btn-success mt-2">Save</button>

                    </form>

                </div>
            </div>

            <!-- DETAIL 2 -->
            <div class="card mb-3">
                <div class="card-header"><strong>Detail 2 Section</strong></div>
                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data"
                        action="{{ route('admin.hrb.update', 'detail2') }}">
                        @csrf

                        <textarea name="content" id="detail2"
                            class="form-control mb-2">{{ $detail2->content ?? '' }}</textarea>

                        <input type="file" name="image" class="form-control mb-2">

                        @if(!empty($detail2->image))
                            <img src="{{ asset('storage/' . $detail2->image) }}" width="120">
                        @endif

                        <button class="btn btn-success mt-2">Save</button>

                    </form>

                </div>
            </div>

            <!-- AFFILIATIONS -->
            <div class="card">
                <div class="card-header"><strong>Our Affiliations</strong></div>
                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data"
                        action="{{ route('admin.hrb.affiliation.store') }}">
                        @csrf

                        <input type="file" name="image" class="form-control mb-2">
                        <input type="text" name="title" placeholder="Title" class="form-control mb-2">

                        <button class="btn btn-primary">Add</button>

                    </form>

                    <hr>

                    <div class="d-flex flex-wrap">

                        @foreach($affiliations as $a)
                            <div id="aff{{ $a->id }}" class="text-center mr-3 mb-3">

                                <img src="{{ asset('storage/' . $a->image) }}" width="100"><br>

                                <strong>{{ $a->title }}</strong><br>

                                <button onclick="deleteAff({{ $a->id }})" class="btn btn-danger btn-sm mt-1">Delete</button>

                            </div>
                        @endforeach

                    </div>

                </div>
            </div>

        </div>
    </div>

    @include('admin.footer')

    <script src="https://cdn.ckeditor.com/4.25.1/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('detail');
        CKEDITOR.replace('detail2');

        function deleteAff(id) {
            $.ajax({
                url: "/admin/hrb-affiliation/" + id,
                type: "DELETE",
                data: { _token: "{{ csrf_token() }}" },
                success: function () {
                    $("#aff" + id).remove();
                }
            });
        }
    </script>