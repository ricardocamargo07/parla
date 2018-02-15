<?php

Route::get('/', 'Home@index')->name('home');

Route::get('/posts', 'Home@post')->name('post');

Route::get('/posts/{year}/{month}/{day}/{slug}', 'Posts@show')->name('posts.show');
