<?php namespace talenthub\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use talenthub\Repositories\SiteConstants;
use talenthub\User;
use talenthub\UserProfile;

class ProfileViewAuth {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if(Auth::check())
        {
            return $this->handleRequestForAuthenticatedUser($request,$next);
        }
        else
        {
            return $this->handleRequestForExternalUser($request,$next);
        }
	}


    /**
     * Handling request for user who is logged in into the website
     * @param $request
     */
    public function handleRequestForAuthenticatedUser($request,$next)
    {
        $loggedInUser = Auth::user();

        $userProfileVisiting = UserProfile::find($request->route()->parameter('id'));

        if(strtolower($request->method()) == "get" &&
            SiteConstants::isTalent($loggedInUser->user_type) && (SiteConstants::isManager($userProfileVisiting->user_type) || SiteConstants::isAdmin($userProfileVisiting->user_type)))
        {
            return redirect('/profile');
        }
        return $next($request);
    }


    /**
     * Handling request for user who is not logged in into to site
     * @param $request
     */
    public function handleRequestForExternalUser($request,$next)
    {
        $userProfileVisiting = UserProfile::find($request->route()->parameter('id'));

        if(strtolower($request->method()) == "get" && (SiteConstants::isAdmin($userProfileVisiting->user_type)))
        {
            return redirect('/');
        }
        return $next($request);
    }

}
