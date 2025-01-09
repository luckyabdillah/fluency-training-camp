<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fluency | Best English Training Camp in Indonesia</title>
    {{-- <link rel="stylesheet" href="{{ asset('assets/vendor/theme/css/styles.min.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/front/style-override.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/front/style.css') }}" />
    <link rel="shortcut icon" href="{{ asset('assets/image/logo-circle.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
</head>
<body class="bg-primary-subtle">
    <!-- Navbar -->
    <header class="w-100 fixed-top" style="background-color: transparent">
        <nav class="navbar navbar-expand-lg py-3" style="background-color: #1e2952" data-bs-theme="dark">
            <div class="container">
                <a class="navbar-brand brand-logo fw-bold title-fluency" href="/">
                    <img src="{{ asset('assets/image/logo.png') }}" class="me-1 rounded" alt="Fluency Logo">
                    <span class="text-brand">Fluency</span>
                </a>
                <button class="navbar-toggler border-0" id="navbar-button" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header mb-0 pb-0">
                        <h5 class="offcanvas-title brand-logo fw-bold" id="offcanvasNavbarLabel">
                            <img src="{{ asset('assets/image/logo.png') }}" class="me-1 rounded" alt="Fluency Logo"> 
                            <span class="text-brand">Fluency</span>
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-center flex-grow-1">
                            <li class="nav-item pe-3">
                                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
                            </li>
                            <li class="nav-item pe-3">
                                <a class="nav-link {{ Request::is('courses*') ? 'active' : '' }}" href="/courses">Courses</a>
                            </li>
                            <li class="nav-item pe-3">
                                <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">About</a>
                            </li>
                            <li class="nav-item pe-3">
                                <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="/contact">Contact</a>
                            </li>
                        </ul>
                        @if (auth()->user())
                            <a href="{{ auth()->user()->role == 'student' ? '/dashboard' : '/admin' }}" class="btn btn-my-primary d-block rounded-4">
                                <i class="ti ti-user fs-4"></i>
                            </a>
                        @else
                            <a href="/login" class="btn-login">Login</a>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    </header>
    
    <!-- End Navbar -->

    <div class="wrapper">
        @yield('content')
    </div>

    <footer class="footer py-5 bg-secondary-solid">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-4 col-12 mb-2">
                    <h5 class="brand-logo fw-semibold"><img src="{{ asset('assets/image/logo.png') }}" class="me-1 rounded" alt="Fluency Logo"> <span class="title-footer text-brand">Fluency</span></h5>
                    <p>Fluency is one of the best English training camp websites in Indonesia, offering innovative learning experiences to help you master English effectively.</p>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <h5>Navigation</h5>
                    <a href="/" class="nav-link mt-3">Home</a>
                    <a href="/courses" class="d-block nav-link mt-2">Courses</a>
                    <a href="/about" class="d-block nav-link mt-2">About</a>
                    <a href="/contact" class="d-block nav-link mt-2">Contact</a>
                </div>
                <div class="col-md-3 col-6">
                    <h5>Social Media</h5>
                    <p>Stay update with our latest</p>
                    <a href="javascript:void(0)" class="nav-link d-inline-block"><i class="ti ti-brand-instagram fs-3"></i></a>
                    <a href="javascript:void(0)" class="nav-link d-inline-block"><i class="ti ti-brand-tiktok fs-3"></i></a>
                    <a href="javascript:void(0)" class="nav-link d-inline-block"><i class="ti ti-brand-linkedin fs-3"></i></a>
                    <a href="javascript:void(0)" class="nav-link d-inline-block"><i class="ti ti-mail fs-3"></i></a>
                </div>
            </div>
        </div>
    </footer>

    @if (session()->has('success'))
        <div class="flash-data" data-flash="{{ session('success') }}"></div>
    @endif
    @if (session()->has('failed'))
        <div class="flash-data-failed" data-flash="{{ session('failed') }}"></div>
    @endif

    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/front/script.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/alert.js') }}"></script>
    @stack('scripts')
</body>
</html>