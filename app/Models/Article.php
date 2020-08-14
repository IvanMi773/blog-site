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
	
	public function categories ()
	{
		return $this->belongsToMany(Category::class);
	}

	public function comments ()
	{
		return $this->hasMany(Comment::class);
	}
}
