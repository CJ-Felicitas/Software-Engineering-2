<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkUser2
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
        if (($request->path('/staffmanagement') ||$request->path('/productmanagement') || $request->path('/salesmanagement') ) &&$request->session()->has('admin'))  {
            return $next($request);
        }
        return redirect('/')->with('accessDenied','Access denied, Either you are logged out or you are trying to access the page via URL header. This page is exclusive to admin members only or just login again' );
    }
}
