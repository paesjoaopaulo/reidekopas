<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'avatar', 'facebook_id', 'facebook_token', 'nickname'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getActiveQuizAttribute()
    {
        return Quiz::whereNull('finish')->where('user_id', $this->id)->get()->last();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyr
     */
    public function quizzes()
    {
        return $this->hasManyThrough(
            'App\Quiz',
            'App\QuizQuestion',
            'quiz_id',
            'id'
        );
    }

    public function pontuacao()
    {
        $quizzes = Quiz::where('user_id', $this->id)->get();
        $soma = 0;
        foreach ($quizzes as $quiz) {
            $soma += $quiz->goals;
        }
        return $soma;
    }
}
