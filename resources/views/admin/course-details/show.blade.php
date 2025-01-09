@extends('admin.layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="mb-4">Course: {{ $course->title }}</h5>
            <a href="/admin/courses/{{ $course->uuid }}/details" class="btn btn-dark mb-4 me-1">Back</a>
            <a href="/admin/courses/{{ $course->uuid }}/details/{{ $detail->uuid }}/edit" class="btn btn-warning mb-4">Edit</a>
            <div class="row g-3 mb-4">
                <div class="col-md-8">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $detail->title }}" disabled>
                </div>
                <div class="col-md-4">
                    <label for="position" class="form-label">Position</label>
                    <input type="text" class="form-control" name="position" id="position" value="{{ $detail->position }}" disabled>
                </div>
            </div>
            <div>
                <h6 class="mb-3 fw-semibold">Content</h6>
                @if ($detail->slide_embedded_code)
                    <div class="text-center my-3">
                        <iframe src="{{ $detail->slide_embedded_code }}" frameborder="0" width="480" height="299" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
                    </div>
                @endif
                <div class="content mb-3">
                    {!! $detail->content !!}
                </div>
                @if ($detail->pdf_document)
                    <div class="text-end">
                        <a href="{{ asset("storage/$detail->pdf_document") }}" target="_blank" class="btn btn-primary">PDF Document</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection