<?php

namespace App\Http\Controllers;

use App\Quiz;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function play()
    {
        DB::beginTransaction();
        try {
            $user = Auth::user();
            if (is_null($user->active_quiz)) {
                $quiz = Quiz::init($user);
            } else {
                $quiz = $user->active_quiz;
            }
            DB::commit();
            if ($quiz->active_question) {
                return redirect()->route('question', compact('quiz'));
            } else {
                return redirect()->route('roulette', compact('quiz'));
            }
        } catch (\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
        }
    }

    public function roulette(Quiz $quiz)
    {
        if (!$quiz->isFinished()) {
            return view('roulette', compact('quiz'));
        } else {
            return redirect()->route('finish', compact('quiz'));
        }
    }

    public function processRoulette(Request $request, Quiz $quiz)
    {
        if (!$quiz->isFinished()) {
            $data['answer'] = $quiz->active_question;
            if (is_null($data['answer'])) {
                $data['answer'] = $quiz->addRandomQuestionByYear($request->get('year'));
            }
            return redirect()->route('question', compact('quiz'));
        } else {
            return redirect()->route('finish', compact('quiz'));
        }
    }

    public function question(Quiz $quiz)
    {

        $data['quiz'] = $quiz;
        $data['answer'] = $quiz->active_question;
        return view('answer', compact('data'));
    }

    public function answer(Request $request, Quiz $quiz)
    {
        DB::beginTransaction();
        try {
            $question = $quiz->active_question;
            $question->answer = $request->get("answer");
            $question->save();

            $quiz->calcGoals();
            $quiz->save();

            DB::commit();
            if (!$quiz->isFinished()) {
                return view('roulette', compact('quiz'));
            } else {
                return redirect()->route('finish', compact('quiz'));
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->route('home')
                ->with(['alert-class' => 'alert-danger', 'message' => 'Erro na operação']);
        }
    }

    public function finish(Quiz $quiz)
    {
        DB::beginTransaction();
        try {
            $quiz->finalize();
            DB::commit();
            return view('finish', compact('quiz'));
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}
