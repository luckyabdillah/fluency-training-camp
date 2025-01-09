@extends('admin.layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="mb-4">Courses Details</h5>
            <a href="/admin/courses/{{ $course->uuid }}/details/create" class="btn btn-primary me-1 mb-4">Add Detail</a>
            <a href="/admin/courses" class="btn btn-dark mb-4">Back</a>
            <div class="mb-4">
                <label for="course_title" class="form-label">Course</label>
                <input type="text" class="form-control" name="course_title" id="course_title" value="{{ $course->title }}" disabled>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap mb-0 align-middle">
                    <thead class="text-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($courseDetails->count())
                            @foreach ($courseDetails as $detail)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-wrap" style="min-width: 150px;">{{ $detail->title }}</td>
                                    <td class="text-center">...</td>
                                    <td class="text-center">
                                        <a href="/admin/courses/{{ $course->uuid }}/details/{{ $detail->uuid }}" class="btn btn-primary">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                        <a href="/admin/courses/{{ $course->uuid }}/details/{{ $detail->uuid }}/edit" class="btn btn-warning">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <form action="/admin/courses/{{ $course->uuid }}/details/{{ $detail->uuid }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-delete">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="4">No course detail found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- <script>
        $('h5.mb-4').text('edited!')
    </script> --}}
@endpush