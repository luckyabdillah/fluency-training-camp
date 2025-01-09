<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    protected function sluggable($string)
    {
        // Hilangkan teks di dalam tanda kurung, termasuk tanda kurungnya
        $string = preg_replace('/[()]/', '', $string);
        
        // Hapus karakter yang tidak diizinkan (selain huruf, angka, dan tanda spasi)
        $string = preg_replace('/[^a-zA-Z0-9\s-]/', '', $string);
        
        // Ganti beberapa spasi atau tanda hubung berturut-turut menjadi satu tanda hubung
        $string = preg_replace('/[\s-]+/', '-', $string);
        
        // Hapus tanda hubung di awal atau akhir (jika ada)
        $string = trim($string, '-');
        
        // Ubah string menjadi lowercase
        $slug = strtolower($string);

        $originalSlug = $slug;
        $count = 2;

        while (Course::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }
        
        return $slug;
    }

    public function index()
    {
        $courses = Course::with('quiz')->latest();

        if (request('q')) {
            $courses = $courses->where('title', 'like', '%' . request('q') . '%');
        }
        
        return view('admin.courses.index', [
            'courses' => $courses->get(),
        ]);
    }
    
    public function create()
    {
        return view('admin.courses.create');
    }
    
    public function store(Request $request)
    {
        $request['price'] = explode('.', $request['price']);
        $request['price'] = implode('', $request['price']);

        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'description' => 'nullable|max:255',
            'image_cover' => 'nullable|image|max:2048',
            'session_type' => 'required|in:online,offline',
            'schedule_start' => 'required',
            'schedule_end' => 'required',
            'mentor' => 'required|max:100',
            'price' => 'required|numeric',
        ]);

        $validatedData['uuid'] = Str::uuid()->toString();
        $validatedData['slug'] = $this->sluggable($validatedData['title']);

        if ($request->file('image_cover')) {
            $validatedData['image_cover'] = $request->file('image_cover')->store('image_cover');
        }

        $course = Course::create($validatedData);

        $validatedDataQuiz['uuid'] = Str::uuid()->toString();
        $validatedDataQuiz['course_id'] = $course->id;
        $validatedDataQuiz['description'] = "Quiz for \"$course->title\"";

        Quiz::create($validatedDataQuiz);

        return redirect('/admin/courses')->with('success', 'New course has been successfully created!');
    }
    
    public function show(Course $course)
    {
        //
    }
    
    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }
    
    public function update(Request $request, Course $course)
    {
        $request['price'] = explode('.', $request['price']);
        $request['price'] = implode('', $request['price']);

        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'description' => 'nullable|max:255',
            'image_cover' => 'nullable|image|max:2048',
            'session_type' => 'required|in:online,offline',
            'schedule_start' => 'required',
            'schedule_end' => 'required',
            'mentor' => 'required|max:100',
            'price' => 'required|numeric',
        ]);

        if ($validatedData['title'] != $course->title) {
            $validatedData['slug'] = $this->sluggable($validatedData['title']);
        }

        if (isset($request->remove_image_cover)) {
            Storage::delete($course->image_cover);
            $validatedData['image_cover'] = null;
        }

        if ($request->file('image_cover')) {
            $validatedData['image_cover'] = $request->file('image_cover')->store('image_cover');
            
            if ($course->image_cover != null) {
                Storage::delete($course->image_cover);
            }
        }
        
        $course->update($validatedData);

        return redirect('/admin/courses')->with('success', 'Course has been successfully updated!');
    }
    
    public function destroy(Course $course)
    {
        $activeEnrollment = Enrollment::where('course_id', $course->id)->where('status', '!=', 'pending')->count();
        if ($activeEnrollment) {
            return redirect('/admin/courses')->with('failed', 'Course has active participant!');
        }
        
        if ($course->image_cover != null) {
            Storage::delete($course->image_cover);
        }

        Enrollment::where('course_id', $course->id)->delete();
        Course::destroy($course->id);

        return redirect('/admin/courses')->with('success', 'Course has been successfully deleted!');
    }
}
