<?php

namespace App\Http\Middleware;

use Closure;

class UserSession
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
        // dd(session()->has('logged_user'));
        if (!$request->session()->has('logged_user')) {
            return redirect('admin/login');
        }
        return $next($request);
    }
}
