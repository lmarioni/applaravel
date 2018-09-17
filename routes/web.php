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

Auth::routes();
Route::get('/auth/facebook','SocialAuthController@facebook');
Route::get('/auth/facebook/callback','SocialAuthController@callback');
Route::post('/auth/facebook/register','socialAuthController@register');

Route::group(['middleware' => 'auth'],function(){ //hace que si o si tengan que estar logeados
  Route::post('/messages/create','MessagesController@create');
  Route::post('/{username}/dms','UsersController@sendPrivateMessage');
  Route::post('/{username}/follows', 'UsersController@follows'); //a quien sigue el usuario de la url
  Route::post('/{username}/unfollow', 'UsersController@unfollow');

  Route::get('/conversations/{conversation}', 'UsersController@showConversation');
});

Route::get('/{username}','UsersController@show');
Route::get('/{username}/followers', 'UsersController@followers');
Route::post('/{username}/follow', 'UsersController@follow');

//Route::get('/home', 'HomeController@index')->name('home');
