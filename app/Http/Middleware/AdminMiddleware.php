<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
   public function handle(Request $request, Closure $next): Response
{
    //$hour = now()->hour;
    $hour = 10;

    if ($hour < 9 || $hour >= 17) {
        abort(404, 'ممنوع الدخول خارج اوقات الدوام');
    }

    return $next($request);
}
}
