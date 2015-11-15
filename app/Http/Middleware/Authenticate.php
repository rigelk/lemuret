<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth;

class Authenticate {

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
	$this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
	$permissions = $this->getPermissions($request);
	$excepts = $this->getExcepts($request);
	
	if ($this->auth->guest())
	{
	    if ($request->ajax())
	    {
		return response('Unauthorized.', 401);
	    }
	    else
	    {
		return redirect()->guest('auth/login');
	    }
	}

	if ($permissions != '' ? !Auth::user()->can($permissions) : false) {
	    if ($excepts != '' ? !Auth::user()->can($excepts) : true)
		return redirect()->back();
	}

	return $next($request);
    }

    /**
     * Grab the permissions from the request
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Array
     */
    private function getPermissions($request)
    {
        $actions = $request->route()->getAction();
 
        return (isset($actions['permissions']) ? $actions['permissions'] : '');
    }

    /**
     * Grab the addendums to the request’s permissions
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Array
     */
    private function getExcepts($request)
    {
        $actions = $request->route()->getAction();
 
        return (isset($actions['except']) ? $actions['except'] : '');
    }
}
