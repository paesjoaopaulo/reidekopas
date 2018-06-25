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

});
