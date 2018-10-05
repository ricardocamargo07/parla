<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

Route::get('/', 'Home@index')->name('home');

Route::get('/editions/{number}', 'Home@editions')->name('editions');

Route::get('/posts', 'Home@post')->name('post');

Route::get('/posts/{year}/{month}/{number}/{slug}', 'Posts@show')->name(
    'posts.show'
);

Route::get('/contact', 'Contact@index')->name('contact.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(
    ['prefix' => '/admin', 'middleware' => ['auth', 'administrators']],
    function () {
        Route::get('/', 'Admin\Home@index')->name('admin.home.index');

        Route::get(
            '/administrator/add/{username}',
            'Admin\Users@addAdmin'
        )->name('admin.addAdmin');

        Route::get(
            '/administrator/remove/{username}',
            'Admin\Users@removeAdmin'
        )->name('admin.addAdmin');

        Route::get('/users/list', 'Admin\Users@index')->name('admin.users');

        Route::get('/backup', 'Admin\Users@backup')->name('admin.backups');
    }
);

Route::get('/not-an-administrator', 'Admin\Users@notAnAdministrator')->name(
    'not.an.administrator'
);




