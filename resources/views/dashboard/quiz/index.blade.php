@extends('dashboard.layouts.main')

@section('content')
    <input type="hidden" name="quiz_time_limit" value="{{ $quiz->time_limit }}">
    <input type="hidden" name="course_uuid" value="{{ $course->uuid }}">
    <div class="card">
        <div class="card-body">
            <h5 class="mb-4">{{ $quiz->description }}</h5>
            <a href="/dashboard/courses/{{ $course->uuid }}" class="btn btn-dark mb-4 btn-back-quiz">Back</a>
            <div class="row g-3 mb-4">
                <div class="col-md-8">
                    <label for="course" class="form-label">Course</label>
                    <input type="text" class="form-control" name="course" id="course" value="{{ $course->title }}" disabled>
                </div>
                <div class="col-md-4">
                    <label for="time_limit" class="form-label">Time Limit</label>
                    <input type="text" class="form-control" name="time_limit" id="time_limit" value="{{ $quiz->time_limit >= 10 ? $quiz->time_limit : '0' . $quiz->time_limit }}:00" disabled>
                </div>
            </div>
            <div>
                <form action="/dashboard/courses/{{ $course->uuid }}/quiz" method="post">
                    @csrf
                    <ol>
                        @php
                            $i = 0
                        @endphp
                        @foreach ($questions as $question)
                            <li class="mb-3">
                                <span class="d-inline-block mb-2">{{ $question->question }}</span>
                                @foreach ($question->options as $option)
                                    <div class="form-check mb-2">
                                        <input type="hidden" name="questions[{{ $i }}][id]" value="{{ $question->id }}">
                                        <input class="form-check-input" type="radio" name="questions[{{ $i }}][answer]" value="{{ $option->id }}" id="option-{{ $option->id }}">
                                        <label class="form-check-label" for="option-{{ $option->id }}">
                                            {{ $option->option_text }}
                                        </label>
                                    </div>
                                @endforeach                     
                            </li>
                            @php
                                $i++
                            @endphp
                        @endforeach
                    </ol>
                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-primary btn-submit btn-confirm-quiz">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const timeLimit = document.querySelector('[name="quiz_time_limit"]').value
        let timeLimitInSeconds = parseInt(timeLimit, 10) * 60
        let runningTime = 0
        
        const interval = setInterval(() => {
            runningTime += 1
            
            let minutes = Math.floor((timeLimitInSeconds - runningTime) / 60)
            let seconds = Math.floor((timeLimitInSeconds - runningTime) % 60)

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;
            
            document.querySelector('#time_limit').value = minutes + ':' + seconds
            
            if (runningTime >= timeLimitInSeconds) {
                clearInterval(interval)
                document.querySelector('#time_limit').value = 'Time up, quiz will submit now'
            }
        }, 1000);
    </script>
@endpush