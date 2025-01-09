<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Option;
use App\Models\Quiz;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function getOptions(Question $question)
    {
        $i = 0;
        $options = [];
        foreach ($question->options as $option) {
            $options[$i]['id'] = $option->id;
            $options[$i]['option_text'] = $option->option_text;
            $options[$i]['is_correct'] = $option->is_correct;

            $i++;
        }

        return response()->json([
            'status' => 'success',
            'statusCode' => 200,
            'message' => 'OK',
            'data' => $options
        ], 200);
    }
    
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
    public function store(Request $request, Quiz $quiz)
    {
        $validatedDataQuestion = $request->validate([
            'question' => 'required|max:255',
        ]);

        $validatedDataOptions = $request->validate([
            'options.*.option_text' => 'required|max:255',
            'options.*.is_correct' => 'required|in:1,0',
        ]);

        $validatedDataQuestion['uuid'] = Str::uuid()->toString();
        $validatedDataQuestion['quiz_id'] = $quiz->id;
        $question = Question::create($validatedDataQuestion);

        foreach ($request->options as $option) {
            $option['uuid'] = Str::uuid()->toString();
            $option['question_id'] = $question->id;

            Option::create($option);
        }

        return redirect("/admin/quizzes/$quiz->uuid")->with('success', 'New question has been successfully added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz, Question $question)
    {
        $validatedDataQuestion = $request->validate([
            'question' => 'required|max:255',
        ]);

        $validatedDataOptions = $request->validate([
            'options.*.option_text' => 'required|max:255',
            'options.*.is_correct' => 'required|in:1,0',
        ]);
        
        $question->update($validatedDataQuestion);

        foreach ($request->options as $item) {
            $option = Option::firstWhere('id', $item['id']);
            $option->update($item);
        }

        return redirect("/admin/quizzes/$quiz->uuid")->with('success', 'Question has been successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz, Question $question)
    {
        Question::destroy($question->id);

        return redirect("/admin/quizzes/$quiz->uuid")->with('success', 'Question has been successfully deleted!');
    }
}
