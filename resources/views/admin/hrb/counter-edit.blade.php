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

            {{-- SECTION FORM --}}
            <div class="card shadow-sm mb-4">

                <div class="card-header">
                    <strong>Counter Section</strong>
                </div>

                <div class="card-body">

                    <form method="POST"
                        action="{{ route('admin.hrb.counter.update') }}">

                        @csrf

                        <div class="form-group">

                            <label>Heading</label>

                            <input type="text"
                                name="counter_heading"
                                class="form-control"
                                value="{{ old('counter_heading', $hrb->counter_heading ?? '') }}">

                        </div>

                        <div class="form-group mt-3">

                            <label>Sub Heading</label>

                            <input type="text"
                                name="counter_sub_heading"
                                class="form-control"
                                value="{{ old('counter_sub_heading', $hrb->counter_sub_heading ?? '') }}">

                        </div>

                        <div class="mt-4">

                            <button type="submit"
                                class="btn btn-success">

                                Update Section

                            </button>

                        </div>

                    </form>

                </div>

            </div>

            {{-- ADD COUNTER --}}
            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Add Counter</strong>
                </div>

                <div class="card-body">

                    <form method="POST"
                        action="{{ route('admin.hrb.counter.store') }}">

                        @csrf

                        <div class="row">

                            <div class="col-md-4">

                                <div class="form-group">

                                    <label>Counter Value</label>

                                    <input type="text"
                                        name="counter_value"
                                        class="form-control"
                                        placeholder="25+">

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <label>Counter Title</label>

                                    <input type="text"
                                        name="counter_title"
                                        class="form-control"
                                        placeholder="Years Experience">

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <label>Icon Class</label>

                                    <input type="text"
                                        name="icon"
                                        class="form-control"
                                        placeholder="fa fa-star">

                                </div>

                            </div>

                        </div>

                        <button type="submit"
                            class="btn btn-primary">

                            Add Counter

                        </button>

                    </form>

                </div>

            </div>

            {{-- COUNTERS TABLE --}}
            <div class="card shadow-sm mt-4">

                <div class="card-header">
                    <strong>All Counters</strong>
                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered">

                            <thead>

                                <tr>

                                    <th>#</th>

                                    <th>Counter Value</th>

                                    <th>Counter Title</th>

                                    <th>Icon</th>

                                    <th width="100">
                                        Action
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($counters as $key => $counter)

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

                                            @if($counter->icon)

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

function deleteCounter(id)
{
    Swal.fire({

        title: 'Delete Counter?',

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

                    $("#row" + id).remove();

                }

            });

        }

    });
}

</script>