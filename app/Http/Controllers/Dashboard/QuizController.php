<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;
use App\Models\QuizResult;
use App\Models\Certificate;
use App\Models\Enrollment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Course $course)
    {
        $quiz = Quiz::firstWhere('course_id', $course->id);
        $questions = Question::with('options')->where('quiz_id', $quiz->id)->get();

        return view('dashboard.quiz.index', compact('quiz', 'questions', 'course'));
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
        $validatedData = $request->validate([
            'questions.*.id' => 'required|numeric',
            'questions.*.answer' => 'nullable|numeric'
        ]);

        $quiz = Quiz::firstWhere('course_id', $course->id);
        $totalQuestions = Question::where('quiz_id', $quiz->id)->count();
        $scorePerQuestion = 100 / $totalQuestions;
        $studentScore = 0;

        foreach ($validatedData['questions'] as $question) {
            if (isset($question['answer'])) {
                $option = Option::firstWhere('id', $question['answer']);
                if ($option->is_correct) {
                    $studentScore += $scorePerQuestion;
                }
            }
        }

        if ($studentScore < $quiz->minimum_score) {
            return redirect("/dashboard/courses/$course->uuid")->with('failed', 'Your score doesn\'t reach quiz minimum score, please try again. Good Luck!');
        }

        QuizResult::create([
            'uuid' => Str::uuid()->toString(),
            'student_id' => auth()->user()->student->id,
            'quiz_id' => $quiz->id,
            'score' => $studentScore,
        ]);

        Certificate::create([
            'uuid' => Str::uuid()->toString(),
            'student_id' => auth()->user()->student->id,
            'course_title' => $course->title,
        ]);

        $enrollment = Enrollment::where('student_id', auth()->user()->student->id)->where('course_id', $course->id)->first();
        $enrollment->update(['status' => 'completed']);

        return redirect("/dashboard/certificates")->with('success', 'Congratulations, you passed the test!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
}
