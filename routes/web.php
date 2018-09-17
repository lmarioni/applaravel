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

Route::get('/','PagesController@home');
// Route::get('/about', 'PagesController@about');

Route::get('/hello', function () {
    echo "Hello!";
});

Route::get('/messages/{message}','MessagesController@show');
Route::post('/messages/create','MessagesController@create')->middleware('auth');

Auth::routes();
Route::get('/auth/facebook','SocialAuthController@facebook');
Route::get('/auth/facebook/callback','SocialAuthController@callback');

Route::post('/auth/facebook/register','socialAuthController@register');

Route::get('/{username}','UsersController@show');

Route::get('/{username}/follows', 'UsersController@follows'); //a quien sigue el usuario de la url
Route::get('/{username}/followers', 'UsersController@followers');

Route::post('/{username}/follow', 'UsersController@follow');
Route::post('/{username}/unfollow', 'UsersController@unfollow');
//Route::get('/home', 'HomeController@index')->name('home');
