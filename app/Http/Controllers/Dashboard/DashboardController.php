<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Certificate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $studentId = auth()->user()->student->id;
        
        $totalAvaiableCourse = Course::where('schedule_end', '>=', date('Y-m-d'))
        ->whereNotIn('id', function ($query) use ($studentId) {
            $query->select('course_id')
                  ->from('enrollments')
                  ->where('student_id', $studentId);
        })->count();

        $totalActiveCourse = Enrollment::where('student_id', auth()->user()->student->id)->where('status', 'active')->count();
        $totalCertificateEarned = Certificate::where('student_id', auth()->user()->student->id)->count();

        return view('dashboard.index', compact('totalAvaiableCourse', 'totalActiveCourse', 'totalCertificateEarned'));
    }
}
