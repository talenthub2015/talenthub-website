<?php namespace talenthub\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AccountConfirmation {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        $user = Auth::user();

        //User hasn't confirmed his/her account
        if($user->active == 0)
        {
            return redirect('account-not-confirmed');
        }

		return $next($request);
	}

}
