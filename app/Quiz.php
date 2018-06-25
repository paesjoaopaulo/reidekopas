<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    public const MAX_QUESTIONS = 10;
    protected $dates = ['start', 'finish'];

    public static function init(User $user)
    {
        $instance = new Quiz();
        $instance->start = now();
        $instance->user_id = $user->id;
        $instance->save();
        return $instance;
    }

    public function finalize()
    {
        $this->finish = now();
        $this->calcTime();
        $this->calcGoals();
        $this->save();
    }

    public function calcGoals()
    {
        $count = 0;
        foreach ($this->answers as $answer) {
            if ($answer->correct()) {
                $count++;
            }
        }
        $this->goals = $count;
    }


    public function calcTime()
    {
        $count = 0;
        foreach ($this->answers as $answer) {
            $count += $answer->timeSpend();
        }
        $this->spent_time = $count;
    }

    public function finished()
    {
        return $this->finish instanceof Carbon;
    }

    public function addRandomQuestionByYear($year = 0)
    {
        $query = Question::query();
        if (in_array($year, Question::WORLD_CUPS)) {
            $query = $query->where('year', $year);
        }
        $question = $query->get()->random();
        if (is_null($this->active_question)) {
            $quiz_question = new QuizQuestion();
            $quiz_question->quiz_id = $this->id;
            $quiz_question->question_id = $question->id;
            $quiz_question->save();
            return $quiz_question;
        } else {
            return $this->active_question;
        }
    }

    public function getActiveQuestionAttribute()
    {
        return $this->answers()->whereNull('answer')->get()->last();
    }

    public function getActiveQuizAttribute()
    {
        return $this->quizzes()->whereNull('answer')->get()->last();
    }

    public function answers()
    {
        return $this->hasMany('App\QuizQuestion');
    }

    public function quizzes()
    {
        return $this->hasMany('App\QuizQuestion');
    }

    public function questions()
    {
        return $this->hasManyThrough(
            'App\Question',
            'App\QuizQuestion',
            'question_id',
            'id'
        );
    }

    public function isFinished()
    {
        return $this->answers()->count() >= self::MAX_QUESTIONS;
    }

}
