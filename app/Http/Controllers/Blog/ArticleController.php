<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
	public function index ()
	{
		// TODO: count of words in text
		$articles = Article::where('is_dirt', '=', '0')->paginate(20);
		
		return view('blog.articles.index', compact('articles'));
	}

	public function show (Article $article) 
	{
		// TODO: normal data output
		return view('blog.articles.show', compact('article'));
	}
}
