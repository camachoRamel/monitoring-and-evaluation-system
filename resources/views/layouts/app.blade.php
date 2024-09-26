<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AdminLTE 3 | Fixed Sidebar</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
      </head>

<body class="sidebar-mini layout-fixed" style="height: auto;">
    <div class="wrapper">

        @include('layouts.topbar')

        @include('layouts.sidebar')

        <div class="content-wrapper">
            @yield('content')
        </div>

        {{-- @include('layouts.footer') --}}

    </div>

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>
</html>
