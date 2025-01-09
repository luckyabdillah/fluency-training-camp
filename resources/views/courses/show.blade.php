@extends('layouts.main')

@section('content')
    <nav id="hero" class="pb-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10 col-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($course->image_cover)
                                <div class="text-center">
                                    <img src="/storage/{{ $course->image_cover }}" class="img-fluid rounded mb-2" alt="Course Image">
                                </div>
                            @endif
                            <h5 class="card-title text-center mt-2 mb-3">{{ $course->title }}</h5>
                            <p class="card-text mb-2">{{ $course->description }}</p>
                            <p class="card-text mb-2">Session: <span class="fw-semibold">{{ ucfirst($course->session_type) }}</span></p>
                            <p class="card-text mb-2">Schedule: <span class="fw-semibold">{{ date('d/m/Y', strtotime($course->schedule_start)) }} - {{ date('d/m/Y', strtotime($course->schedule_end)) }}</span></p>
                            <p class="card-text mb-2">Mentor: <span class="fw-semibold">{{ $course->mentor }}</span></p>
                            <p class="card-text">Price: <span class="text-secondary fw-semibold">{{ $course->price > 0 ? 'IDR ' . number_format($course->price, 0, ',', '.') : 'Free' }}</span></p>
                            <form action="/courses/{{ $course->slug }}" method="post" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-my-primary {{ $course->price > 0 ? '' : 'btn-enroll' }}">Enroll this course</button>
                            </form>
                            <a href="/courses" class="btn btn-outline-my-primary btn-cancel">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
@endsection