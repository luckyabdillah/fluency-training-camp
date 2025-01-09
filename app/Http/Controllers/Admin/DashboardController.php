<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;
use App\Models\Enrollment;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCourses = Course::count();
        $totalStudents = Student::count();
        $totalPendingEnrollments = Enrollment::where('status', 'pending')->count();

        return view('admin.index', compact('totalCourses', 'totalStudents', 'totalPendingEnrollments'));
    }
}
