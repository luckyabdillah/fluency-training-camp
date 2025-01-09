<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Fluency | Login</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/image/logo-circle.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/theme/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard/style-override.css') }}" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="/" class="d-block mb-2"><i class="ti ti-arrow-left"></i> Back</a>
                                <a href="/" class="text-nowrap logo-img text-center d-block pb-3 w-100">
                                    <img src="{{ asset('assets/image/logo.png') }}" width="80" alt="Fluency Logo" class="rounded" />
                                </a>
                                <p class="text-center fw-semibold">Fluency — Best English Training Camp in Indonesia</p>
                                <form method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ old('username') }}" required autocomplete="off"/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="********" required autocomplete="off"/>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input primary btn-show-password" type="checkbox" id="show_password"/>
                                            <label class="form-check-label text-dark" for="show_password">
                                                Show password
                                            </label>
                                        </div>
                                        {{-- <a class="text-primary fw-bold" href="javascript:void(0)">Forgot Password ?</a> --}}
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2 btn-submit">Login</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">New to Fluency? <a class="text-primary fw-bold ms-1" href="/register">Create an account</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
    <script src="{{ asset('assets/js/front/script.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/alert.js') }}"></script>
    <script>
        $(document).on('click', '.btn-show-password', function(e) {
            const password = document.getElementById('password')
            if (password.getAttribute('type') == 'password') {
                password.setAttribute('type', 'text')
            } else {
                password.setAttribute('type', 'password')
            }
        })
    </script>
</body>
</html>
