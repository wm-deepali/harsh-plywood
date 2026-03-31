<!-- fixed-top-->
<div class="row d-none">
    <!-- success message open -->
    <div class="col-10">
        @if(session()->get('success'))
            <div class="alert alert-info alert-dismissible fade in">
                <a href="javascript:void(0);" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ session()->get('success') }}
            </div>
        @endif

        @if(session()->get('error'))
            <div class="alert alert-danger alert-dismissible fade in">
                <a href="javascript:void(0);" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error!</strong> {{ session()->get('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <!-- success message close -->
</div>
<div id='cssmenu'>
    <ul class="pt-0">

        <!-- Dashboard -->
        <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <i class="fa-solid fa-gauge"></i> Dashboard
            </a>
        </li>



        <!-- FAQ & Blogs -->
        <li class="{{ request()->routeIs('admin.faqs.*', 'admin.blogs.*') ? 'active' : '' }}">
            <a href="#">
                <i class="fa-solid fa-blog"></i> FAQ & Blogs
            </a>

            <ul>

                <li class="{{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.faqs.index') }}">
                        Manage FAQ
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.blogs.index') }}">
                        Manage Blogs
                    </a>
                </li>

            </ul>
        </li>



    </ul>
</div>