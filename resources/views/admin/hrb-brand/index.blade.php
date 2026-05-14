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

            <div class="card shadow-sm">

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-hover">

                            <thead class="thead-light">

                                <tr>

                                    <th>ID</th>

                                    <th>Logo</th>

                                    <th>Brand Name</th>

                                    <th>Status</th>

                                    <th width="120">
                                        Action
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($brands as $brand)

                                    <tr id="row{{ $brand->id }}">

                                        <td>
                                            {{ $brand->id }}
                                        </td>

                                        <td>

                                            @if($brand->brand_logo)

                                                <img src="{{ asset('storage/'.$brand->brand_logo) }}"
                                                    width="80">

                                            @endif

                                        </td>

                                        <td>
                                            {{ $brand->brand_name }}
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

                                                Edit

                                            </a>

                                            <button type="button"
                                                class="btn btn-sm btn-danger"
                                                onclick="deleteBrand({{ $brand->id }})">

                                                Delete

                                            </button>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="5"
                                            class="text-center">

                                            No Brands Found

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

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

                    $("#row" + id).remove();

                }

            });

        }

    });
}

</script>