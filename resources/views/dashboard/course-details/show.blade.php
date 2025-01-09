{{-- @extends('dashboard.layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="mb-4">Course: {{ $course->title }}</h5>
            <a href="/dashboard/courses/{{ $course->uuid }}/details" class="btn btn-dark mb-4 me-1">Back</a>
            <a href="/dashboard/courses/{{ $course->uuid }}/details/{{ $detail->uuid }}/edit" class="btn btn-warning mb-4">Edit</a>
            <div class="mb-4">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $detail->title }}" disabled>
            </div>
            <div>
                <h6 class="mb-3 fw-semibold">Content</h6>
                {!! $detail->content !!}
            </div>
        </div>
    </div>
@endsection --}}