@extends('admin.layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="mb-4">Users</h5>
            <button class="btn btn-primary btn-add mb-3">Add User</button>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap mb-0 align-middle data-table">
                    <thead class="text-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($users as $user)
                            <tr>
                                <td style="width: 1px;">{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ ucfirst($user->role) }}</td>
                                <td>
                                    <button
                                        class="btn btn-primary btn-reset-password"
                                        data-uuid="{{ $user->uuid }}"
                                        data-name="{{ $user->name }}"    
                                    >
                                        <i class="ti ti-key"></i>
                                    </button>
                                    <button
                                        class="btn btn-warning btn-edit"
                                        data-user='{
                                            "uuid":"{{ $user->uuid }}",
                                            "name":"{{ $user->name }}",
                                            "username":"{{ $user->username }}",
                                            "role":"{{ $user->role }}"
                                        }'    
                                    >
                                        <i class="ti ti-edit"></i>
                                    </button>
                                    <form action="/admin/users/{{ $user->uuid }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-delete">
                                            <i class="ti ti-trash"></i>
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
    
    <!-- User Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" aria-hidden="true"  data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content px-2">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="userModalLabel"></h1>
                </div>
                <form method="post" id="userModalForm">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name" required autocomplete="off">
                            @error('name')
                                <div class="invalid-feedback text-start">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username" required autocomplete="off">
                            @error('username')
                                <div class="invalid-feedback text-start">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="role" class="form-select" required>
                                <option value="staff">Staff</option>
                                <option value="admin">Admin</option>
                            </select>
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

        $(document).on('click', '.btn-add', function(e) {
            e.preventDefault()
            $('#userModalLabel').text('Add New User')
            $('#userModalForm').attr('action', `/admin/users`)

            $('#name').val('')
            $('#username').val('')
            $('#role').val('staff')
            
            $('#userModal').modal('show')
        })

        $(document).on('click', '.btn-edit', function(e) {
            e.preventDefault()
            $('#userModalForm').prepend('@method("put")')
            $('#userModalLabel').text('Edit User')

            let data = JSON.parse($(this).attr('data-user'))

            $('#userModalForm').attr('action', `/admin/users/${data.uuid}`)

            $('#name').val(data.name)
            $('#username').val(data.username)
            $('#role').val(data.role)

            $('#userModal').modal('show')
        })

        document.querySelector('#userModal').addEventListener('hidden.bs.modal', function(e) {
            e.preventDefault()
            const modal = e.target
            modal.querySelector('input[name="_method"][value="put"]').remove()
        })
    </script>
@endpush