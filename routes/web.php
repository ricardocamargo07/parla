<?php

Route::get('/', 'Home@index')->name('home');

Route::get('/post', 'Home@post')->name('post');
