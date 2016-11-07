<?php

Route::group(['middleware' => 'web'], function () {
    Route::auth();
});

Route::group(['middleware' => ['web','auth']], function () {

    Route::get('/', [ 'middleware' => 'auth', 'uses' => 'HomeController@index' ]);
    Route::get('/home', ['as' => 'home','middleware' => 'auth','uses' => 'HomeController@index' ]);

    Route::get('profile', ['as' => 'user.profile', 'uses' => 'ProfileController@index']);
    Route::post('profile', ['as' => 'user.profile.save','uses' => 'ProfileController@update']);

    Route::resource('users', 'UsersController');

    Route::resource('activity', 'ActivityController');
	Route::resource('resellers', 'ResellersController');
	Route::resource('agents', 'AgentsController');
	Route::resource('transactions', 'TransactionsController');
    Route::get('transactions/{id}/accepted', ['as' => 'transactions.accepted','uses' => 'TransactionsController@accepted']);
    Route::get('transactions/{id}/denied', ['as' => 'transactions.denied','uses' => 'TransactionsController@denied']);
    Route::get('datatables', ['as' => 'datatables.data', 'uses' => 'TransactionsController@getBasicData']);
});
