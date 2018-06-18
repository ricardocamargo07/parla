<?php
Route::get('/', 'Home@index')->name('home');

Route::get('/editions/{id}', 'Home@editions')->name('editions');

Route::get('/posts', 'Home@post')->name('post');

Route
    ::get('/posts/{year}/{month}/{number}/{slug}', 'Posts@show')
    ->name('posts.show');

Route::get('/contact', 'Contact@index')->name('contact.index');
