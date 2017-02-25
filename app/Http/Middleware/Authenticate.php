<?php namespace talenthub\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use talenthub\Repositories\SiteConstants;
use talenthub\Repositories\UserProfileRepository;

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
		if ($this->auth->guest())
		{
			if ($request->ajax())
			{
				return response('Unauthorized.', 401);
			}
			else
			{
				return redirect()->guest('/');
			}
		}

        $user = $this->auth->user();

        if(!SiteConstants::isTalent($user->user_type) && !SiteConstants::isManager($user->user_type) &&
            !SiteConstants::isCoach($user->user_type) && !SiteConstants::isAgent($user->user_type))
        {
            return redirect('auth/logout');
        }

        if(!SiteConstants::isTalent($user->user_type))
        {
            return redirect('/');
        }

		return $next($request);
	}

}
