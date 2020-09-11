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

// Admin and auth routes
Auth::routes();

Route::get('/', function () {
	return redirect(app()->getLocale() . '/blog/1');
});

// Blog routes
Route::group([
		'prefix' => '{locale}',
		'where' => ['locale' => '[a-zA-Z]{2}'],
		'middleware' => 'setLocale',
	],
    function () {
		// Article routes
        Route::get('/blog/{category}', 'Blog\ArticleController@index')->name('article.index');
        Route::get('/article/{article}', 'Blog\ArticleController@show')->name('article.show');

		// Comments routes
		Route::post('/c', 'Blog\CommentController@store')->name('comment.store');
    }
);