<?php namespace talenthub\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use talenthub\api\RequestStatusEnum;
use talenthub\Repositories\SiteConstants;

class AuthenticateManager {

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
                if($request->is('api/manager/*'))
                {
                    return response()->json([],RequestStatusEnum::USER_NOT_LOGGED_IN);
                }
                return response('Unauthorized.', 401);
            }
            else
            {
                return redirect()->guest('/');
            }
        }

        $user = $this->auth->user();

        if(!SiteConstants::isManager($user->user_type))
        {
            return abort(404);
        }

		return $next($request);
	}

}
