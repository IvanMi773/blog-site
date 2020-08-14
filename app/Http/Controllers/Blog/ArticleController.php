<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
	public function index ()
	{
		$articles = Article::where('is_dirt', '=', '0')->paginate(20);
		$categories = Category::all();
		
		return view('blog.articles.index', compact('articles', 'categories'));
	}

	public function show (Article $article) 
	{
		// TODO: normal date output

		$comments = Comment::where('article_id', '=', $article->id)->paginate(100);

		return view('blog.articles.show', compact('article', 'comments'));
	}
}
