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
                        Hero Sections
                    </li>

                </ol>
            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-striped table-hover">

                            <thead class="thead-light">
                                <tr>
                                    <th width="80">ID</th>
                                    <th>Page Name</th>
                                    <th>Heading</th>
                                    <th>Sub Heading</th>
                                    <th width="120">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($heroSections as $hero)

                                    <tr>

                                        <td>{{ $hero->id }}</td>

                                        <td>
                                            <strong>{{ $hero->page_name }}</strong>
                                        </td>

                                        <td>{{ $hero->heading }}</td>

                                        <td>
                                            {{ \Illuminate\Support\Str::limit($hero->sub_heading, 60) }}
                                        </td>

                                        <td>

                                            <a href="{{ route('admin.settings.hero-sections.edit', $hero->id) }}"
                                                class="btn btn-sm btn-outline-dark">
                                                <i class="fa fa-pencil"></i>
                                            </a>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-4">
                                            No Hero Sections Found
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