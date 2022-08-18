<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLoginMiddleware
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
        if (!session()->has('role_id')||session()->get('status')===0) {
            session()->flush();
            return redirect()->route('login');
        }
        if (session()->get('role_id')===2) {
            return redirect()->route('homepage');
        }
        if (session()->get('role_id')===0||session()->get('role_id')===1){
            return $next($request);
        }

    }
}
