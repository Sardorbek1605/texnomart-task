<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session::get('locale') != null){
            App::setLocale(Session::get('locale'));
        } else{
            Session::put('locale', 'uz');
            App::setLocale(Session::get('locale'));
        }
        return $next($request);
    }
}
