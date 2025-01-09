<?php

namespace App\Http\Controllers\Admin;

use DOMDocument;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CourseDetailController extends Controller
{
    function extractEmbedUrl(string $input)
    {
        // Regex untuk menangkap src di dalam tag iframe
        preg_match('/src=["\']([^"\']+)["\']/', $input, $matches);

        // Jika ada hasil dari preg_match, gunakan hasilnya
        if (!empty($matches[1])) {
            return $matches[1];
        }
        
        // Jika tidak, asumsikan user memasukkan URL langsung
        if (filter_var($input, FILTER_VALIDATE_URL)) {
            return $input;
        }

        // Jika input tidak valid, kembalikan null atau pesan error
        return null;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Course $course)
    {
        $courseDetails = CourseDetail::where('course_id', $course->id)->orderBy('position')->get();

        return view('admin.course-details.index', compact('courseDetails', 'course'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        return view('admin.course-details.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'position' => 'required|integer|min:1',
            'pdf_document' => 'nullable|file|mimes:pdf',
            'slide_embedded_code' => 'nullable',
            'content' => 'nullable',
        ]);

        if ($request->file('pdf_document')) {
            $validatedData['pdf_document'] = $request->file('pdf_document')->store('pdf_document');
        }

        if ($request->slide_embedded_code) {
            $validatedData['slide_embedded_code'] = $this->extractEmbedUrl($request->slide_embedded_code);
            if ($validatedData['slide_embedded_code'] == null || !str_contains($validatedData['slide_embedded_code'], 'docs.google.com/presentation')) {
                return back()->withInput()->with('failed', 'Invalid URL at Slide Embedded Code');
            }
        }

        $content = $validatedData['content'];
    
        if ($content) {
            $dom = new DOMDocument();
            $dom->loadHTML($content, 9);
    
            $images = $dom->getElementsByTagName('img');
    
            foreach ($images as $key => $image) {
                $data = base64_decode(explode(',', explode(';', $image->getAttribute('src'))[1])[1]);
                $imageName = "/image_content/IMG-" . date('dmY-His', strtotime('now')) . $key . '.png';
    
                Storage::put($imageName, $data);
    
                $image->removeAttribute('src');
                $image->setAttribute('src', "/storage$imageName");
            }
    
            $content = $dom->saveHTML();
        }
        
        $validatedData['content'] = $content;
        $validatedData['uuid'] = Str::uuid()->toString();
        $validatedData['course_id'] = $course->id;

        CourseDetail::create($validatedData);

        return redirect("/admin/courses/$course->uuid/details")->with('success', 'New course detail has been successfully added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course, CourseDetail $detail)
    {
        // dd($course);
        return view('admin.course-details.show', compact('course', 'detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course, CourseDetail $detail)
    {
        return view('admin.course-details.edit', compact('course', 'detail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course, CourseDetail $detail)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'position' => 'required|integer|min:1',
            'pdf_document' => 'nullable|file|mimes:pdf',
            'slide_embedded_code' => 'nullable',
            'content' => 'nullable',
        ]);

        if ($request->slide_embedded_code) {
            $validatedData['slide_embedded_code'] = $this->extractEmbedUrl($request->slide_embedded_code);
            if ($validatedData['slide_embedded_code'] == null || !str_contains($validatedData['slide_embedded_code'], 'docs.google.com/presentation')) {
                return back()->withInput()->with('failed', 'Invalid URL at Slide Embedded Code');
            }
        }

        if ($request->remove_pdf_document) {
            Storage::delete($detail->pdf_document);
            $validatedData['pdf_document'] = null;
        }

        if ($request->file('pdf_document')) {
            $validatedData['pdf_document'] = $request->file('pdf_document')->store('pdf_document');
            if ($detail->pdf_document) {
                Storage::delete($detail->pdf_document);
            }
        }

        $content = $validatedData['content'];

        if ($content) {
            $dom = new DOMDocument();
            $dom->loadHTML($content, 9);
    
            $images = $dom->getElementsByTagName('img');
    
            foreach ($images as $key => $image) {
                if (strpos($image->getAttribute('src'), 'data:image/') === 0) {
                    $data = base64_decode(explode(',', explode(';', $image->getAttribute('src'))[1])[1]);
                    $imageName = "/image_content/IMG-" . date('dmY-His', strtotime('now')) . $key . '.png';
        
                    Storage::put($imageName, $data);
        
                    $image->removeAttribute('src');
                    $image->setAttribute('src', "/storage$imageName");
                }
            }
            
            $content = $dom->saveHTML();
        }
        
        $validatedData['content'] = $content;
        $detail->update($validatedData);

        return redirect("/admin/courses/$course->uuid/details")->with('success', 'Course detail has been successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course, CourseDetail $detail)
    {
        $dom = new DOMDocument();
        $dom->loadHTML($detail->content, 9);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $image) {
            $path = $image->getAttribute('src');
            $realPath = str_replace('/storage', '', $path);
            if (Storage::exists($realPath)) {
                Storage::delete($realPath);
            }
        }

        CourseDetail::destroy($detail->id);

        return redirect("/admin/courses/$course->uuid/details")->with('success', 'Course detail has been successfully deleted!');
    }
}
