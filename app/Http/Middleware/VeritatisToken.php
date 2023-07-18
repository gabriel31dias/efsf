<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VeritatisToken
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
        if(env('VERITATIS_TOKEN', null) === null || $request->bearerToken() != env('VERITATIS_TOKEN')){ 
            return response()->json(['error' => true], 401);
        }
        return $next($request);
    }
}
