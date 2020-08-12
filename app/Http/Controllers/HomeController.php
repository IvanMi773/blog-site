<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Article;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$categories = ['Office Chairs', 'Modern Chairs', 'Home Chairs'];

		foreach($categories as $category)
		{
			Category::create([
				'name'  =>  $category,
			]);
		}

		$article = Article::create([
			'title'  =>  'Home Brixton Faux Leather Armchair',
			'slug' =>  'fadjsklfas',
			'text' =>  'fadjsklfas',
		]);
		
		$categories = Category::find([2,3]); // Modren Chairs, Home Chairs
		$article->categories()->attach($categories);

        return view('home');
    }
}
