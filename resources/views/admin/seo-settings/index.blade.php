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
                        SEO Settings
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
                                    <th>Meta Title</th>
                                    <th width="120">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($seoSettings as $seo)

                                    <tr>

                                        <td>{{ $seo->id }}</td>

                                        <td>
                                            <strong>{{ $seo->page_name }}</strong>
                                        </td>

                                        <td>
                                            {{ \Illuminate\Support\Str::limit($seo->meta_title, 60) }}
                                        </td>

                                        <td>

                                            <a href="{{ route('admin.settings.seo-settings.edit', $seo->id) }}"
                                                class="btn btn-sm btn-outline-dark">
                                                <i class="fa fa-pencil"></i>
                                            </a>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-4">
                                            No SEO Settings Found
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