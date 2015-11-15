<?php namespace App\Http\Middleware;

use Auth;
use Closure;
use Flash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Routing\Middleware;

class AuthenticateAdmin implements Middleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guest() || !Auth::user()->can('access.admin')) {
            Flash::error('Navré, mais la princesse est dans un autre chateau :-)');
            return new RedirectResponse(url('/'));
        }

        return $next($request);
    }
}
