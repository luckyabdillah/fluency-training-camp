@extends('admin.layouts.main')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="mb-4">Edit Profile</h5>
            <input type="hidden" name="photo_placeholder" id="photo_placeholder" value="{{ asset('assets/vendor/theme/images/profile/user-1.jpg') }}">
            <form action="/admin/profile" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" name="destroy_photo" id="destroy_photo">
                <div class="d-flex align-items-start align-items-sm-center gap-4 mb-3">
                    <img
                        @if ($user->photo)
                            src="{{ asset("storage/$user->photo") }}"
                        @else
                            src="{{ asset('assets/vendor/theme/images/profile/user-1.jpg') }}"
                        @endif
                        alt="user-avatar"
                        class="d-block rounded border"
                        height="100"
                        width="100"
                        id="uploadedAvatar"
                    />
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="ti ti-upload d-block d-sm-none"></i>
                            <input
                                type="file"
                                id="upload"
                                class="account-file-input"
                                name="photo"
                                hidden
                                accept="image/png, image/jpeg"
                            />
                        </label>
                        <button type="button" class="btn btn-outline-secondary account-image-reset me-2 mb-4">
                            <i class="ti ti-reload d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                        </button>
                        <button type="button" class="btn btn-outline-danger account-image-destroy mb-4">
                            <i class="ti ti-trash d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Delete</span>
                        </button>
                        <p class="text-muted mb-0">Allowed JPG or PNG. Max size of 800K</p>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name" value="{{ old('name', $user->name) }}" required autocomplete="off">
                        @error('name')
                            <div class="invalid-feedback text-start">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username" value="{{ old('username', $user->username) }}" required autocomplete="off">
                        @error('username')
                            <div class="invalid-feedback text-start">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-primary btn-submit">Update</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="mb-4">Change Password</h5>
            <form action="/change-password" method="post">
                @csrf
                @method('put')
                <div class="row g-3 mb-3">
                    <div class="col-12">
                        <label for="old_password" class="form-label">Old Password</label>
                        <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" id="old_password" placeholder="Old Password" required autocomplete="off">
                        @error('old_password')
                            <div class="invalid-feedback text-start">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" id="new_password" placeholder="New Password" required autocomplete="off">
                        @error('new_password')
                            <div class="invalid-feedback text-start">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" name="new_password_confirmation" id="new_password_confirmation" placeholder="Confirm New Password" required autocomplete="off">
                        @error('new_password_confirmation')
                            <div class="invalid-feedback text-start">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-primary btn-submit">Change</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function (e) {
            (function () {
                // Update/reset user image of account page
                let accountUserImage = document.getElementById('uploadedAvatar')

                const fileInput = document.querySelector('.account-file-input'),
                destroyPhoto = document.querySelector('[name="destroy_photo"]'),
                resetFileInput = document.querySelector('.account-image-reset'),
                destroyFileInput = document.querySelector('.account-image-destroy'),
                photoPlaceholder = document.querySelector('[name="photo_placeholder"]').value

                if (accountUserImage) {
                    const resetImage = accountUserImage.src
                    fileInput.onchange = () => {
                        if (fileInput.files[0]) {
                            destroyPhoto.value = ''
                            accountUserImage.src = window.URL.createObjectURL(fileInput.files[0])
                            // console.log(window.URL.createObjectURL(fileInput.files[0]))
                            // console.log(fileInput.files[0])
                        }
                    }
                    resetFileInput.onclick = () => {
                        destroyPhoto.value = ''
                        fileInput.value = ''
                        accountUserImage.src = resetImage
                    }
                    destroyFileInput.onclick = () => {
                        destroyPhoto.value = 'on'
                        fileInput.value = ''
                        accountUserImage.src = photoPlaceholder
                    }
                }
            })()
        })
    </script>
@endpush