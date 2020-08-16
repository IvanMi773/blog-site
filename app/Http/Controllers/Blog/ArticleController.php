<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
	public function index ($category_id)
	{
		if ($category_id != '' && $category_id != null && $category_id != 0)
		{
			$category = Category::find($category_id);
			$articles = $category->articles()->paginate(20);
		} else {
			$articles = Article::where('is_dirt', '=', '0')->paginate(20);
		}

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
