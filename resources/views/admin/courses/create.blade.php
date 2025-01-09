@extends('admin.layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="mb-4">Add New Course</h5>
            <a href="/admin/courses" class="btn btn-dark mb-4">Back</a>
            <form action="/admin/courses" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Title" value="{{ old('title') }}" autocomplete="off" required maxlength="100">
                    @error('title')
                        <div class="invalid-feedback text-start">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea rows="2" class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Description" autocomplete="off" required maxlength="255">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback text-start">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6 col-12 mb-3">
                        <label for="mentor" class="form-label">Mentor</label>
                        <input type="text" class="form-control @error('mentor') is-invalid @enderror" name="mentor" id="mentor" placeholder="Mentor Name" value="{{ old('mentor') }}" autocomplete="off" required maxlength="100">
                        @error('mentor')
                            <div class="invalid-feedback text-start">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label for="session_type" class="form-label">Session</label>
                        <select class="form-select @error('session_type') is-invalid @enderror" name="session_type" id="session_type" required>
                            <option value="online" {{ old('session_type') == 'online' ? 'selected' : '' }}>Online</option>
                            <option value="offline" {{ old('session_type') == 'offline' ? 'selected' : '' }}>Offline</option>
                        </select>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="schedule_start" class="form-label">Schedule Start</label>
                        <input type="date" class="form-control @error('schedule_start') is-invalid @enderror" name="schedule_start" id="schedule_start" value="{{ old('schedule_start') }}" autocomplete="off" required>
                        @error('schedule_start')
                            <div class="invalid-feedback text-start">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label for="schedule_end" class="form-label">Schedule End</label>
                        <input type="date" class="form-control @error('schedule_end') is-invalid @enderror" name="schedule_end" id="schedule_end" value="{{ old('schedule_end') }}" autocomplete="off" required>
                        @error('schedule_end')
                            <div class="invalid-feedback text-start">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label for="image_cover" class="form-label">Image Cover</label>
                        <input type="file" class="form-control @error('image_cover') is-invalid @enderror" name="image_cover" id="image_cover" accept="image/*">
                        <span class="d-block mt-1 @error('image_cover') text-danger @enderror"><i class="ti ti-info-circle"></i> Max. image size 2048 KB</span>
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control numeric @error('price') is-invalid @enderror" name="price" id="price" placeholder="Price" value="{{ old('price', '0') }}" autocomplete="off" required>
                        @error('price')
                            <div class="invalid-feedback text-start">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-submit">Submit</button>
            </form>
        </div>
    </div>
@endsection