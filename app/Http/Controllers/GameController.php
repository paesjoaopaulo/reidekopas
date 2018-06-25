<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function home()
    {
        return view('home');
    }
}
