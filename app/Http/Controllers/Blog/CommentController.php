<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Requests\CommentCreateRequest;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Article;

class CommentController extends Controller
{
	public function store (CommentCreateRequest $request)
	{
		$data = $request->validated();

		$comment = new Comment([
			"text" => $data['text'],
			'article_id' => $data['article_id'],
		]);

		$comment->save();

		return back();
	}
}
