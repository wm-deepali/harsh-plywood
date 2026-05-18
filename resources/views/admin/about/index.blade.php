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

                    <li class="breadcrumb-item active">

                        About Us Management

                    </li>

                </ol>

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

            {{-- VALIDATION ERRORS --}}
            @if ($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <div class="card shadow-sm">

                <div class="card-header d-flex align-items-center justify-content-between">

                    <strong>

                        Manage About Sections

                    </strong>

                </div>

                <div class="card-body p-0">

                    <div class="table-responsive">

                        <table class="table table-bordered table-hover mb-0">

                            <thead class="thead-light">

                                <tr>

                                    <th width="80">

                                        #

                                    </th>

                                    <th width="250">

                                        Section

                                    </th>

                                    <th>

                                        Details

                                    </th>

                                    <th width="150">

                                        Action

                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                {{-- INTRODUCTION --}}
                                <tr>

                                    <td>

                                        1

                                    </td>

                                    <td>

                                        <strong>

                                            Introduction

                                        </strong>

                                    </td>

                                    <td>

                                        Heading,
                                        Sub Heading,
                                        Experience,
                                        Image,
                                        Detail Content

                                    </td>

                                    <td>

                                        <a href="{{ route('admin.about.introduction.edit') }}"
                                           class="btn btn-sm btn-primary">

                                            <i class="fa fa-pencil"></i>

                                            Edit

                                        </a>

                                    </td>

                                </tr>

                                {{-- HISTORY --}}
                                <tr>

                                    <td>

                                        2

                                    </td>

                                    <td>

                                        <strong>

                                            Our History

                                        </strong>

                                    </td>

                                    <td>

                                        Year,
                                        Heading,
                                        Icon,
                                        Detail Content

                                    </td>

                                    <td>

                                        <a href="{{ route('admin.about.history.edit') }}"
                                           class="btn btn-sm btn-primary">

                                            <i class="fa fa-pencil"></i>

                                            Edit

                                        </a>

                                    </td>

                                </tr>

                                {{-- VISION --}}
                                <tr>

                                    <td>

                                        3

                                    </td>

                                    <td>

                                        <strong>

                                            Our Vision

                                        </strong>

                                    </td>

                                    <td>

                                        Heading,
                                        Icon,
                                        Detail Content,
                                        Points

                                    </td>

                                    <td>

                                        <a href="{{ route('admin.about.vision.edit') }}"
                                           class="btn btn-sm btn-primary">

                                            <i class="fa fa-pencil"></i>

                                            Edit

                                        </a>

                                    </td>

                                </tr>

                                {{-- MISSION --}}
                                <tr>

                                    <td>

                                        4

                                    </td>

                                    <td>

                                        <strong>

                                            Our Mission

                                        </strong>

                                    </td>

                                    <td>

                                        Heading,
                                        Icon,
                                        Detail Content,
                                        Points

                                    </td>

                                    <td>

                                        <a href="{{ route('admin.about.mission.edit') }}"
                                           class="btn btn-sm btn-primary">

                                            <i class="fa fa-pencil"></i>

                                            Edit

                                        </a>

                                    </td>

                                </tr>

                                {{-- EMPTY --}}
                                @if(false)

                                    <tr>

                                        <td colspan="4"
                                            class="text-center text-muted py-4">

                                            No About Sections Found

                                        </td>

                                    </tr>

                                @endif

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')