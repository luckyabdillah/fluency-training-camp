<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class VerficationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrollments = Enrollment::with('student.user', 'course')->where('status', 'pending')->get();

        return view('admin.verifications.index', compact('enrollments'));
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
    public function show(Enrollment $verification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $verification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enrollment $verification)
    {
        $verification->update(['status' => 'active']);

        return redirect('/admin/verifications')->with('success', 'Enrollment has been successfully verified');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $verification)
    {
        Enrollment::destroy($verification->id);

        return redirect('/admin/verifications')->with('success', 'Enrollment has been successfully rejected');
    }
}
