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

                                @forelse($offers as $offer)

                                    <tr id="row{{ $offer->id }}">

                                        <td>
                                            {{ $offer->id }}
                                        </td>

                                        <td>

                                            @if($offer->image)

                                                <img src="{{ asset('storage/'.$offer->image) }}"
                                                    width="70">

                                            @endif

                                        </td>

                                        <td>
                                            {{ $offer->title }}
                                        </td>

                                        <td>

                                            @if($offer->icon)

                                                <i class="{{ $offer->icon }}"></i>

                                                {{ $offer->icon }}

                                            @endif

                                        </td>

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

                                        <td>

                                            <a href="{{ route('admin.hrb-offers.edit', $offer->id) }}"
                                                class="btn btn-sm btn-primary">

                                                Edit

                                            </a>

                                            <button type="button"
                                                class="btn btn-sm btn-danger"
                                                onclick="deleteOffer({{ $offer->id }})">

                                                Delete

                                            </button>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="6"
                                            class="text-center">

                                            No Offers Found

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

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

                    $("#row" + id).remove();

                }

            });

        }

    });
}

</script>