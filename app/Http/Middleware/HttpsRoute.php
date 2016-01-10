<?php

namespace App\Http\Middleware;

use Closure;

class HttpsRoute
{
    /**
     * Check if environment is not local and if route was called via http.
     * If so, then return a redirect to the secure route
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->secure() && app()->environment() !== 'local') {
            return redirect()->secure($request->getRequestUri());
        }
        return $next($request);
    }
}
