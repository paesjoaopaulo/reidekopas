<?php

namespace App\Http\Controllers;

use App\QuizQuestion;
use Illuminate\Http\Request;

class QuizQuestionController extends Controller
{
    public function answer(Request $request, QuizQuestion $answer)
    {
        try {
            $answer->answer = $request->get('answer');
            $answer->save();
            return redirect()->route('quiz.question', $answer->quiz);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
