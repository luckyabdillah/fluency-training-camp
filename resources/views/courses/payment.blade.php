<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fluency | English Training Camp in Indonesia</title>
    {{-- <link rel="stylesheet" href="{{ asset('assets/vendor/theme/css/styles.min.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/front/style-override.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/front/style.css') }}" />
    <link rel="shortcut icon" href="{{ asset('assets/image/logo-circle.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body class="body-payment">

    <div class="form-container">
        <h4 class="text-center">Payment Confirmation</h4>
        <form class="form-payment" method="post" action="/courses/{{ $course->slug }}/payment" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="course" class="form-label">Course</label>
                <input type="text" class="form-control" id="course" name="course" value="{{ $course->title }}" disabled/>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ number_format($course->price, 0, ',', '.') }}" disabled/>
                </div>
                <div class="col-md-8 mb-3">
                    <label for="payment_to" class="form-label">Payment To</label>
                    <input type="text" class="form-control" id="payment_to" name="payment_to" value="123123123 — Fluency Training Camp (BNI)" disabled/>
                </div>
            </div>
            <div class="mb-3">
                <label for="payment_receipt" class="form-label">Upload Payment Receipt</label>
                <input type="file" name="payment_receipt" id="payment_receipt" class="form-control @error('payment_receipt') is-invalid @enderror" accept=".jpg, .jpeg, .png" required>
                @error('payment_receipt')
                    <div class="invalid-feedback text-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="btn-container mt-4">
                <button type="submit" class="btn btn-custom btn-submit me-1">Submit</button>
                <a href="/courses/{{ $course->slug }}" class="btn btn-custom btn-cancel">Back</a>
            </div>
        </form>
    </div>

    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/front/script.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/alert.js') }}"></script>
</body>
</html>