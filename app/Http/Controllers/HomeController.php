<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;

class HomeController extends Controller
{

    public function index() {
//        $questions = Question::all();
        $questions = Question::withCount(['answers'])->get();
        return view('home', [
            'questions' => $questions,
        ]);
    }

}
