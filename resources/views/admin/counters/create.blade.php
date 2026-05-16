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

                        <a href="{{ route('admin.counters.index') }}">

                            Counter Section

                        </a>

                    </li>

                    <li class="breadcrumb-item active">

                        Add Counter

                    </li>

                </ol>

            </div>

        </div>

        <div class="content-wrapper pb-4">

            <form action="{{ route('admin.counters.store') }}"
                  method="POST">

                @csrf

                <div class="card shadow-sm">

                    <div class="card-header">

                        <strong>

                            Add Counter

                        </strong>

                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-6">

                                <label>
                                    Title
                                </label>

                                <input type="text"
                                       name="title"
                                       class="form-control"
                                       required>

                            </div>

                            <div class="col-md-6">

                                <label>
                                    Counter Value
                                </label>

                                <input type="text"
                                       name="counter_value"
                                       class="form-control"
                                       required>

                            </div>

                        </div>

                        <div class="row mt-3">

                            <div class="col-md-6">

                                <label>
                                    Counter Suffix
                                </label>

                                <input type="text"
                                       name="counter_suffix"
                                       class="form-control"
                                       placeholder="+ / K / %">

                            </div>

                            <div class="col-md-6">

                                <label>
                                    Icon Class
                                </label>

                                <input type="text"
                                       name="icon"
                                       class="form-control"
                                       placeholder="fa-regular fa-face-smile">

                            </div>

                        </div>

                        <div class="form-group mt-3">

                            <label>

                                <input type="checkbox"
                                       name="status"
                                       checked>

                                Active

                            </label>

                        </div>

                        <button type="submit"
                                class="btn btn-primary mt-3">

                            Save Counter

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

@include('admin.footer')