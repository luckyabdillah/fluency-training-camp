@extends('admin.layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="mb-4">Verficiations</h5>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap mb-0 align-middle data-table">
                    <thead class="text-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Course</th>
                            <th>Price</th>
                            <th>Student</th>
                            <th>Payment Receipt</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($enrollments as $enrollment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-start">{{ $enrollment->course->title }}</td>
                                <td>{{ number_format($enrollment->course->price, 0, ',', '.') }}</td>
                                <td>{{ $enrollment->student->user->name }}</td>
                                <td>
                                    <a href="{{ asset("storage/$enrollment->payment_receipt") }}" target="_blank">
                                        <img src="{{ asset("storage/$enrollment->payment_receipt") }}" alt="Payment Receipt" class="img-fluid" width="150">
                                    </a>
                                </td>
                                <td>
                                    <form action="/admin/verifications/{{ $enrollment->uuid }}" method="post" class="d-inline">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-success btn-confirm">
                                            <i class="ti ti-check"></i>
                                        </button>
                                    </form>
                                    <form action="/admin/verifications/{{ $enrollment->uuid }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-reject">
                                            <i class="ti ti-x"></i>
                                        </button>
                                    </form>
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