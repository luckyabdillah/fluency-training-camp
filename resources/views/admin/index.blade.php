@extends('admin.layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="mb-4">Welcome back, {{ auth()->user()->name }}!</h5>
            <div class="row">
                <div class="col-md-4 col-6">
                    <div class="alert alert-info text-center py-4" role="alert">
                        <p class="fs-6 fw-semibold mb-3">{{ $totalCourses }}</p>
                        <span>Total Courses</span>
                    </div>
                </div>
                <div class="col-md-4 col-6">
                    <div class="alert alert-info text-center py-4" role="alert">
                        <p class="fs-6 fw-semibold mb-3">{{ $totalStudents }}</p>
                        <span>Total Students</span>
                    </div>
                </div>
                <div class="col-md-4 col-6">
                    <div class="alert alert-info text-center py-4" role="alert">
                        <p class="fs-6 fw-semibold mb-3">{{ $totalPendingEnrollments }}</p>
                        <span>Pending Verification</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection