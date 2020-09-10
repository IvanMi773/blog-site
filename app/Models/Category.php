<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'description'
	];

	public function articles ()
	{
		return $this->belongsToMany(Article::class);
	}

	public static function getAllArticlesByCategory($category)
	{
		return $category->articles()->where('is_dirt', '=', '0')->orderBy('title', 'asc')->paginate(20);
	}

	public static function getAllCategories()
	{
		return Category::all();
	}
}
