<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', [
        'uses' => 'MainController@getHome',
        'as' => 'home'
    ]);

    Route::get('/user/register', [
        'uses' => 'UserController@getRegisterModal',
        'as' => 'user.register'
    ]);

    Route::get('/admin/dashboard', [
        'uses' => 'UniversityController@getUniversities',
        'as' => 'admin.dashboard'
    ]);

    Route::get('/admin/dashboard/add', [
        'uses' => 'UniversityController@getUniversityForm',
        'as' => 'admin.dashboard.add'
    ]);

    Route::post('/admin/dashboard/add', [
        'uses' => 'UniversityController@addUniversity',
        'as' => 'admin.dashboard.add'
    ]);
});
