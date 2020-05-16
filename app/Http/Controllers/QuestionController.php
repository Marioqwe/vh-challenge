<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Answer;
use App\Question;

class QuestionController extends Controller
{

    public function create(Request $request) {
        $question = new Question();
        $question->text  = $request->text;
        $question->save();

        return redirect('/');
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
