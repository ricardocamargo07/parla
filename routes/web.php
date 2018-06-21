<?php
Route::get('/', 'Home@index')->name('home');

Route::get('/editions/{number}', 'Home@editions')->name('editions');

Route::get('/posts', 'Home@post')->name('post');

Route
    ::get('/posts/{year}/{month}/{number}/{slug}', 'Posts@show')
    ->name('posts.show');

Route::get('/contact', 'Contact@index')->name('contact.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'Admin\Home@index')->name('admin.home.index');
});
