{{-- resources/views/admin/hrb-brand/index.blade.php --}}

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

                        HRB Brands

                    </li>

                </ol>

            </div>

            <div class="ml-auto mr-2">

                <a href="{{ route('admin.hrb-brands.create') }}"
                   class="btn btn-primary">

                    <i class="fa fa-plus"></i>

                    Add Brand

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

                        All Brands

                    </strong>

                    <span class="badge badge-primary">

                        Total:
                        {{ $brands->total() }}

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

                                        Logo

                                    </th>

                                    <th>

                                        Brand Name

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

                                @forelse($brands ?? [] as $brand)

                                    <tr id="row{{ $brand->id }}">

                                        <td>

                                            {{ $brand->id }}

                                        </td>

                                        <td>

                                            @if(!empty($brand->brand_logo))

                                                <img src="{{ asset('storage/'.$brand->brand_logo) }}"
                                                     width="70"
                                                     height="70"
                                                     class="img-thumbnail"
                                                     style="object-fit: cover;">

                                            @else

                                                <span class="text-muted">

                                                    No Logo

                                                </span>

                                            @endif

                                        </td>

                                        <td>

                                            <strong>

                                                {{ $brand->brand_name }}

                                            </strong>

                                        </td>

                                        <td>

                                            @if($brand->status)

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

                                            <a href="{{ route('admin.hrb-brands.edit', $brand->id) }}"
                                               class="btn btn-sm btn-primary">

                                                <i class="fa fa-pencil"></i>

                                                Edit

                                            </a>

                                            <button type="button"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="deleteBrand({{ $brand->id }})">

                                                <i class="fa fa-trash"></i>

                                                Delete

                                            </button>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="5"
                                            class="text-center py-4 text-muted">

                                            No Brands Found

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                    <div class="mt-3">

                        {{ $brands->links() }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')

<script>

function deleteBrand(id)
{
    Swal.fire({

        title: 'Delete Brand?',

        text: "This action cannot be undone.",

        icon: 'warning',

        showCancelButton: true,

        confirmButtonColor: '#d33',

        confirmButtonText: 'Yes Delete'

    })

    .then((result) => {

        if (result.isConfirmed) {

            $.ajax({

                url: "{{ url('admin/hrb-brands') }}/" + id,

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