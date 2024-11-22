<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfRouteNotInLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $countryCode = \Stevebauman\Location\Facades\Location::get()->countryCode ?? 'US';


        if (app()->getLocale() == 'it' && $countryCode != 'IT')
            return redirect('/en');

        // if (app()->getLocale() == 'en' && $countryCode != 'en')
        //     return redirect('/');



        return $next($request);
    }
}