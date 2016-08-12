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
                    'uses' => 'UniversityDataAddController@addUniversity',
                    'as' => 'university'
                ]);

                Route::post('level', [
                    'uses' => 'UniversityDataAddController@addLevel',
                    'as' => 'level'
                ]);

                Route::post('level_props', [
                    'uses' => 'UniversityDataAddController@addLevelProps',
                    'as' => 'level.props'
                ]);

                Route::post('field', [
                    'uses' => 'UniversityDataAddController@addField',
                    'as' => 'field'
                ]);

                Route::post('field_props', [
                    'uses' => 'UniversityDataAddController@addFieldProps',
                    'as' => 'field.props'
                ]);

                Route::post('course', [
                    'uses' => 'UniversityDataAddController@addCourse',
                    'as' => 'course'
                ]);

            });

            /*
             * Admin Dashboard ROUTES
             */
            Route::group(['as' => 'admin.'], function () {

                Route::get('/dashboard/universities', [
                    'uses' => 'DashboardController@getUniversityList',
                    'as' => 'dashboard.unis'
                ]);

                Route::get('/dashboard/universities/{uni_id}', [
                    'uses' => 'DashboardController@getUniversity',
                    'as' => 'dashboard.uni'
                ]);

                Route::get('/dashboard/levels_and_fields', [
                    'uses' => 'DashboardController@getLevelsAndFields',
                    'as' => 'dashboard.laf'
                ]);

                Route::get('/dashboard/users', [
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
