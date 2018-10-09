<?php

namespace Furbook\Http\Middleware;

use Closure;
use Auth;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class IsAdministrator
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
        // Check user logged
        if(!Auth::check()){
            // Redirect login page
            return redirect()->route('login');
        }

        // Check admin user
        if(Auth::user()->isAdministrator()) {
            return $next($request);
        }

        // Check request ajax
        if($request->ajax()) {
            return response('Forbidden', 403);
        }

        // Exception
        throw new AccessDeniedHttpException('Forbidden');
    }
}
