<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * 
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {

         if (Auth::check()) {
     
            foreach ($roles as $role) {
                if (Auth::user()->role == $role) {
                    return $next($request);
                }
            }
        }

        return redirect('/');

        // if(Auth::check() && Auth::user()->role == $role){
        //     return $next($request);
        // }
        // return redirect('/');
    }
}
