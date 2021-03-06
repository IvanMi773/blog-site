<?php

namespace App\Http\Middleware;

use Closure;
use App;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! in_array($request->segment(1), ['en', 'uk', 'ru'])) {
            App::setLocale('en');
        }

        App::setLocale($request->segment(1));

        return $next($request);
    }
}
