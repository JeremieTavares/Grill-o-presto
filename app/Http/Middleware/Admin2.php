<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin2
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
        // dd((Auth::user()->role->role != "Admin_2") || (Auth::user()->role->role != "Admin3"), Auth::user()->role->role);
        if (Auth::user()) {
            if (!(Auth::user()->role->role == "Admin_2") || (Auth::user()->role->role == "Admin3"))
                return redirect()->back();
            return $next($request);;
        } else {
            return redirect()->back();
        }
    }
}
