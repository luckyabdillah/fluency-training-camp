@extends('admin.layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="mb-4">Add New Course Detail</h5>
            <a href="/admin/courses/{{ $course->uuid }}/details" class="btn btn-dark mb-4">Back</a>
            <form action="/admin/courses/{{ $course->uuid }}/details" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row g-3 mb-3">
                    <div class="col-md-8">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Title" value="{{ old('title') }}" autocomplete="off" required maxlength="100">
                        @error('title')
                            <div class="invalid-feedback text-start">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="position" class="form-label">Position</label>
                        <input type="number" min="1" class="form-control @error('position') is-invalid @enderror" name="position" id="position" placeholder="Position" value="{{ old('position', 1) }}" autocomplete="off" required>
                        @error('position')
                            <div class="invalid-feedback text-start">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="pdf_document" class="form-label">PDF Document</label>
                        <input type="file" class="form-control @error('pdf_document') is-invalid @enderror" name="pdf_document" id="pdf_document" accept=".pdf">
                        @error('pdf_document')
                            <div class="invalid-feedback text-start">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="slide_embedded_code" class="form-label">Slide Embedded Code</label>
                        <input type="text" class="form-control @error('slide_embedded_code') is-invalid @enderror" name="slide_embedded_code" id="slide_embedded_code" placeholder="Slide Embedded Code" value="{{ old('slide_embedded_code') }}" autocomplete="off">
                        @error('slide_embedded_code')
                            <div class="invalid-feedback text-start">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" autocomplete="off">{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback text-start fs-3 fw-bold">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-submit">Submit</button>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/summernote/summernote-bs5.min.css') }}" />
@endpush

@push('scripts')
    <script src="{{ asset('assets/vendor/libs/summernote/summernote-bs5.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', e => {
            $('#content').summernote({
                height: 200,
                placeholder: "Input course content"
            })
        })
    </script>
@endpush