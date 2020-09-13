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

Auth::routes(['verify' => true]);
Route::get('/', 'HomeController@index')->name('home');
/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/
Route::get('/signup', 'AuthController@getSignUp')->middleware('guest')->name('auth.signup.get');
Route::post('/signup', 'AuthController@postSignUp')->middleware('guest')->name('auth.signup.post');
Route::get('/signin', 'AuthController@getSignIn')->middleware('guest')->name('auth.signin.get');
Route::post('/signin', 'AuthController@postSignIn')->middleware('guest')->name('auth.signin.post');
Route::get('/signout', 'AuthController@getSignOut')->name('auth.signout.get');
/*
|--------------------------------------------------------------------------
| Friends
|--------------------------------------------------------------------------
*/

Route::get('/friends', 'FriendController@index')->middleware('auth')->name('friends.index');
Route::get('/friends/requests', 'FriendController@requestsFriend')->middleware('auth')->name('friends.add');
Route::get('/friends/requests/accept/{user}', 'FriendController@acceptFriend')->middleware('auth')->name('friends.accept');
Route::get('/friends/requests/delete/{user}', 'FriendController@deleteAcceptFriend')->middleware('auth')->name('friends.accept.delete');
Route::get('/friends/delete/{user}', 'FriendController@deleteFriend')->middleware('auth')->name('friends.delete');
Route::get('/friends/add/{user}', 'FriendController@addFriend')->middleware('auth')->name('friend.add');

/*
|--------------------------------------------------------------------------
| Users
|--------------------------------------------------------------------------
*/
Route::get('/users', 'UserController@index')->middleware('auth')->name('users.index');


