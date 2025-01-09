<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, Course $course)
    {
        if ($course->price > 0) {
            return redirect("/courses/$course->slug/payment");
        }

        Enrollment::firstOrCreate(
            ['student_id' => auth()->user()->student->id, 'course_id' => $course->id],
            [
                'uuid' => Str::uuid()->toString(),
                'status' => 'active'
            ]
        );

        return redirect('/dashboard/courses')->with('success', 'Course has been successfully enrolled');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
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
        $enrollment = Enrollment::where('student_id', auth()->user()->student->id)->where('course_id', $course->id)->first();
        Enrollment::destroy($enrollment->id);

        return redirect('/dashboard/courses')->with('success', 'Course has been successfully un-enrolled');
    }
}
