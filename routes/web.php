<?php

use Illuminate\Support\Facades\Route;

/**
* CMS Route List
*/
Route::group([
    'prefix' => 'cms', 
    'middleware' => 'auth',
    'namespace' => 'CMS'
], function() {
    // Dashboard
    Route::get('/', 'DashboardController@index');

    /**
     * Master Route List
     */
    Route::group([
        'namespace' => 'Master'
    ], function() {
        // Users
        Route::group([
            'namespace' => 'Users'
        ], function() {
            // Profile
            Route::get('users/{user}/profile', 'ProfileController@index')->name('users.profile');
            Route::put('users/{user}/profile', 'ProfileController@updateUserProfile')->name('users.profile-update');
            Route::put('users/{user}/profile/delete-photo', 'ProfileController@deleteUserPhotoProfile')->name('users.delete-photo-profile');
            Route::delete('users/{user}/profile/delete-account', 'ProfileController@deleteUserAccount')->name('users.delete-account');

            // Change Password
            Route::get('users/{user}/profile/change-password', 'ProfileController@editPassword')->name('users.edit-password');
            Route::put('users/{user}/profile/change-password', 'ProfileController@updatePassword')->name('users.update-password');

            Route::group([
                'prefix' => 'master'
            ], function() {
                // Users Master
                Route::get('users/datatables', 'UserController@usersDataTables')->name('users.datatables');
                Route::resource('users', 'UserController');
            });
        });
    });
}); 

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
