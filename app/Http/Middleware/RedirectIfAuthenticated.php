<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $user = $request->user();
        if (Auth::guard($guard)->check()) {                        
            return redirect('/');
            // if($user->role->id == 1)
            // {
            //     return redirect('/super-admin');
            // }            
            // else if($user->role->id == 2)
            // {
            //     return redirect('/admin/student');
            // }
            // else if($user->role->id == 3)
            // {
            //     return redirect('/teacher');
            // }
            // else if($user->role->id == 4)
            // {
            //     return redirect('/student');
            // }            
        }
        return $next($request);
    }
}
