<nav class="app-header navbar navbar-expand bg-body"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i class="bi bi-list"></i> </a> </li>
            @if (Auth::user()->role == '0')
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route("admin.create-account-page") }}" class="nav-link text-primary">Create Account</a>
                </li>
                <li class="nav-item d-none d-md-block"> <a href="{{ route("admin.view-records") }}" class="nav-link">Records History</a> </li>
            @endif
            <li class="nav-item d-none d-md-block"> <a href="{{ route('about-us') }}" class="nav-link">About</a> </li>
            <li class="nav-item d-none d-md-block"> <a href="{{ route('contact-us') }}" class="nav-link">Contact Us</a> </li>
        </ul> <!--end::Start Navbar Links--> <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto"> <!--begin::Navbar Search-->
            <form action="{{ route('logout') }}" method="post" id="logout-form-2" class="m-0 p-0">
                @csrf
                <li class="nav-item">
                    <button type="submit" class="nav-link text-danger">Log out</button>
                </li>
            </form>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-settings" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile.edit-page') }}">
                    <i class="bi bi-person-circle"></i>
                </a>
            </li>
            <li class="nav-item"> <a class="nav-link" href="#" data-lte-toggle="fullscreen"> <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i> <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i> </a>
            </li> <!--end::Fullscreen Toggle-->

        </ul> <!--end::End Navbar Links-->
    </div> <!--end::Container-->
</nav> <!--end::Header--> <!--begin::Sidebar-->
