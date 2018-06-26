<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AdminController extends Controller
{

    public function home()
    {
        return view('admin.home');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function doLogin(Request $request)
    {
        if ($request->get('email') == 'admin@admin.com') {
            if ($request->get('password') == 'admin') {
                return redirect()
                    ->route('admin.home')
                    ->withCookie(\cookie('logado', 'true'));
            }
        }
        return redirect()
            ->back()
            ->withInput()
            ->with(['alert-class' => 'alert-danger', 'message' => 'Erro na operação']);
    }

    public function questions()
    {
        $questions = Question::all()->sortBy('year');
        return view('admin.questions.index', compact('questions'));
    }

    public function questionCreate()
    {
        return view('admin.questions.create');
    }

    public function questionStore(Request $request)
    {
        try {
            $question = Question::create($request->except('_token'));
            return redirect()
                ->route('admin.questoes.index')
                ->with(['alert-class' => 'alert-success', 'message' => 'Questão adicionada com sucesso!']);
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.questoes.create')
                ->withInput()
                ->with(['alert-class' => 'alert-danger', 'message' => 'Erro na operação']);
        }
    }

    public function logout()
    {
        return redirect()->home()->withCookie(Cookie::forget('logado'));
    }
}
