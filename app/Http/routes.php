<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');


// Auth Routes
//Route::auth();

Route::group(['middleware' => 'auth'], function() {
    Route::get('login', function() {
        return redirect('admin/auth/login');
    });
    
    Route::get('admin', function() {
        return redirect('admin/auth/login');
    });
    
    Route::get('admin/dashboard', 'Admin\DashboardController@index');
    
    Route::resource('admin/articles', 'Admin\ArticlesController');
    Route::get('admin/articles/{id}/delete', 'Admin\ArticlesController@destroy');
    //Route::get('admin/image/CKEditor-upload', 'Admin\ArticlesController@uploadCKEditor');
    Route::post('admin/image/CKEditor-upload', 'Admin\ArticlesController@uploadCKEditor');
    
    //Route::get('/admin/blog/preview/{postId}', ['uses' => 'BlogController@showPreview', 'as' => 'PreviewBlog']);
});

/*
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');
Route::get('/admin/login', function () {
    return redirect('/login');
});

Route::get('password/reset/{token?}', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@showResetForm']);
Route::post('password/email', ['as' => 'auth.password.email', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
Route::post('password/reset', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@reset']);
*/
Route::get('articles', 'ArticlesController@index');
//Route::get('articles/create', 'ArticlesController@create');
//Route::post('articles', 'ArticlesController@store');
Route::get('articles/{id}', 'ArticlesController@show');

//Route::resource('articles', 'ArticlesController');

Route::controllers([
	'admin/auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
