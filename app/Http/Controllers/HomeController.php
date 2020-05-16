<?php

namespace App\Http\Controllers;

use App\Question;

class HomeController extends Controller
{

    public function index() {
        $questions = Question::withCount(['answers'])->get();
        return view('home', [
            'questions' => $questions,
        ]);
    }

}
