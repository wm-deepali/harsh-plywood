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
            <li class="breadcrumb-item active">Gallery</li>
        </ol>
    </div>

    <div class="ml-auto mr-2">
        <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Add Image
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
    <th>ID</th>
    <th>Image</th>
    <th>Title</th>
    <th>Status</th>
    <th>Action</th>
</tr>
</thead>

<tbody>

@forelse($galleries as $g)

<tr id="row{{ $g->id }}">

<td>{{ $g->id }}</td>

<td>
    <img src="{{ asset('storage/'.$g->image) }}" width="80">
</td>

<td>{{ $g->title ?? '-' }}</td>

<td>
    @if($g->status)
        <span class="badge badge-success">Active</span>
    @else
        <span class="badge badge-danger">Inactive</span>
    @endif
</td>

<td>
    <a href="{{ route('admin.galleries.edit',$g->id) }}" class="btn btn-sm btn-dark">
        <i class="fa fa-pencil"></i>
    </a>

    <button onclick="deleteGallery({{ $g->id }})"
        class="btn btn-sm btn-danger">
        <i class="fa fa-trash"></i>
    </button>
</td>

</tr>

@empty
<tr>
<td colspan="5" class="text-center">No Data</td>
</tr>
@endforelse

</tbody>

</table>

{{ $galleries->links() }}

</div>

</div>
</div>

</div>
</div>

</div>

@include('admin.footer')

<script>
function deleteGallery(id){
    Swal.fire({
        title: 'Delete?',
        icon: 'warning',
        showCancelButton: true
    }).then(result=>{
        if(result.isConfirmed){
            $.ajax({
                url: "/admin/galleries/"+id,
                type: "DELETE",
                data: {_token:"{{ csrf_token() }}"},
                success:function(){
                    $("#row"+id).remove();
                }
            });
        }
    });
}
</script>