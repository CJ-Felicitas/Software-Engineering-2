<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
      
        if (($request->path('/staffdashboard') || $request->path('/customermanagement') || $request->path('/profile') ) && $request->session()->has('staff')) {
            return $next($request);
        } 
        return redirect('/')->with('accessDenied2','Access denied, either you are logged out or you are trying to access the page via URL header. This page is exclusive to staff members or just login again' );

    }
}
