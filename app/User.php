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
        'name', 'email', 'password',
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
        return $this->quizzes()->whereNull('finish')->get()->last();
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

    public function getPontuacaoTotalAttribute(){
        return $this->quizzes()->where('user_id', $this->id)->sum('goals');
    }
}
