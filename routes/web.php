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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/add', function () {
    return \App\User::find(1)->add_friend(3);
});

Route::get('/accept', function () {
    return \App\User::find(4)->accept_friend(1);
});

Route::get('/pending', function () {
    return \App\User::find(3)->pending_friend_requests();
});

Route::get('/ids', function () {
    return \App\User::find(1)->friends_ids();
});

Route::get('/is', function () {
    return \App\User::find(1)->is_friends_with(3);
});

Route::get('/friends', function () {
    return \App\User::findOrFail(1)->friends();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/profile/{slug}', 'ProfileController@index')->name('profile');
    Route::get('/profile/edit/profile', 'ProfileController@edit')->name('profile.edit');
    Route::post('/profile/update/profile', 'ProfileController@update')->name('profile.update');
});
