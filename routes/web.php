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

    # Edit TWeet
    Route::get('/tweet/{id}', 'BuzzController@edit');
    Route::put('/tweet/{id}', 'BuzzController@update');

    # Delete Tweet
    Route::delete('/tweet/{id}', 'BuzzController@delete');
});

// /**
// * Homepage
// */
Route::get('/', 'BuzzController@index');

Auth::routes();