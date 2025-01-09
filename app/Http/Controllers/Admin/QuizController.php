<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\QuizResult;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with('course')->get();

        return view('admin.quizzes.index', compact('quizzes'));
    }
    
    public function show(Quiz $quiz)
    {
        $course = $quiz->course;
        $questions = Question::with('options')->where('quiz_id', $quiz->id)->get();

        return view('admin.quizzes.show', compact('course', 'quiz', 'questions'));
    }
    
    public function update(Request $request, Quiz $quiz)
    {
        $validatedData = $request->validate([
            'description' => 'required|max:255',
            'minimum_score' => 'required|numeric|digits_between:1,100',
            'time_limit' => 'required|numeric',
        ]);

        $quiz->update($validatedData);

        return redirect("/admin/quizzes/$quiz->uuid")->with('success', 'Quiz has been successfully updated!');
    }

    public function results(Quiz $quiz)
    {
        $results = QuizResult::with('student.user')->where('quiz_id', $quiz->id)->get();

        return view('admin.quizzes.results', compact('results', 'quiz'));
    }
}
