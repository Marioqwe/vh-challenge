<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Answer;

class AnswerController extends Controller
{

    public function create(Request $request) {
        $answer = new Answer();
        $answer->text  = $request->text;
        $answer->question_id = $request->question_id;
        $answer->save();

        return Redirect::back()->with('message', 'Operation Successful!');
    }

}
