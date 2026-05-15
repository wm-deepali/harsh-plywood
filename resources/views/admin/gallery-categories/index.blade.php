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
                Gallery Categories
            </li>

        </ol>

    </div>

    <div class="ml-auto mr-2">

        <a href="{{ route('admin.gallery-categories.create') }}"
           class="btn btn-primary">

            <i class="fa fa-plus"></i>
            Add Category

        </a>

    </div>

</div>

<div class="content-wrapper pb-4">

<div class="card">

<div class="card-body">

<div class="table-responsive">

<table class="table table-striped table-hover">

<thead class="thead-light">

<tr>

    <th width="80">
        ID
    </th>

    <th>
        Name
    </th>

    <th width="120">
        Status
    </th>

    <th width="120">
        Action
    </th>

</tr>

</thead>

<tbody>

@forelse($categories as $category)

<tr id="row{{ $category->id }}">

<td>

    {{ $category->id }}

</td>

<td>

    {{ $category->name }}

</td>

<td>

    @if($category->status)

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

    <a href="{{ route('admin.gallery-categories.edit', $category->id) }}"
       class="btn btn-sm btn-dark">

        <i class="fa fa-pencil"></i>

    </a>

    <button onclick="deleteCategory({{ $category->id }})"
            class="btn btn-sm btn-danger">

        <i class="fa fa-trash"></i>

    </button>

</td>

</tr>

@empty

<tr>

<td colspan="4"
    class="text-center text-muted py-4">

    No Categories Found

</td>

</tr>

@endforelse

</tbody>

</table>

{{ $categories->links() }}

</div>

</div>

</div>

</div>

</div>

</div>

@include('admin.footer')

<script>

function deleteCategory(id)
{
    Swal.fire({

        title: 'Delete Category?',

        text: "This action cannot be undone.",

        icon: 'warning',

        showCancelButton: true,

        confirmButtonColor: '#d33',

        confirmButtonText: 'Delete'

    }).then((result) => {

        if (result.isConfirmed) {

            $.ajax({

                url: "/admin/gallery-categories/" + id,

                type: "DELETE",

                data: {

                    _token: "{{ csrf_token() }}"

                },

                success: function(res) {

                    $("#row" + id).fadeOut(300, function () {

                        $(this).remove();

                    });

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