<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function doRegister(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users',
                'nickname' => 'required|alpha|unique:users',
                'password' => 'required|confirmed',
                'image' => 'nullable|file:image',
            ]);

            $user = new User();
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->nickname = $request->get('nickname');
            $user->password = bcrypt($request->get('password'));

            if ($request->hasFile('image')) {
                $file = $request->image;
                $img_profile = md5($user->nome . time()) . "." . $file->getClientOriginalExtension();
                $file->storeAs('public', $img_profile);
                $user->url_image = $img_profile;
            }
            $user->save();
            Auth::login($user);
            DB::commit();
            return redirect()->route('home');
        } catch (\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
        }
    }

    public function login()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];

        if (Auth::attempt($credentials)) {
            return redirect()
                ->intended('play');
        } else {
            return redirect()
                ->route('login')
                ->withInput()
                ->with(['alert-class' => 'alert-danger', 'message' => 'Invalid credentials']);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'nickname' => 'required|alpha|unique:users',
        ]);

        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];

        if (Auth::attempt($credentials)) {
            return redirect()
                ->intended('play');
        } else {
            return redirect()
                ->route('login')
                ->withInput()
                ->with('message', 'Erro');
        }
    }

    public function ranking()
    {
        $users = User::query()->get();
        return view('ranking', compact('users'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
