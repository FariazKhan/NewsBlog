<?php

/**
* ---------------------------
* The admin-side routes
* User-side routes are below!
* ---------------------------
*/

// Admin Home route
Route::get('administrator', function(){
    return view('admin.home');
})->name('home')->middleware('auth', 'check_admin_role');

Route::group(['namespace' => 'admin', 'middleware' => 'check_admin_role'], function()
{

    // Post routes
    Route::resource('admin/post', 'PostController');

    // Settings routes
    Route::resource('admin/settings', 'SettingsController');
    Route::post('admin/settings/add', 'SettingsController@addCategory')->name('addCategory');
    Route::post('admin/settings/edit', 'SettingsController@editCategory')->name('editCategory');
    Route::post('admin/settings/delete/{id}', 'SettingsController@deleteCategory')->name('deleteCategory');
    Route::get('admin/fetchCategories', 'SettingsController@fetchCategories')->name('fetchCategories');

    // Top Scrollbar Widget routes
    Route::get('admin/widgets/top-scrollbar', 'TopScrollbarController@index')->name('showTopScrollbar');
    Route::get('admin/widgets/top-scrollbar/data', 'TopScrollbarController@fetchData')->name('fetchTopScrollbarData');
    Route::post('admin/widgets/top-scrollbar/store', 'TopScrollbarController@storeContent')->name('storeScrollbarData');
    Route::post('admin/widgets/top-scrollbar/update', 'TopScrollbarController@updateContent')->name('updateScrollbarData');
    Route::post('admin/widgets/top-scrollbar/delete', 'TopScrollbarController@deleteContent')->name('deleteScrollbarData');
    Route::post('admin/widgets/top-scrollbar-bg/update', 'TopScrollbarController@setBG')->name('setTopScrollbarBGColor');
    Route::post('admin/widgets/top-scrollbar-text/update', 'TopScrollbarController@setTextColor')->name('setTopScrollbarTextColor');

    // Profile routes
    Route::get('admin/profile', 'ProfileController@index')->name('profile.index');
    Route::post('admin/profile/update-settings', 'ProfileController@updateProfileSettings')->name('updateProfileSettings');
    Route::post('admin/profile/update-pwd', 'ProfileController@updatePwd')->name('updatePwd');
    Route::post('admin/profile/updateProfileImage', 'ProfileController@updateProfileImage')->name('updateProfileImage');
    Route::post('admin/profile/fetchProfileData', 'ProfileController@fetchProfileData')->name('fetchProfileData');

    // Manage user routes
    Route::resource('admin/user', 'UserController')->middleware('limit_route_access');

    // Error page routes
    Route::get('admin/blocked-access', function(){
        return view('admin.errors.blocked');
    })->name('blocked-access');
});


Auth::routes();

/**
 * The user-side routes.
 * Admin-side routes are above!
 */

 Route::get('/', 'HomeController@index')->name('homepage');
 Route::get('archives', 'HomeController@showAllArchive')->name('showAllArchive');
 Route::get('archives/{slug}', 'HomeController@showArchive')->name('showArchive');
 Route::get('posts/{title}', 'HomeController@showPost')->name('showPost');
