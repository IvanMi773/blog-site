<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleController extends Controller
{
	// TODO: getting category_id witout lang variable
	public function index ($lang, Category $category)
	{
		$articles = Category::getAllArticlesByCategory($category);
		$categories = Category::getAllCategories();

		return view('blog.articles.index', compact('articles', 'categories'));
	}

	public function show ($lang, Article $article)
	{
		// TODO: normal date output

		$comments = Comment::getCommentsToArticleByArticleId($article);

		return view('blog.articles.show', compact('article', 'comments'));
	}
}
