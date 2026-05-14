@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content container-fluid">

        <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">

            <div class="breadcrumb-wrapper">

                <ol class="breadcrumb bg-transparent mb-0">

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        About Us
                    </li>

                </ol>

            </div>

        </div>

        <div class="content-wrapper pb-4">

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

            <!-- INTRODUCTION -->
            <div class="card shadow-sm mb-4">

                <div class="card-header">
                    <strong>Introduction</strong>
                </div>

                <div class="card-body">

                    <form method="POST"
                          action="{{ route('admin.about.update', 'introduction') }}"
                          class="aboutForm">

                        @csrf

                        <div class="form-group">

                            <label>
                                Heading
                            </label>

                            <input type="text"
                                   name="heading"
                                   class="form-control"
                                   value="{{ old('heading', $intro->heading ?? '') }}">

                        </div>

                        <div class="form-group mt-3">

                            <label>
                                Sub Heading
                            </label>

                            <input type="text"
                                   name="sub_heading"
                                   class="form-control"
                                   value="{{ old('sub_heading', $intro->sub_heading ?? '') }}">

                        </div>

                        <div class="form-group mt-3">

                            <label>
                                Detail Content
                            </label>

                            <textarea name="content"
                                      id="introEditor"
                                      class="form-control">{{ old('content', $intro->content ?? '') }}</textarea>

                        </div>

                        <button type="submit"
                                class="btn btn-success saveBtn mt-3">

                            <i class="fa fa-save"></i>
                            Save Introduction

                        </button>

                    </form>

                </div>

            </div>

            <!-- HISTORY -->
            <div class="card shadow-sm mb-4">

                <div class="card-header">
                    <strong>Our History</strong>
                </div>

                <div class="card-body">

                    <form method="POST"
                          action="{{ route('admin.about.update', 'history') }}"
                          class="aboutForm">

                        @csrf

                        <div class="form-group">

                            <label>
                                Heading
                            </label>

                            <input type="text"
                                   name="heading"
                                   class="form-control"
                                   value="{{ old('heading', $history->heading ?? '') }}">

                        </div>

                        <div class="form-group mt-3">

                            <label>
                                Detail Content
                            </label>

                            <textarea name="content"
                                      id="historyEditor"
                                      class="form-control">{{ old('content', $history->content ?? '') }}</textarea>

                        </div>

                        <button type="submit"
                                class="btn btn-success saveBtn mt-3">

                            <i class="fa fa-save"></i>
                            Save History

                        </button>

                    </form>

                </div>

            </div>

            <!-- VISION -->
            <div class="card shadow-sm mb-4">

                <div class="card-header">
                    <strong>Our Vision</strong>
                </div>

                <div class="card-body">

                    <form method="POST"
                          action="{{ route('admin.about.update', 'vision') }}"
                          class="aboutForm">

                        @csrf

                        <div class="form-group">

                            <label>
                                Heading
                            </label>

                            <input type="text"
                                   name="heading"
                                   class="form-control"
                                   value="{{ old('heading', $vision->heading ?? '') }}">

                        </div>

                        <div class="form-group mt-3">

                            <label>
                                Detail Content
                            </label>

                            <textarea name="content"
                                      id="visionEditor"
                                      class="form-control">{{ old('content', $vision->content ?? '') }}</textarea>

                        </div>

                        <button type="submit"
                                class="btn btn-success saveBtn mt-3">

                            <i class="fa fa-save"></i>
                            Save Vision

                        </button>

                    </form>

                </div>

            </div>

            <!-- MISSION -->
            <div class="card shadow-sm mb-4">

                <div class="card-header">
                    <strong>Our Mission</strong>
                </div>

                <div class="card-body">

                    <form method="POST"
                          action="{{ route('admin.about.update', 'mission') }}"
                          class="aboutForm">

                        @csrf

                        <div class="form-group">

                            <label>
                                Heading
                            </label>

                            <input type="text"
                                   name="heading"
                                   class="form-control"
                                   value="{{ old('heading', $mission->heading ?? '') }}">

                        </div>

                        <div class="form-group mt-3">

                            <label>
                                Detail Content
                            </label>

                            <textarea name="content"
                                      id="missionEditor"
                                      class="form-control">{{ old('content', $mission->content ?? '') }}</textarea>

                        </div>

                        <button type="submit"
                                class="btn btn-success saveBtn mt-3">

                            <i class="fa fa-save"></i>
                            Save Mission

                        </button>

                    </form>

                </div>

            </div>

            <!-- TEAM -->
            <div class="card shadow-sm">

                <div class="card-header d-flex justify-content-between align-items-center">

                    <strong>Our Team</strong>

                </div>

                <div class="card-body">

                    {{-- Add Team Member --}}
                    <form method="POST"
                          enctype="multipart/form-data"
                          action="{{ route('admin.about.team.store') }}"
                          id="teamForm">

                        @csrf

                        <div class="row">

                            <div class="col-md-4">

                                <div class="form-group">

                                    <label>
                                        Team Image *
                                    </label>

                                    <input type="file"
                                           name="image"
                                           class="form-control"
                                           required>

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <label>
                                        Name *
                                    </label>

                                    <input type="text"
                                           name="title"
                                           class="form-control"
                                           placeholder="Enter Name"
                                           required>

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <label>
                                        Designation
                                    </label>

                                    <input type="text"
                                           name="designation"
                                           class="form-control"
                                           placeholder="Enter Designation">

                                </div>

                            </div>

                        </div>

                        <button type="submit"
                                id="teamBtn"
                                class="btn btn-primary mt-2">

                            <i class="fa fa-plus"></i>
                            Add Team Member

                        </button>

                    </form>

                    <hr class="my-4">

                    {{-- Team Table --}}
                    <div class="table-responsive">

                        <table class="table table-bordered table-hover">

                            <thead class="thead-light">

                                <tr>

                                    <th width="80">
                                        Image
                                    </th>

                                    <th>
                                        Name
                                    </th>

                                    <th>
                                        Designation
                                    </th>

                                    <th width="100">
                                        Action
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($team as $t)

                                    <tr id="teamRow{{ $t->id }}">

                                        <td>

                                            @if($t->image)

                                                <img src="{{ asset('storage/' . $t->image) }}"
                                                     width="60"
                                                     height="60"
                                                     style="object-fit:cover;"
                                                     class="rounded border">

                                            @endif

                                        </td>

                                        <td>

                                            {{ $t->title }}

                                        </td>

                                        <td>

                                            {{ $t->designation }}

                                        </td>

                                        <td>

                                            <button type="button"
                                                    onclick="deleteTeam({{ $t->id }})"
                                                    class="btn btn-sm btn-danger">

                                                <i class="fa fa-trash"></i>

                                            </button>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="4"
                                            class="text-center text-muted">

                                            No Team Members Found

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')

