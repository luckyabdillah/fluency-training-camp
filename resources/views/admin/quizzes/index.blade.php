@extends('admin.layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="mb-4">Quiz List</h5>
            <a href="/admin/courses" class="btn btn-dark mb-3">Go to Courses</a>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap mb-0 align-middle data-table">
                    <thead class="text-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Course</th>
                            <th>Quiz Description</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quizzes as $quiz)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-wrap" style="min-width: 150px;">{{ $quiz->course->title }}</td>
                                <td class="text-wrap">{{ $quiz->description }}</td>
                                <td class="text-center">
                                    <a href="/admin/quizzes/{{ $quiz->uuid }}" class="btn btn-primary">
                                        <i class="ti ti-eye"></i>
                                    </a>
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