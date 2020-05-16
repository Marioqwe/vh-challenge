<?php

namespace App\Http\Controllers;

use App\Question;

class HomeController extends Controller
{

    public function index() {
        $sampleQuestion = Question::getSampleQuestion();
        $questions = Question::withCount(['answers'])
            ->orderBy('created_at','desc')
            ->get();

        return view('home', [
            'sampleQuestion' => $sampleQuestion,
            'questions' => $questions,
        ]);
    }

}
