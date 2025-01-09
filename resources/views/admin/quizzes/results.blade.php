@extends('admin.layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="mb-4">Quiz Result</h5>
            <a href="/admin/quizzes/{{ $quiz->uuid }}" class="btn btn-dark mb-3 me-1">Back</a>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap mb-0 align-middle text-center data-table">
                    <thead class="text-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Student</th>
                            <th>Score</th>
                            <th>Submitted At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $result)
                            <tr class="text-center">
                                <td class="text-center" style="width: 1px;">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $result->student->user->name }}</td>
                                <td class="text-center">{{ $result->score }}</td>
                                <td class="text-center">{{ date('d M Y, H:i:s', strtotime($result->created_at)) }}</td>
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