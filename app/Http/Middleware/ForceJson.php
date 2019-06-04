<?php

namespace App\Http\Middleware;

use Closure;

class ForceJson
{
    public function handle($request, Closure $next)
    {
        $accept = $request->header('Accept');
        if (strpos($accept, 'application/json') === false) {
            $request->headers->set('Accept', 'application/json');
        }
        return $next($request);
    }
}
