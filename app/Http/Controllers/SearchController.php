<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;
use App\Models\Article;

class SearchController extends Controller
{
	public function search(SearchRequest $request)
	{
		$data = $request->validated();
		dd($data);

		$articles = Article::search($data['search'])
			->where('is_dirt', 0)
			->orderBy('created_at', 'desc')
			->paginate(20);

		return view('search', \compact('articles'));
	}
}
