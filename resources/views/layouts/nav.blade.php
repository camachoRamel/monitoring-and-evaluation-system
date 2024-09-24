
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary">
<!-- Brand Logo -->
{{-- <a href="index3.html" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
</a> --}}

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex d-flex justify-content-center align-items-center">
    {{-- <div class="image">
        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
    </div> --}}
        <div class="info">
            <a href="#" class="d-block">Admin</a>
        </div>

    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        {{-- available for everyone --}}
        <li class="nav-item">
            <a href="#" class="nav-link">Dashboard</a>
        </li>
        {{-- not available only for student --}}
        <li class="nav-item">
            <a href="#" class="nav-link">Student List</a>
        </li>

        {{-- FOR ADMIN --}}
        ADMIN
        <li class="nav-item">
            <a href="#" class="nav-link">Student Weekly Report</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">OJT Coordinator Info</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">HTE Info</a>
        </li>

        {{-- FOR HTE --}}
        HTE
        <li class="nav-item">
            <a href="#" class="nav-link">Student Weekly Tasks</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Student Weekly Submission</a>
        </li>

        {{-- FOR OJT COORDINATOR --}}
        OJT Coordinator
        <li class="nav-item">
            <a href="#" class="nav-link">Student Weekly Report</a>
        </li>

        {{-- FOR STUDENT --}}
        Student
        <li class="nav-item">
            <a href="#" class="nav-link">Internship Requirements</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Weekly Tasks</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Weekly Submission</a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">Contanct</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">About</a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link"></a>
        </li>
    </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
