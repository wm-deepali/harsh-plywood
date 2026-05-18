{{-- resources/views/admin/hrb/counter-edit.blade.php --}}

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

                    <li class="breadcrumb-item">

                        <a href="{{ route('admin.hrb.index') }}">

                            HRB Page

                        </a>

                    </li>

                    <li class="breadcrumb-item active">

                        Counter Section

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

            {{-- VALIDATION ERRORS --}}
            @if ($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            {{-- SECTION FORM --}}
            <div class="card shadow-sm mb-4">

                <div class="card-header">

                    <strong>

                        Counter Section

                    </strong>

                </div>

                <div class="card-body">

                    <form id="counterSectionForm"
                          method="POST"
                          action="{{ route('admin.hrb.counter.update') }}">

                        @csrf

                        {{-- HEADING --}}
                        <div class="form-group">

                            <label>

                                Heading

                            </label>

                            <input type="text"
                                   name="counter_heading"
                                   class="form-control @error('counter_heading') is-invalid @enderror"
                                   value="{{ old('counter_heading', $hrb->counter_heading ?? '') }}"
                                   placeholder="Enter heading">

                            @error('counter_heading')

                                <span class="invalid-feedback d-block">

                                    {{ $message }}

                                </span>

                            @enderror

                        </div>

                        {{-- SUB HEADING --}}
                        <div class="form-group mt-3">

                            <label>

                                Sub Heading

                            </label>

                            <input type="text"
                                   name="counter_sub_heading"
                                   class="form-control @error('counter_sub_heading') is-invalid @enderror"
                                   value="{{ old('counter_sub_heading', $hrb->counter_sub_heading ?? '') }}"
                                   placeholder="Enter sub heading">

                            @error('counter_sub_heading')

                                <span class="invalid-feedback d-block">

                                    {{ $message }}

                                </span>

                            @enderror

                        </div>

                        {{-- BUTTON --}}
                        <div class="mt-4">

                            <button type="submit"
                                    id="sectionBtn"
                                    class="btn btn-success">

                                <i class="fa fa-save"></i>

                                Update Section

                            </button>

                        </div>

                    </form>

                </div>

            </div>

            {{-- ADD COUNTER --}}
            <div class="card shadow-sm">

                <div class="card-header">

                    <strong>

                        Add Counter

                    </strong>

                </div>

                <div class="card-body">

                    <form id="counterForm"
                          method="POST"
                          action="{{ route('admin.hrb.counter.store') }}">

                        @csrf

                        <div class="row">

                            {{-- COUNTER VALUE --}}
                            <div class="col-md-4">

                                <div class="form-group">

                                    <label>

                                        Counter Value

                                    </label>

                                    <input type="text"
                                           name="counter_value"
                                           class="form-control @error('counter_value') is-invalid @enderror"
                                           placeholder="25+"
                                           value="{{ old('counter_value') }}">

                                    @error('counter_value')

                                        <span class="invalid-feedback d-block">

                                            {{ $message }}

                                        </span>

                                    @enderror

                                </div>

                            </div>

                            {{-- COUNTER TITLE --}}
                            <div class="col-md-4">

                                <div class="form-group">

                                    <label>

                                        Counter Title

                                    </label>

                                    <input type="text"
                                           name="counter_title"
                                           class="form-control @error('counter_title') is-invalid @enderror"
                                           placeholder="Years Experience"
                                           value="{{ old('counter_title') }}">

                                    @error('counter_title')

                                        <span class="invalid-feedback d-block">

                                            {{ $message }}

                                        </span>

                                    @enderror

                                </div>

                            </div>

                            {{-- ICON --}}
                            <div class="col-md-4">

                                <div class="form-group">

                                    <label>

                                        Icon Class

                                    </label>

                                    <input type="text"
                                           name="icon"
                                           class="form-control @error('icon') is-invalid @enderror"
                                           placeholder="fa fa-star"
                                           value="{{ old('icon') }}">

                                    @error('icon')

                                        <span class="invalid-feedback d-block">

                                            {{ $message }}

                                        </span>

                                    @enderror

                                </div>

                            </div>

                        </div>

                        {{-- BUTTON --}}
                        <button type="submit"
                                id="counterBtn"
                                class="btn btn-primary">

                            <i class="fa fa-plus"></i>

                            Add Counter

                        </button>

                    </form>

                </div>

            </div>

            {{-- COUNTERS TABLE --}}
            <div class="card shadow-sm mt-4">

                <div class="card-header">

                    <strong>

                        All Counters

                    </strong>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered">

                            <thead>

                                <tr>

                                    <th width="80">

                                        #

                                    </th>

                                    <th>

                                        Counter Value

                                    </th>

                                    <th>

                                        Counter Title

                                    </th>

                                    <th>

                                        Icon

                                    </th>

                                    <th width="100">

                                        Action

                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($counters ?? [] as $key => $counter)

                                    <tr id="row{{ $counter->id }}">

                                        <td>

                                            {{ $key + 1 }}

                                        </td>

                                        <td>

                                            {{ $counter->counter_value }}

                                        </td>

                                        <td>

                                            {{ $counter->counter_title }}

                                        </td>

                                        <td>

                                            @if(!empty($counter->icon))

                                                <i class="{{ $counter->icon }}"></i>

                                                {{ $counter->icon }}

                                            @endif

                                        </td>

                                        <td>

                                            <button type="button"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="deleteCounter({{ $counter->id }})">

                                                Delete

                                            </button>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="5"
                                            class="text-center">

                                            No Counters Found

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

<script>

    // SECTION FORM
    document.getElementById('counterSectionForm')
    .addEventListener('submit', function ()
    {
        let btn = document.getElementById('sectionBtn');

        btn.disabled = true;

        btn.innerHTML =
            '<i class="fa fa-spinner fa-spin"></i> Updating...';
    });

    // COUNTER FORM
    document.getElementById('counterForm')
    .addEventListener('submit', function ()
    {
        let btn = document.getElementById('counterBtn');

        btn.disabled = true;

        btn.innerHTML =
            '<i class="fa fa-spinner fa-spin"></i> Adding...';
    });

    // DELETE COUNTER
    function deleteCounter(id)
    {
        Swal.fire({

            title: 'Delete Counter?',

            text: "This action cannot be undone.",

            icon: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#d33',

            confirmButtonText: 'Yes Delete'

        })

        .then((result) => {

            if (result.isConfirmed) {

                $.ajax({

                    url: "{{ url('admin/hrb/counter-delete') }}/" + id,

                    type: "DELETE",

                    data: {
                        _token: "{{ csrf_token() }}"
                    },

                    success: function(res) {

                        Swal.fire(
                            'Deleted!',
                            res.message,
                            'success'
                        );

                        $("#row" + id).remove();

                    },

                    error: function() {

                        Swal.fire(
                            'Error!',
                            'Something went wrong.',
                            'error'
                        );

                    }

                });

            }

        });
    }

</script>