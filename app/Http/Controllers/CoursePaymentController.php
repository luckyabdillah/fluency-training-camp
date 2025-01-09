<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CoursePaymentController extends Controller
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
    public function create(Course $course)
    {
        return view('courses.payment', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'payment_receipt' => 'required|file|mimes:png,jpg,jpeg|max:2048'
        ]);

        $validatedData['payment_receipt'] = $request->file('payment_receipt')->store('payment_receipt');

        Enrollment::firstOrCreate(
            ['student_id' => auth()->user()->student->id, 'course_id' => $course->id],
            [
                'uuid' => Str::uuid()->toString(),
                'payment_receipt' => $validatedData['payment_receipt']
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
        //
    }
}
