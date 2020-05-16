<?php

namespace App\Http\Controllers;

use App\Question;

class HomeController extends Controller
{

    public function index() {
        $sampleQuestion = Question::getSampleQuestion();
        $questions = Question::withCount(['answers'])->get();
        return view('home', [
            'sampleQuestion' => $sampleQuestion,
            'questions' => $questions,
        ]);
    }

}
