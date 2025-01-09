<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Fluency | Register</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/image/logo-circle.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/theme/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard/style-override.css') }}" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center py-5">
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
                                <form action="/register" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ old('name') }}" required autocomplete="off"/>
                                        @error('name')
                                            <div class="invalid-feedback text-start">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" value="{{ old('username') }}" required autocomplete="off"/>
                                        @error('username')
                                            <div class="invalid-feedback text-start">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="off"/>
                                        @error('email')
                                            <div class="invalid-feedback text-start">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone_number" class="form-label">Phone Number</label>
                                        <div class="input-group">
                                            <span class="input-group-text" style="border: 1px solid #DFE5EF;">+62</span>
                                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" id="phone_number" placeholder="8XXXXXXXXXX" value="{{ old('phone_number') }}" required autocomplete="off">
                                        </div>
                                        @error('phone_number')
                                            <div class="invalid-feedback d-block text-start">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="********" required autocomplete="off"/>
                                        @error('password')
                                            <div class="invalid-feedback text-start">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Password Confirmation</label>
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="********" required autocomplete="off"/>
                                        @error('password_confirmation')
                                            <div class="invalid-feedback text-start">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input primary btn-show-password" type="checkbox" id="show_password"/>
                                            <label class="form-check-label text-dark" for="show_password">
                                                Show password
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 fs-4 mb-4 rounded-2 btn-submit">Register</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">Already have an Account? <a class="text-primary fw-bold ms-1" href="/login">Login</a></p>
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
            const passwordConfirm = document.getElementById('password_confirmation')
            if (password.getAttribute('type') == 'password') {
                password.setAttribute('type', 'text')
                passwordConfirm.setAttribute('type', 'text')
            } else {
                password.setAttribute('type', 'password')
                passwordConfirm.setAttribute('type', 'password')
            }
        })
    </script>
</body>
</html>
