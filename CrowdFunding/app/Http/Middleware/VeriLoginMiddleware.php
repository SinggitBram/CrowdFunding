<?php

namespace App\Http\Middleware;

use Closure;

class VeriLoginMiddleware
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
        $user = $request->user();
        if ($user != null) {
            return $next($request);
        };
        return response()->json([
            'message' => 'Anda belum login'
        ]);

    }
}
