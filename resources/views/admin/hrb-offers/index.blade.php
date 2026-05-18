{{-- resources/views/admin/hrb-offers/index.blade.php --}}

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

                        What We Offer

                    </li>

                </ol>

            </div>

            <div class="ml-auto mr-2">

                <a href="{{ route('admin.hrb-offers.create') }}"
                   class="btn btn-primary">

                    <i class="fa fa-plus"></i>

                    Add Offer

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

                        All Offers

                    </strong>

                    <span class="badge badge-primary">

                        Total:
                        {{ $offers->total() }}

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

                                @forelse($offers ?? [] as $offer)

                                    <tr id="row{{ $offer->id }}">

                                        {{-- ID --}}
                                        <td>

                                            {{ $offer->id }}

                                        </td>

                                        {{-- IMAGE --}}
                                        <td>

                                            @if(!empty($offer->image))

                                                <img src="{{ asset('storage/'.$offer->image) }}"
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

                                        {{-- TITLE --}}
                                        <td>

                                            <strong>

                                                {{ $offer->title }}

                                            </strong>

                                        </td>

                                        {{-- ICON --}}
                                        <td>

                                            @if(!empty($offer->icon))

                                                <i class="{{ $offer->icon }}"></i>

                                                <span class="ml-1">

                                                    {{ $offer->icon }}

                                                </span>

                                            @else

                                                <span class="text-muted">

                                                    N/A

                                                </span>

                                            @endif

                                        </td>

                                        {{-- STATUS --}}
                                        <td>

                                            @if($offer->status)

                                                <span class="badge badge-success">

                                                    Active

                                                </span>

                                            @else

                                                <span class="badge badge-danger">

                                                    Inactive

                                                </span>

                                            @endif

                                        </td>

                                        {{-- ACTION --}}
                                        <td>

                                            <a href="{{ route('admin.hrb-offers.edit', $offer->id) }}"
                                               class="btn btn-sm btn-primary">

                                                <i class="fa fa-pencil"></i>

                                                Edit

                                            </a>

                                            <button type="button"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="deleteOffer({{ $offer->id }})">

                                                <i class="fa fa-trash"></i>

                                                Delete

                                            </button>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="6"
                                            class="text-center py-4 text-muted">

                                            No Offers Found

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                    {{-- PAGINATION --}}
                    <div class="mt-3">

                        {{ $offers->links() }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')

<script>

    function deleteOffer(id)
    {
        Swal.fire({

            title: 'Delete Offer?',

            text: "This action cannot be undone.",

            icon: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#d33',

            confirmButtonText: 'Yes Delete'

        })

        .then((result) => {

            if (result.isConfirmed) {

                $.ajax({

                    url: "{{ url('admin/hrb-offers') }}/" + id,

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