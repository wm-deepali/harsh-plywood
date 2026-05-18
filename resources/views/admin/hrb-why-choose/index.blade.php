{{-- resources/views/admin/hrb-why-choose/index.blade.php --}}

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

                        Why Choose Us

                    </li>

                </ol>

            </div>

            <div class="ml-auto mr-2">

                <a href="{{ route('admin.hrb-why-choose.create') }}"
                   class="btn btn-primary">

                    <i class="fa fa-plus"></i>

                    Add Item

                </a>

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

            <div class="card shadow-sm">

                <div class="card-header d-flex align-items-center justify-content-between">

                    <strong>

                        All Items

                    </strong>

                    <span class="badge badge-primary">

                        Total:
                        {{ $items->total() }}

                    </span>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-hover align-middle">

                            <thead class="thead-light">

                                <tr>

                                    <th width="70">

                                        ID

                                    </th>

                                    <th width="100">

                                        Image

                                    </th>

                                    <th>

                                        Title

                                    </th>

                                    <th>

                                        Icon

                                    </th>

                                    <th width="120">

                                        Status

                                    </th>

                                    <th width="160">

                                        Action

                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($items ?? [] as $item)

                                    <tr id="row{{ $item->id }}">

                                        <td>

                                            {{ $item->id }}

                                        </td>

                                        <td>

                                            @if(!empty($item->image))

                                                <img src="{{ asset('storage/'.$item->image) }}"
                                                     width="70"
                                                     height="70"
                                                     class="img-thumbnail"
                                                     style="object-fit: cover;">

                                            @else

                                                <span class="text-muted">

                                                    No Image

                                                </span>

                                            @endif

                                        </td>

                                        <td>

                                            <strong>

                                                {{ $item->title }}

                                            </strong>

                                        </td>

                                        <td>

                                            @if(!empty($item->icon))

                                                <i class="{{ $item->icon }}"></i>

                                                {{ $item->icon }}

                                            @else

                                                <span class="text-muted">

                                                    N/A

                                                </span>

                                            @endif

                                        </td>

                                        <td>

                                            @if($item->status)

                                                <span class="badge badge-success">

                                                    Active

                                                </span>

                                            @else

                                                <span class="badge badge-danger">

                                                    Inactive

                                                </span>

                                            @endif

                                        </td>

                                        <td>

                                            <a href="{{ route('admin.hrb-why-choose.edit', $item->id) }}"
                                               class="btn btn-sm btn-primary">

                                                <i class="fa fa-pencil"></i>

                                                Edit

                                            </a>

                                            <button type="button"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="deleteItem({{ $item->id }})">

                                                <i class="fa fa-trash"></i>

                                                Delete

                                            </button>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="6"
                                            class="text-center py-4 text-muted">

                                            No Data Found

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                    <div class="mt-3">

                        {{ $items->links() }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')

<script>

    function deleteItem(id)
    {
        Swal.fire({

            title: 'Delete Item?',

            text: "This action cannot be undone.",

            icon: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#d33',

            confirmButtonText: 'Yes Delete'

        })

        .then((result) => {

            if (result.isConfirmed) {

                $.ajax({

                    url: "{{ url('admin/hrb-why-choose') }}/" + id,

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

                        $("#row" + id).fadeOut(300, function () {

                            $(this).remove();

                        });

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