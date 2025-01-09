@extends('admin.layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="mb-4">Participants</h5>
            <a href="/admin/courses" class="btn btn-dark mb-3">Back</a>
            <div class="mb-3">
                <label for="course_title" class="form-label">Course</label>
                <input type="text" class="form-control" name="course_title" id="course_title" value="{{ $course->title }}" disabled>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap mb-0 align-middle">
                    <thead class="text-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Photo</th>
                            <th>Student</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @if ($participants->count())
                            @foreach ($participants as $participant)
                                <tr>
                                    <td style="width: 1px;">{{ $loop->iteration }}</td>
                                    <td>
                                        <img
                                            @if ($participant->student->user->photo)
                                                src="{{ asset("storage") . '/' . $participant->student->user->photo }}"
                                            @else
                                                src="{{ asset('assets/vendor/theme/images/profile/user-1.jpg') }}"
                                            @endif
                                            alt="user-avatar"
                                            class="d-block rounded border mx-auto"
                                            height="85"
                                            width="85"
                                        />    
                                    </td>
                                    <td>{{ $participant->student->user->name }}</td>
                                    <td>{{ $participant->student->email }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="3">No participant found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection