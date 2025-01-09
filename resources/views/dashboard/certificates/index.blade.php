@extends('dashboard.layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="mb-4">Certificates</h5>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap mb-0 align-middle data-table">
                    <thead class="text-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Course Title</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($certificates as $certificate)
                            <tr>
                                <td style="width: 1px;">{{ $loop->iteration }}</td>
                                <td>{{ $certificate->course_title }}</td>
                                <td>
                                    <a
                                        href="/dashboard/certificates/{{ $certificate->uuid }}"
                                        class="btn btn-primary"
                                        target="_blank"
                                    >
                                        <i class="ti ti-download"></i>
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