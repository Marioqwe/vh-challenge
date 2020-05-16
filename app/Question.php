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

}
