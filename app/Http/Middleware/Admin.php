<?php namespace talenthub\Http\Middleware;

use Closure;
use Illuminate\Auth\Guard;
use talenthub\Repositories\SiteConstants;

class Admin {

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
        $user = $this->auth->user();

        if($user->user_type != SiteConstants::USER_ADMIN)
        {
            return redirect('auth/logout');
        }

		return $next($request);
	}

}
