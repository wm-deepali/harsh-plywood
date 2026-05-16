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
                        HRB Enquiries
                    </li>

                </ol>

            </div>

            <div class="ml-auto mr-2">

                <button onclick="bulkDelete()"
                        class="btn btn-danger">

                    <i class="fa fa-trash"></i>

                    Delete Selected

                </button>

            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card">

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-striped table-hover">

                            <thead class="thead-light">

                                <tr>

                                    <th>
                                        <input type="checkbox"
                                               id="selectAll">
                                    </th>

                                    <th>ID</th>

                                    <th>Name</th>

                                    <th>Email</th>

                                    <th>Phone</th>

                                    <th>Subject</th>

                                    <th>Message</th>

                                    <th>Date</th>

                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($enquiries as $e)

                                    <tr id="row{{ $e->id }}">

                                        <td>

                                            <input type="checkbox"
                                                   class="rowCheckbox"
                                                   value="{{ $e->id }}">

                                        </td>

                                        <td>{{ $e->id }}</td>

                                        <td>{{ $e->name }}</td>

                                        <td>{{ $e->email }}</td>

                                        <td>{{ $e->phone }}</td>

                                        <td>{{ $e->subject }}</td>

                                        <td width="250">

                                            {{ \Illuminate\Support\Str::limit($e->message, 80) }}

                                        </td>

                                        <td>

                                            {{ $e->created_at->format('d M Y') }}

                                        </td>

                                        <td>

                                            <button onclick="deleteEnquiry({{ $e->id }})"
                                                    class="btn btn-sm btn-outline-danger">

                                                <i class="fa fa-trash"></i>

                                            </button>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="9"
                                            class="text-center">

                                            No Data Found

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                        {{ $enquiries->links() }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')

<script>

    document.getElementById('selectAll')
        .addEventListener('click', function () {

            document.querySelectorAll('.rowCheckbox')
                .forEach(cb => {

                    cb.checked = this.checked;

                });

        });

    function deleteEnquiry(id) {

        Swal.fire({
            title: 'Delete?',
            icon: 'warning',
            showCancelButton: true
        }).then(result => {

            if (result.isConfirmed) {

                $.ajax({

                    url: "/admin/hrb-enquiries/" + id,

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

                    }

                });

            }

        });

    }

    function bulkDelete() {

        let ids = [];

        document.querySelectorAll('.rowCheckbox:checked')
            .forEach(cb => {

                ids.push(cb.value);

            });

        if (ids.length === 0) {

            alert('Select at least one');

            return;

        }

        Swal.fire({
            title: 'Delete selected?',
            icon: 'warning',
            showCancelButton: true
        }).then(result => {

            if (result.isConfirmed) {

                $.ajax({

                    url: "{{ route('admin.hrb-enquiries.bulkDelete') }}",

                    type: "POST",

                    data: {

                        _token: "{{ csrf_token() }}",

                        ids: ids

                    },

                    success: function () {

                        location.reload();

                    }

                });

            }

        });

    }

</script>