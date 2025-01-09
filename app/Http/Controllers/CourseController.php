<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('schedule_end', '>=', date('Y-m-d'))->orderBy('schedule_start');

        if (request('q')) {
            $courses = $courses->where('title', 'like', '%' . request('q') . '%')->orWhere('mentor', 'like', '%' . request('q') . '%');
        }

        $courses = $courses->get();

        return view('courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        if (strtotime('now') > strtotime($course->schedule_end)) {
            return redirect('/courses')->with('failed', 'Course has expired');
        }
        
        return view('courses.show', compact('course'));
    }
}
