{{-- resources/views/admin/products/index.blade.php --}}

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

                    <li class="breadcrumb-item active">
                        Manage Products
                    </li>

                </ol>

            </div>

            <div class="ml-auto mr-2">

                <a href="{{ route('admin.products.create') }}"
                   class="btn btn-primary">

                    <i class="fa fa-plus"></i>
                    Add Product

                </a>

            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Manage Products</strong>
                </div>

                <div class="card-body">

                    {{-- Success Message --}}
                    @if(session('success'))

                        <div class="alert alert-success">

                            {{ session('success') }}

                        </div>

                    @endif

                    <div class="table-responsive">

                        <table class="table table-striped table-hover align-middle">

                            <thead class="thead-light">

                                <tr>

                                    <th width="60">ID</th>

                                    <th width="90">Image</th>

                                    <th>Product Name</th>

                                    <th>Category</th>

                                    <th width="120">Status</th>

                                    <th width="140">Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($products as $p)

                                    <tr id="row{{ $p->id }}">

                                        <td>
                                            {{ $p->id }}
                                        </td>

                                        <td>

                                            @if($p->images->count())

                                                <img src="{{ asset('storage/' . $p->images->first()->image) }}"
                                                     width="60"
                                                     height="60"
                                                     class="rounded border"
                                                     style="object-fit:cover;">

                                            @else

                                                <span class="text-muted small">
                                                    No Image
                                                </span>

                                            @endif

                                        </td>

                                        <td>

                                            <strong>
                                                {{ $p->name }}
                                            </strong>

                                            @if($p->product_info)

                                                <br>

                                                <small class="text-muted">

                                                    {{ \Illuminate\Support\Str::limit(strip_tags($p->product_info), 60) }}

                                                </small>

                                            @endif

                                        </td>

                                        <td>

                                            {{ $p->category->name ?? '-' }}

                                        </td>

                                        <td>

                                            @if($p->status)

                                                <span class="badge badge-primary">
                                                    Active
                                                </span>

                                            @else

                                                <span class="badge badge-danger">
                                                    Inactive
                                                </span>

                                            @endif

                                        </td>

                                        <td>

                                            <a href="{{ route('admin.products.edit', $p->id) }}"
                                               class="btn btn-sm btn-outline-dark">

                                                <i class="fa fa-pencil"></i>

                                            </a>

                                            <button class="btn btn-sm btn-outline-danger"
                                                    onclick="deleteProduct({{ $p->id }})">

                                                <i class="fa fa-trash"></i>

                                            </button>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="6"
                                            class="text-center text-muted py-4">

                                            No Products Found

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                        {{ $products->links() }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')

<script>

function deleteProduct(id) {

    Swal.fire({

        title: 'Delete Product?',

        text: "This action cannot be undone.",

        icon: 'warning',

        showCancelButton: true,

        confirmButtonColor: '#d33',

        cancelButtonColor: '#6c757d',

        confirmButtonText: 'Yes, Delete'

    }).then((result) => {

        if (result.isConfirmed) {

            $.ajax({

                url: "{{ url('admin/products') }}/" + id,

                type: "DELETE",

                data: {
                    _token: "{{ csrf_token() }}"
                },

                success: function (res) {

                    $("#row" + id).remove();

                    Swal.fire(
                        'Deleted!',
                        res.message,
                        'success'
                    );

                },

                error: function () {

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