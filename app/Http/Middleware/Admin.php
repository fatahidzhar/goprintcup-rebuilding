<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
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
        if (auth()->check()) {
            if (auth()->user()->is_admin == 1) {
                return $next($request);
            } else {
                return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
            }
        }
        return redirect('/login')->with('error', 'Silakan login untuk mengakses halaman ini.');
    }
}
