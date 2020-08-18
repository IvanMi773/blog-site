<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class AppController extends Controller
{
	public function setLanguage ($locale)
	{
		App::setLocale($locale);
		session()->put('locale', $locale);

		return \redirect('/blog/1');
	}
}
