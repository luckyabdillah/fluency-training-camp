@extends('admin.layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="mb-4">Courses List</h5>
            <div class="mb-3">
                <a href="/admin/courses/create" class="btn btn-primary text-nowrap">Add Course</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap mb-0 align-middle data-table">
                    <thead class="text-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Session</th>
                            <th>Schedule</th>
                            <th>Mentor</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-wrap" style="min-width: 150px;">{{ $course->title }}</td>
                                <td class="text-center">
                                    @if ($course->session_type == 'online')
                                        <span class="badge bg-success rounded-3 fw-semibold">online</span>
                                    @else
                                        <span class="badge bg-warning rounded-3 fw-semibold">offline</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <h6 class="fw-semibold mb-1">{{ date('d/m/Y', strtotime($course->schedule_start)) }} - {{ date('d/m/Y', strtotime($course->schedule_end)) }}</h6>
                                </td>
                                <td>{{ $course->mentor }}</td>
                                <td class="text-center">
                                    <a href="/admin/courses/{{ $course->uuid }}/edit" class="btn btn-warning">
                                        <i class="ti ti-edit"></i>
                                    </a>
                                    <form action="/admin/courses/{{ $course->uuid }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-delete-course">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </form>
                                    <div class="dropdown-end d-inline">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-menu"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="/admin/courses/{{ $course->uuid }}/details">Course Details</a></li>
                                            <li><a class="dropdown-item" href="/admin/quizzes/{{ $course->quiz->uuid }}">Quiz</a></li>
                                            <li><a class="dropdown-item" href="/admin/courses/{{ $course->uuid }}/participants">Participants</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/vendor/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script>
        $('.data-table').DataTable({
            autoWidth: false,
            initComplete: function() {
                $(this.api().table().container()).find('input').attr('autocomplete', 'off')
            },
        })

        dataTableContainer = document.querySelector('.dt-bootstrap5')
        dataTableContainer.querySelectorAll('.form-control, .form-select').forEach(form => {
            form.style.display = 'inline-block'
            form.style.width = 'auto'
            form.style.margin = '0 5px'
        })
    </script>
@endpush