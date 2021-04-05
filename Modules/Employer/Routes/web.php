<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth', 'role:admin'],
    'namespace' => 'Admin',
    'as' => 'admin.',
], function () {
    Route::resource('employer', 'EmployerController');
});


Route::group(['prefix' => 'employer', 'namespace' => 'Employer', 'as' => 'employer.',], function () {

    // employer auth routes
    Route::get('login', 'LoginController@getEmployerLogin')->name('getEmployerLogin');
    Route::post('login', 'LoginController@postEmployerLogin')->name('postEmployerLogin');

    Route::group(['middleware' => ['checkauth:employer', 'role:employer', 'checkauthemployer',]], function () {
        Route::get('logout', 'LoginController@employerLogout')->name('employerLogout');

        Route::get('dashboard', 'EmployerController@getEmployerDashboard')->name('getEmployerDashboard');

        Route::resource('employer', 'EmployerController')->only(['create', 'edit', 'update']);
    });
});
