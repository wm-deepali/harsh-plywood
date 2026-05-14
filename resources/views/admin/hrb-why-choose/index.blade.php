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

            <div class="card">

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-hover">

                            <thead class="thead-light">

                                <tr>

                                    <th>ID</th>

                                    <th>Image</th>

                                    <th>Title</th>

                                    <th>Icon</th>

                                    <th>Status</th>

                                    <th width="120">
                                        Action
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($items as $item)

                                    <tr id="row{{ $item->id }}">

                                        <td>
                                            {{ $item->id }}
                                        </td>

                                        <td>

                                            @if($item->image)

                                                <img src="{{ asset('storage/'.$item->image) }}"
                                                    width="70">

                                            @endif

                                        </td>

                                        <td>
                                            {{ $item->title }}
                                        </td>

                                        <td>

                                            @if($item->icon)

                                                <i class="{{ $item->icon }}"></i>

                                                {{ $item->icon }}

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

                                                Edit

                                            </a>

                                            <button type="button"
                                                class="btn btn-sm btn-danger"
                                                onclick="deleteItem({{ $item->id }})">

                                                Delete

                                            </button>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="6"
                                            class="text-center">

                                            No Data Found

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

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

                    $("#row" + id).remove();

                }

            });

        }

    });
}

</script>