{{-- Latest CKEditor --}}
<script src="https://cdn.ckeditor.com/4.25.1/standard/ckeditor.js"></script>

<script>

    // Editors
    CKEDITOR.replace('introEditor');

    CKEDITOR.replace('historyEditor');

    CKEDITOR.replace('visionEditor');

    CKEDITOR.replace('missionEditor');

    // Prevent Double Submit
    document.querySelectorAll('.aboutForm').forEach(function(form){

        form.addEventListener('submit', function(){

            let btn = form.querySelector('.saveBtn');

            btn.disabled = true;

            btn.innerHTML =
                '<i class="fa fa-spinner fa-spin"></i> Saving...';

        });

    });

    // Team Form Loader
    document.getElementById('teamForm').addEventListener('submit', function(){

        let btn = document.getElementById('teamBtn');

        btn.disabled = true;

        btn.innerHTML =
            '<i class="fa fa-spinner fa-spin"></i> Adding...';

    });

    // Delete Team
    function deleteTeam(id)
    {
        Swal.fire({

            title: 'Delete Team Member?',

            icon: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#d33',

            confirmButtonText: 'Delete'

        }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({

                    url: "/admin/about-team/" + id,

                    type: "DELETE",

                    data: {

                        _token: "{{ csrf_token() }}"

                    },

                    success: function (res) {

                        $("#teamRow" + id).remove();

                        Swal.fire(
                            'Deleted!',
                            res.message,
                            'success'
                        );

                    }

                });

            }

        });
    }

</script>