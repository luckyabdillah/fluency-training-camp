<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseDetail;
use App\Models\Enrollment;
use App\Models\QuizResult;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrollments = Enrollment::with('course')->where('student_id', auth()->user()->student->id);

        if (request('q')) {
            $enrollments = $enrollments->whereHas('course', function ($query) {
                $query->where('title', 'like', '%' . request('q') . '%')->orWhere('mentor', 'like', '%' . request('q') . '%');
            });
        }

        $enrollments = $enrollments->paginate(5)->withQueryString();

        return view('dashboard.courses.index', compact('enrollments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $courseDetails = CourseDetail::where('course_id', $course->id)->orderBy('position')->get();
        $quizResult = QuizResult::where('quiz_id', $course->quiz->id)->where('student_id', auth()->user()->student->id)->first();

        return view('dashboard.courses.show', compact('course', 'courseDetails', 'quizResult'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
