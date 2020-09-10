<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
		'text', 'article_id',
	];

	public static function getCommentsToArticleByArticleId($article)
	{
		return Comment::where('article_id', '=', $article->id)->paginate(100);
	}
}
