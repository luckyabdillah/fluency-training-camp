<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Fluency | Dashboard</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/image/logo-circle.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/theme/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard/style-override.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard/style.css') }}" />
    @stack('styles')
</head>
<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            @include('admin.partials.sidebar')
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            @include('admin.partials.navbar')
            <!--  Header End -->
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    
    @if (session()->has('success'))
        <div class="flash-data" data-flash="{{ session('success') }}"></div>
    @endif
    @if (session()->has('failed'))
        <div class="flash-data-failed" data-flash="{{ session('failed') }}"></div>
    @endif

    <script src="{{ asset('assets/vendor/theme/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/theme/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/vendor/theme/js/sidebarmenu.js') }}"></script> --}}
    <script src="{{ asset('assets/vendor/theme/js/app.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/vendor/theme/libs/apexcharts/dist/apexcharts.min.js') }}"></script> --}}
    <script src="{{ asset('assets/vendor/theme/libs/simplebar/dist/simplebar.js') }}"></script>
    {{-- <script src="{{ asset('assets/vendor/theme/js/dashboard.js') }}"></script> --}}
    <script src="{{ asset('assets/vendor/libs/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/script.js') }}"></script>
    <script src="{{ asset('assets/js/alert.js') }}"></script>
    @stack('scripts')
</body>
</html>
