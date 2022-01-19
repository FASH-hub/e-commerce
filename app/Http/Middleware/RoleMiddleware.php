<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'admin') {
                return redirect('/auth.adminPage')->with('status', 'You are registered as admin');
            } else {
                return redirect('/auth.userPage')->with('status', 'You are registered as simple user');
            }
        } else {
            return redirect('/register')->with('status', 'Please Login First');
        }
    }
}
