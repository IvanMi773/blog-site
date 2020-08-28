<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'text'
	];

	// public function searchableAs(): string
    // {
    //     return 'articles_index';
    // }

	/**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    // public function toSearchableArray(): array
    // {
    //     $array = $this->toArray();

	// 	return array('id' => $array['id'], 'title' => $array['title']);
    // }


	/**
	 * One to many relationship with Category
	 *
	 * @return void
	 */
	public function categories()
	{
		return $this->belongsToMany(Category::class);
	}

	/**
	 * One to many relationship with Comment
	 *
	 * @return void
	 */
	public function comments()
	{
		return $this->hasMany(Comment::class);
	}
}
