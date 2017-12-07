<?php

// Route::post('/login', 'BuzzController@login');

Route::get('/show-login-status', function () {
    $user = Auth::user();

    if ($user) {
        dump('You are logged in.', $user->toArray());
    } else {
        dump('You are not logged in.');
    }

    return;
});

// /**
// * Tweet
// *
// */
Route::group(['middleware' => 'auth'], function () {
    $user = Auth::user();
    
    # Main Tweet Page
    Route::get('/session', 'BuzzController@session');
    Route::post('/tweet', 'BuzzController@tweet');
});

// /**
// * Homepage
// */
// Route::get('/', 'WelcomeController');
Route::get('/', 'BuzzController@index');

Auth::routes();