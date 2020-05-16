<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Answer;
use App\Question;

class QuestionController extends Controller
{

    public function all() {
        $sampleQuestion = Question::getSampleQuestion();
        $questions = Question::withCount(['answers'])
            ->orderBy('created_at','desc')
            ->get();

        return view('home', [
            'sampleQuestion' => $sampleQuestion,
            'questions' => $questions,
        ]);
    }

    public function create(Request $request) {
        $rules = ['text' => ['bail', 'required', 'min:5', 'regex:/.*[?]$/i']];
        $messages = ['text.regex' => 'The text should end in "?".'];
        $this->validate($request, $rules, $messages);

        $question = new Question();
        $question->text  = $request->text;
        $question->save();

        return redirect()
            ->back()
            ->with('message', 'Question Created Successfully');
    }

    public function view($id) {
        $question = Question::findOrFail($id);
        $answers = Answer::where('question_id', $id)
            ->orderBy('created_at','asc')
            ->get();

        return view('question', [
            'question' => $question,
            'answers' => $answers,
        ]);
    }

    public function createAnswer(Request $request) {
        $rules = ['text' => ['bail', 'required', 'min:5']];
        $this->validate($request, $rules);

        $answer = new Answer();
        $answer->text  = $request->text;
        $answer->question_id = $request->question_id;
        $answer->save();

        return redirect()
            ->route('question_with_id', ['id' => $request->question_id])
            ->with('message', 'Answer Created Successfully');
    }

}
