<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ManageUsers
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
        if(!session()->has('LoggedAdmin')){
            return redirect('staff/auth/login')->with('fail', 'You must logged in first');
        }
        return $next($request);
    }
}
