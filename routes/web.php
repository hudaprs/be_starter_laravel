<?php

use Illuminate\Support\Facades\Route;

/**
* @desc     CMS Route List
*/
Route::group([
    'prefix' => 'cms', 
    'middleware' => 'auth',
    'namespace' => 'CMS'
], function() {
    // Dashboard
    Route::get('/', 'DashboardController@index');

    /**
     * @desc Master Route List
     */
    Route::group([
        'prefix' => 'master',
        'namespace' => 'Master'
    ], function() {
        Route::get('users/datatables', 'UserController@usersDataTables')->name('users.datatables');
        Route::resource('users', 'UserController');
    });
}); 

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
