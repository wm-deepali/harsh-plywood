@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        <div class="breadcrumbs-top d-flex align-items-center justify-content-between bg-light mb-3">

            <div class="breadcrumb-wrapper">

                <ol class="breadcrumb bg-transparent mb-0">

                    <li class="breadcrumb-item">

                        <a href="{{ route('admin.dashboard') }}">

                            Dashboard

                        </a>

                    </li>

                    <li class="breadcrumb-item active">

                        Counter Section

                    </li>

                </ol>

            </div>

            <a href="{{ route('admin.counters.create') }}"
               class="btn btn-primary">

                <i class="fa fa-plus"></i>

                Add Counter

            </a>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered align-middle">

                            <thead>

                                <tr>

                                    <th width="80">
                                        ID
                                    </th>

                                    <th>
                                        Icon
                                    </th>

                                    <th>
                                        Title
                                    </th>

                                    <th>
                                        Value
                                    </th>

                                    <th>
                                        Suffix
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                    <th width="150">
                                        Action
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($counters as $counter)

                                    <tr id="row{{ $counter->id }}">

                                        <td>

                                            {{ $counter->id }}

                                        </td>

                                        <td>

                                            <i class="{{ $counter->icon }}"></i>

                                            {{ $counter->icon }}

                                        </td>

                                        <td>

                                            {{ $counter->title }}

                                        </td>

                                        <td>

                                            {{ $counter->counter_value }}

                                        </td>

                                        <td>

                                            {{ $counter->counter_suffix }}

                                        </td>

                                        <td>

                                            @if($counter->status)

                                                <span class="badge bg-success">

                                                    Active

                                                </span>

                                            @else

                                                <span class="badge bg-danger">

                                                    Inactive

                                                </span>

                                            @endif

                                        </td>

                                        <td>

                                            <a href="{{ route('admin.counters.edit', $counter->id) }}"
                                               class="btn btn-sm btn-primary">

                                                Edit

                                            </a>

                                            <button type="button"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="deleteCounter({{ $counter->id }})">

                                                Delete

                                            </button>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="7"
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

            showCancelButton: true

        }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({

                    url: '/admin/counters/' + id,

                    type: 'DELETE',

                    data: {

                        _token: '{{ csrf_token() }}'

                    },

                    success: function (response) {

                        $('#row' + id).remove();

                        Swal.fire(
                            'Deleted!',
                            response.message,
                            'success'
                        );

                    }

                });

            }

        });
    }

</script>