@extends('layouts.main')

@section('content')
    <nav id="hero" class="pb-5 bg-white">
        <div class="container">
            <h5 class="text-center mb-4">All Courses</h5>
            <div class="row justify-content-center mb-5">
                <div class="col-lg-5 col-md-10 col-12">
                    <form>
                        <div class="input-group">
                            <input type="search" name="q" id="q" class="form-control" placeholder="Search..." autocomplete="off" value="{{ request('q') }}">
                            <button type="submit" class="btn btn-my-primary">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row justify-content-center">
                @if ($courses->count())
                    @foreach ($courses as $course)
                        <div class="col-md-4 col-10 mb-3">
                            <div class="card">
                                @if ($course->image_cover)
                                    <img src="/storage/{{ $course->image_cover }}" class="card-img-top" alt="Course Image">
                                @else
                                    <img src="{{ asset('assets/image/logo.png') }}" class="card-img-top" alt="Course Image">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $course->title }}</h5>
                                    <p class="card-text mb-2">{{ substr($course->description, 0, 70) }}...</p>
                                    <p class="card-text mb-2">Mentor: <span class="fw-semibold">{{ $course->mentor }} — {{ ucfirst($course->session_type) }}</span></p>
                                    <p class="card-text text-secondary">{{ $course->price > 0 ? 'IDR ' . number_format($course->price, 0, ',', '.') : 'Free' }}</p>
                                    <a href="/courses/{{ $course->slug }}" class="btn btn-my-primary">Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h6 class="mt-3 mb-5 text-center">No course found.</h6>
                @endif
            </div>
        </div>
    </nav>
    {{-- <nav id="skills" class="py-5 bg-white">
        <div class="container">
            <h3 class="text-center mb-3">Valuable Skills</h3>
            <div class="row justify-content-center text-center">
                <div class="col-md-4 col-6 mb-3 px-5">
                    <img src="{{ asset('assets/image/listening.png') }}" alt="Listening" class="img-fluid rounded-circle mb-2">
                    <span class="fs-5 d-block">Listening</span>
                </div>
                <div class="col-md-4 col-6 mb-3 px-5">
                    <img src="{{ asset('assets/image/listening.png') }}" alt="Listening" class="img-fluid rounded-circle mb-2">
                    <span class="fs-5 d-block">Listening</span>
                </div>
                <div class="col-md-4 col-6 mb-3 px-5">
                    <img src="{{ asset('assets/image/listening.png') }}" alt="Listening" class="img-fluid rounded-circle mb-2">
                    <span class="fs-5 d-block">Listening</span>
                </div>
                <div class="col-md-4 col-6 mb-3 px-5">
                    <img src="{{ asset('assets/image/listening.png') }}" alt="Listening" class="img-fluid rounded-circle mb-2">
                    <span class="fs-5 d-block">Listening</span>
                </div>
                <div class="col-md-4 col-6 mb-3 px-5">
                    <img src="{{ asset('assets/image/listening.png') }}" alt="Listening" class="img-fluid rounded-circle mb-2">
                    <span class="fs-5 d-block">Listening</span>
                </div>
            </div>
        </div>
    </nav> --}}
@endsection