<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::group([
        'prefix' => '{locale}',
        'where' => ['locale' => '[a-zA-Z]{2}'],
        'middleware' => 'setLocale',
    ],
    function () {

        Route::get('/blog/{category_id}', 'Blog\ArticleController@index')->name('article.index');
        Route::get('/article/{article}', 'Blog\ArticleController@show')->name('article.show');

        Route::post('/c', 'Blog\CommentController@store')->name('comment.store');
    }
);

    // Route::post('/theme', 'AppController@theme')->name('theme');
    // Route::get('/language/{locale}', 'AppController@setLanguage')->name('language');
