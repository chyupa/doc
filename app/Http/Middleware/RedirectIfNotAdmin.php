<?php namespace Doc\Http\Middleware;

use Closure;
use Illuminate\Auth\Guard;

class RedirectIfNotAdmin {

	protected $auth;

	public function __construct( Guard $auth )
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
		if( ! ( $this->auth->check() && $request->user()->isAdmin() ) )
		{
			return redirect()->route('auth.get.login');
		}
		return $next($request);
	}

}
