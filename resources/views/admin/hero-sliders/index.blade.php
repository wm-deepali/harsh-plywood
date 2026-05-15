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
                        Hero Slider
                    </li>

                </ol>

            </div>

            <div class="ml-auto mr-2">

                <a href="{{ route('admin.hero-sliders.create') }}" class="btn btn-primary">

                    <i class="fa fa-plus"></i>
                    Add Slide

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

                                    <th width="70">
                                        ID
                                    </th>

                                    <th width="100">
                                        Image
                                    </th>

                                    <th>
                                        Heading
                                    </th>

                                    <th>
                                        Button
                                    </th>

                                    <th width="100">
                                        Sort
                                    </th>

                                    <th width="100">
                                        Status
                                    </th>

                                    <th width="120">
                                        Action
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($sliders as $slider)

                                    <tr id="row{{ $slider->id }}">

                                        <td>

                                            {{ $slider->id }}

                                        </td>

                                        <td>

                                            @if($slider->image)

                                                <img src="{{ asset('storage/' . $slider->image) }}" width="80"
                                                    class="rounded border">

                                            @endif

                                        </td>

                                        <td>

                                            <strong>
                                                {{ $slider->heading }}
                                            </strong>

                                            <br>

                                            <small class="text-muted">

                                                {{ $slider->subtitle }}

                                            </small>

                                        </td>

                                        <td>

                                            {{ $slider->button_text ?? '-' }}

                                        </td>

                                        <td>

                                            {{ $slider->sort_order }}

                                        </td>

                                        <td>

                                            @if($slider->status)

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

                                            <a href="{{ route('admin.hero-sliders.edit', $slider->id) }}"
                                                class="btn btn-sm btn-dark">

                                                <i class="fa fa-pencil"></i>

                                            </a>

                                            <button onclick="deleteSlider({{ $slider->id }})" class="btn btn-sm btn-danger">

                                                <i class="fa fa-trash"></i>

                                            </button>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="7" class="text-center text-muted py-4">

                                            No Slides Found

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                        {{ $sliders->links() }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')

<script>

    function deleteSlider(id) {
        Swal.fire({

            title: 'Delete Slide?',

            text: "This action cannot be undone.",

            icon: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#d33',

            confirmButtonText: 'Delete'

        }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({

                    url: "/admin/hero-sliders/" + id,

                    type: "DELETE",

                    data: {

                        _token: "{{ csrf_token() }}"

                    },

                    success: function (res) {

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