<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Answer;
use App\Question;

class QuestionController extends Controller
{

    public function create(Request $request) {
        $rules = ['text' => ['bail', 'required', 'min:5', 'regex:/.*[?]$/i']];
        $messages = ['text.regex' => 'The text should end in "?".'];
        $this->validate($request, $rules, $messages);

        $question = new Question();
        $question->text  = $request->text;
        $question->save();

        return Redirect::back()->with('message', 'Question Created Successfully');
    }

    public function view($id) {
        $question = Question::findOrFail($id);
        $answers = Answer::where('question_id', $id)->get();

        return view('question', [
            'question' => $question,
            'answers' => $answers,
        ]);
    }

}
