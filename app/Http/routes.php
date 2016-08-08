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

    /*
     * --------------------------------------------
     *           ALL ACCOUNT ROUTES
     * --------------------------------------------
     */
    Route::group(['as' => 'user.'], function () {
        Route::post('/user/login', [
            'uses' => 'UserController@postLogin',
            'as' => 'login'
        ]);

        Route::get('/user/register', [
            'uses' => 'UserController@getRegister',
            'as' => 'register'
        ]);

        Route::post('/user/register', [
            'uses' => 'UserController@postRegister',
            'as' => 'register'
        ]);

        Route::get('/user/logout', [
            'uses' => 'UserController@getLogout',
            'as' => 'logout'
        ]);
    });


    /*
     * -------------------------------------------------------
     *                    AUTH ROUTES
     * -------------------------------------------------------
     */
    Route::group(['middleware' => 'auth'], function () {

        /*
         * ADMIN ROUTES
         */
        Route::group(['as' => 'admin.'], function () {

            Route::get('/user/dashboard', [
                'uses' => 'UniversityController@getUniversities',
                'as' => 'dashboard'
            ]);

            Route::get('/user/dashboard/add', [
                'uses' => 'UniversityController@getUniversityForm',
                'as' => 'dashboard.add'
            ]);

            Route::post('/user/dashboard/add', [
                'uses' => 'UniversityController@addUniversity',
                'as' => 'dashboard.add'
            ]);

            Route::get('/user/dashboard/users', [
                'uses' => 'UserController@getUsers',
                'as' => 'dashboard.users'
            ]);

            Route::get('/user/dashboard/demote/{id}', [
                'uses' => 'UserController@demoteUser',
                'as' => 'dashboard.demote'
            ]);

            Route::get('/user/dashboard/promote/{id}', [
                'uses' => 'UserController@promoteUser',
                'as' => 'dashboard.promote'
            ]);
        });

    });
});
