<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Requests\CommentCreateRequest;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
	public function store (CommentCreateRequest $request)
	{
		$data = $request->validated();

		$comment = new Comment([
			"text" => $data['text'],
			'user_id' => auth()->user()->id,
			'article_id' => $data['article_id'],
		]);

		$comment->save();

		return back();
	}
}
