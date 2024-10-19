<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Fluency | Dashboard</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/image/logo-circle.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/theme/css/styles.min.css') }}" />
    @stack('styles')
</head>
<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            @include('dashboard.partials.sidebar')
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            @include('dashboard.partials.navbar')
            <!--  Header End -->
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/vendor/theme/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/theme/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/theme/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/vendor/theme/js/app.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/vendor/theme/libs/apexcharts/dist/apexcharts.min.js') }}"></script> --}}
    <script src="{{ asset('assets/vendor/theme/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('assets/vendor/theme/js/dashboard.js') }}"></script>
    @stack('scripts')
</body>
</html>
