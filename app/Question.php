<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $table = 'questions';
    protected $fillable = ['text'];

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    static public function getSampleQuestion() {
        $SAMPLE_QUESTIONS = [
            'Isn’t it hard to be vegan?',
            'Isn’t it expensive to be vegan?',
            'Can you be an athlete on a vegan diet?',
        ];

        $k = array_rand($SAMPLE_QUESTIONS );
        return $SAMPLE_QUESTIONS[$k];
    }
}
