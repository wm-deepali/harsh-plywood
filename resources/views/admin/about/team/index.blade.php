@include('admin.top-header')

<div class="main-section">

@include('admin.header')

<div class="app-content container-fluid">

<div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">

    <div class="breadcrumb-wrapper">

        <ol class="breadcrumb bg-transparent mb-0">

            <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">
                    Dashboard
                </a>
            </li>

            <li class="breadcrumb-item">
                <a href="{{ route('admin.about.index') }}">
                    About Us
                </a>
            </li>

            <li class="breadcrumb-item active">
                Team Management
            </li>

        </ol>

    </div>

</div>

<div class="content-wrapper pb-4">

<div class="card shadow-sm">

<div class="card-header">
    <strong>Manage Team</strong>
</div>

<div class="card-body">

<form method="POST"
      enctype="multipart/form-data"
      action="{{ route('admin.about.team.store') }}">

    @csrf

<div class="row">

    <div class="col-md-4">

        <div class="form-group">

            <label>
                Team Image *
            </label>

            <input type="file"
                   name="image"
                   class="form-control"
                   required>

        </div>

    </div>

    <div class="col-md-4">

        <div class="form-group">

            <label>
                Name *
            </label>

            <input type="text"
                   name="title"
                   class="form-control"
                   required>

        </div>

    </div>

    <div class="col-md-4">

        <div class="form-group">

            <label>
                Designation
            </label>

            <input type="text"
                   name="designation"
                   class="form-control">

        </div>

    </div>

</div>

<button type="submit"
        class="btn btn-primary mt-2">

    Add Team Member

</button>

</form>

<hr>

<div class="table-responsive">

<table class="table table-bordered table-hover">

<thead class="thead-light">

<tr>

    <th width="80">
        Image
    </th>

    <th>
        Name
    </th>

    <th>
        Designation
    </th>

    <th width="100">
        Action
    </th>

</tr>

</thead>

<tbody>

@forelse($team as $t)

<tr id="teamRow{{ $t->id }}">

    <td>

        @if($t->image)

            <img src="{{ asset('storage/' . $t->image) }}"
                 width="60"
                 height="60"
                 class="rounded border"
                 style="object-fit:cover;">

        @endif

    </td>

    <td>
        {{ $t->title }}
    </td>

    <td>
        {{ $t->designation }}
    </td>

    <td>

        <button type="button"
                onclick="deleteTeam({{ $t->id }})"
                class="btn btn-sm btn-danger">

            <i class="fa fa-trash"></i>

        </button>

    </td>

</tr>

@empty

<tr>

<td colspan="4"
    class="text-center text-muted">

    No Team Members Found

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

function deleteTeam(id)
{
    Swal.fire({

        title: 'Delete Team Member?',

        icon: 'warning',

        showCancelButton: true,

        confirmButtonColor: '#d33',

        confirmButtonText: 'Delete'

    }).then((result) => {

        if (result.isConfirmed) {

            $.ajax({

                url: "{{ url('admin/about/team/delete') }}/" + id,

                type: "DELETE",

                data: {
                    _token: "{{ csrf_token() }}"
                },

                success: function (res) {

                    $("#teamRow" + id).remove();

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