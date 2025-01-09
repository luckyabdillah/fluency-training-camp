@extends('dashboard.layouts.main')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="mb-4">My Courses</h5>
            <form>
                <label for="q" class="form-label">Filter</label>
                <div class="input-group">
                    <input type="search" name="q" id="q" class="form-control" placeholder="Search courses or mentor name" autocomplete="off" value="{{ request('q') }}">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    
    @if ($enrollments->count())
        @foreach ($enrollments as $enrollment)
            <div class="card shadow mb-3">
                <div class="card-body py-3">
                    <div class="row gap-3">
                        @if ($enrollment->course->image_cover)
                            <div class="col-md-2 rounded-2 bg-primary" style="background-position: center; background-size: cover; background-repeat: no-repeat; background-image: url({{ asset('storage') . '/' . $enrollment->course->image_cover }})">
                            </div>
                        @else
                            <div class="col-md-2 rounded-2 bg-primary" style="background-position: center; background-size: cover; background-repeat: no-repeat; background-image: url({{ asset('assets/image/logo.png') }})">
                            </div>
                        @endif
                        <div class="col">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="course-details">
                                    <h5>{{ $enrollment->course->title }}</h5>
                                    <p class="card-text mb-2">Session: <span class="fw-semibold">{{ ucfirst($enrollment->course->session_type) }}</span></p>
                                    <p class="card-text mb-2">Mentor: <span class="fw-semibold">{{ $enrollment->course->mentor }}</span></p>
                                    <p class="card-text mb-2">Schedule: <span class="fw-semibold">{{ date('d/m/Y', strtotime($enrollment->course->schedule_start)) }} - {{ date('d/m/Y', strtotime($enrollment->course->schedule_end)) }}</span></p>
                                </div>
                                <div class="course-action">
                                    @if ($enrollment->status == 'pending')
                                        <button class="btn btn-warning" disabled>Pending</button>
                                    @elseif ($enrollment->status == 'completed')
                                        <a href="/dashboard/courses/{{ $enrollment->course->uuid }}" class="btn btn-success">Completed</a>
                                    @else
                                        @if (strtotime('now') > strtotime($enrollment->course->schedule_end))
                                            <button class="btn btn-danger" disabled>Expired</button>
                                        @else
                                            <a href="/dashboard/courses/{{ $enrollment->course->uuid }}" class="btn btn-primary d-block mb-1">Details</a>
                                            <form action="/dashboard/courses/{{ $enrollment->course->uuid }}/unenroll" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-unenroll">Unenroll</button>
                                            </form>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-warning">
            {{ request('q') ? 'No match courses' : 'You don\'t have any courses yet' }}
        </div>
    @endif

    <div class="mt-2">
        {{ $enrollments->links() }}
    </div>

@endsection