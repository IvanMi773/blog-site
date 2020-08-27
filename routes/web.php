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

// Search route
// Route::post('/search', 'SearchController@search')->name('search');
// Route::get('/search', function() {
// 	$articles = App\Models\Article::search('Test title')->get();
// 	dd($articles);
//     return $articles;
// });

// Blog routes
Route::group([
		'prefix' => '{locale}',
		'where' => ['locale' => '[a-zA-Z]{2}'],
		'middleware' => 'setLocale',
	],
    function () {
        Route::get('/blog/{category}', 'Blog\ArticleController@index')->name('article.index');
        Route::get('/article/{article}', 'Blog\ArticleController@show')->name('article.show');

        Route::post('/c', 'Blog\CommentController@store')->name('comment.store');
    }
);