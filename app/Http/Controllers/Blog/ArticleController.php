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
		$dirt_articles = $category->articles()->paginate(20);

		foreach ($dirt_articles as $article) {
			if (!$article->is_dirt) {
				$articles[] = $article;
			}
		}

		$articles = $this->paginate($articles);

		$categories = Category::all();

		return view('blog.articles.index', compact('articles', 'categories'));
	}

	public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

	public function show ($lang, Article $article)
	{
		// TODO: normal date output

		$comments = Comment::where('article_id', '=', $article->id)->paginate(100);

		return view('blog.articles.show', compact('article', 'comments'));
	}
}
