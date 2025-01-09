@extends('admin.layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="mb-4">Students</h5>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap mb-0 align-middle data-table">
                    <thead class="text-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            @can('admin')
                                <th>#</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($students as $user)
                            <tr>
                                <td style="width: 1px;">{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->student->email }}</td>
                                <td>+62{{ $user->student->phone_number }}</td>
                                @can('admin')
                                    <td>
                                        <button
                                            class="btn btn-primary btn-reset-password"
                                            data-uuid="{{ $user->uuid }}"
                                            data-name="{{ $user->name }}"    
                                        >
                                            <i class="ti ti-key"></i>
                                        </button>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Reset Password Modal -->
    <div class="modal fade" id="resetPasswordModal" tabindex="-1" aria-hidden="true"  data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content px-2">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="resetPasswordModalLabel"></h1>
                </div>
                <form method="post" id="resetPasswordModalForm">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" id="new_password" placeholder="New Password" required autocomplete="off">
                            @error('new_password')
                                <div class="invalid-feedback text-start">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" name="new_password_confirmation" id="new_password_confirmation" placeholder="New Password" required autocomplete="off">
                            @error('new_password_confirmation')
                                <div class="invalid-feedback text-start">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-submit">Submit</button>
                        <button type="button" class="btn btn-dark btn-cancel" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
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
        
        $(document).on('click', '.btn-reset-password', function(e) {
            e.preventDefault()

            const userUuid = $(this).attr('data-uuid')
            const name = $(this).attr('data-name')

            $('#resetPasswordModalLabel').text(`Reset Password: ${name}`)
            $('#resetPasswordModalForm').attr('action', `/admin/users/${userUuid}/reset-password`)

            $('#new_password').val('')
            $('#new_password_confirmation').val('')
            
            $('#resetPasswordModal').modal('show')
        })
    </script>
@endpush