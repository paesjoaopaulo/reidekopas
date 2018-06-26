<?php

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/ranking', 'UserController@ranking')->name('ranking');

Route::group(['middleware' => 'guest'], function () {

    Route::get('/auth', 'UserController@login');
    Route::post('/auth', 'UserController@doLogin')->name('login');

    Route::get('/register', 'UserController@register');
    Route::post('/register', 'UserController@doRegister')->name('register');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/play', 'QuizController@play')->name('play');

    Route::get('/quiz/{quiz}/roulette', 'QuizController@roulette')->name('roulette');
    Route::post('/quiz/{quiz}/roulette', 'QuizController@processRoulette')->name('roulette');

    Route::get('/quiz/{quiz}/finish', 'QuizController@finish')->name('finish');

    Route::get('/quiz/{quiz}/question', 'QuizController@question')->name('question');
    Route::post('/quiz/{quiz}/question', 'QuizController@answer')->name('question');

    Route::get('/logout', 'UserController@logout')->name('logout');

    Route::get('/historico', 'UserController@historico')->name('historico');

});

Route::prefix('/admin')->group(function () {

    Route::get('/login', 'AdminController@login');
    Route::get('/logout', 'AdminController@logout')->name('admin.logout');
    Route::post('/login', 'AdminController@doLogin')->name('admin.login');

    Route::group(['middleware' => 'onlyadmin'], function () {

        Route::get('/', 'AdminController@home')->name('admin.home');

        Route::prefix('/questions')->group(function () {
            Route::get('/', 'AdminController@questions')->name('admin.questoes.index');
            Route::get('/create', 'AdminController@questionCreate')->name('admin.questoes.create');
            Route::get('/{question}', 'AdminController@question')->name('admin.questoes.show');
            Route::get('/{question}/edit', 'AdminController@questionEdit')->name('admin.questoes.edit');
            Route::put('/{question}', 'AdminController@questionPut')->name('admin.questoes.update');
            Route::post('/', 'AdminController@questionStore')->name('admin.questoes.store');
        });

    });

});

Route::get('auth/facebook', 'Auth\SocialiteController@redirectToProvider')->name('facebook.request');
Route::get('auth/facebook/callback', 'Auth\SocialiteController@handleProviderCallback')->name('facebook.callback');