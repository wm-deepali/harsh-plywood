@include('admin.top-header')

<div class="main-section">

@include('admin.header')

<div class="app-content content container-fluid">

<div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">

    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb bg-transparent mb-0">

            <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>

            <li class="breadcrumb-item active">
                Manage Pages
            </li>

        </ol>
    </div>

    <div class="ml-auto mr-2">
        <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Add Page
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
    <th width="60">ID</th>
    <th>Title</th>
    <th>Slug</th>
    <th width="120">Status</th>
    <th width="120">Action</th>
</tr>
</thead>

<tbody>

@forelse($pages as $p)

<tr id="row{{ $p->id }}">

<td>{{ $p->id }}</td>
<td><strong>{{ $p->title }}</strong></td>
<td>{{ $p->slug }}</td>

<td>
    @if($p->status)
        <span class="badge badge-primary">Active</span>
    @else
        <span class="badge badge-danger">Inactive</span>
    @endif
</td>

<td>

    <a href="{{ route('admin.pages.edit', $p->id) }}"
        class="btn btn-sm btn-outline-dark">
        <i class="fa fa-pencil"></i>
    </a>

    <button class="btn btn-sm btn-outline-danger"
        onclick="deletePage({{ $p->id }})">
        <i class="fa fa-trash"></i>
    </button>

</td>

</tr>

@empty
<tr>
<td colspan="5" class="text-center text-muted py-4">
    No Pages Found
</td>
</tr>
@endforelse

</tbody>

</table>

{{ $pages->links() }}

</div>

</div>
</div>

</div>
</div>

</div>

@include('admin.footer')

<script>

function deletePage(id) {
    Swal.fire({
        title: 'Delete Page?',
        text: "This action cannot be undone.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete'
    })
    .then((result) => {

        if (result.isConfirmed) {

            $.ajax({
                url: "{{ url('admin/pages') }}/" + id,
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function (res) {
                    Swal.fire('Deleted!', res.message, 'success');

                    $("#row" + id).fadeOut(400, function () {
                        $(this).remove();
                    });
                }
            });

        }

    });
}

</script>