<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SaveLastActionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // if (auth()->check()) {
        //     auth()->user()->update(['last_action_at' => now()]);
        // }
        return $next($request);
    }

    public function terminate($request, $response)
    {
        if ($request->user()) {
            $request->user()->update(['last_action_at' => now()]);
        }
    }
}
