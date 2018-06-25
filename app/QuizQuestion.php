<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    public function question()
    {
        return $this->belongsTo('App\Question', 'question_id', 'id');
    }

    public function quiz()
    {
        return $this->belongsTo('App\Quiz', 'quiz_id', 'id');
    }

    public function correct()
    {
        return $this->question->correct_answer == $this->answer;
    }

    public function timeSpend(){
        return $this->updated_at->diffInSeconds($this->created_at);
    }

    public function scopeEmAberto($query)
    {
        return $query->whereNull('answer');
    }

}
