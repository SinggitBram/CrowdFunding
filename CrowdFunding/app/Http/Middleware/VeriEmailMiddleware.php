<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class VeriEmailMiddleware
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
        if ($user->email_verified_at != null) {
            return $next($request);
        }
        return response()->json([
            'message' => 'Email Anda Belum Terverifikasi'
        ]);
        // abort(404);
    }
}
