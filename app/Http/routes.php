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
     *           LOGIN/LOGOUT ROUTES
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

        /* --------------------------------
         * ================================
         * ADMIN Only Routes.
         * ================================
         * --------------------------------
         */
        Route::group(['middleware' => 'admin'], function () {

            /*
         * University Info Add Routes (POST DATA)
         */
            Route::group(['as' => 'add.', 'prefix' => 'add'], function () {

                Route::post('university', [
                    'uses' => 'DashboardController@addUniversity',
                    'as' => 'university'
                ]);

            });

            /*
             * Admin Dashboard ROUTES
             */
            Route::group(['as' => 'admin.'], function () {

                Route::get('/dashboard/university-list', [
                    'uses' => 'DashboardController@getUniversityList',
                    'as' => 'dashboard.unis'
                ]);

                Route::get('/dashboard/user-list', [
                    'uses' => 'DashboardController@getUserList',
                    'as' => 'dashboard.users'
                ]);

                Route::get('/dashboard/demote/{id}', [
                    'uses' => 'DashboardController@demoteUser',
                    'as' => 'dashboard.demote'
                ]);

                Route::get('/dashboard/promote/{id}', [
                    'uses' => 'DashboardController@promoteUser',
                    'as' => 'dashboard.promote'
                ]);
            });

        });

        /*
         * User Dashboard Routes
         */
        Route::group(['as' => 'user.'], function () {
            Route::get('/dashboard', [
                'uses' => 'DashboardController@getDashboard',
                'as' => 'dashboard'
            ]);
        });

    });
});
