@extends('dashboard.layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="mb-4">Course: {{ $course->title }}</h5>
            <div class="mb-3">
                @if ($quizResult)
                    <button class="btn btn-success me-1">Passed Quiz &nbsp;|&nbsp; Score: {{ $quizResult->score }}</button>
                @else
                    <a href="/dashboard/courses/{{ $course->uuid }}/quiz" class="btn btn-primary me-1">Attempt Quiz</a>
                @endif
                <a href="/dashboard/courses" class="btn btn-dark">Back</a>
            </div>
            <span class="form-label d-block mt-4 mb-3">Course Details</span>
            @foreach ($courseDetails as $detail)
                <div class="accordion mb-3" id="accordion{{ $loop->iteration }}">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->iteration }}" aria-expanded="true" aria-controls="collapse{{ $loop->iteration }}">
                                {{ $detail->title }}
                            </button>
                        </h2>
                        <div id="collapse{{ $loop->iteration }}" class="accordion-collapse collapse" data-bs-parent="#accordion{{ $loop->iteration }}">
                            <div class="accordion-body">
                                @if ($detail->slide_embedded_code)
                                    <div class="text-center my-3">
                                        <iframe src="{{ $detail->slide_embedded_code }}" frameborder="0" width="100%" height="299" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
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
                </div>
            @endforeach
        </div>
    </div>
@endsection
