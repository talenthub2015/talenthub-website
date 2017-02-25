<?php namespace talenthub\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {

	/**
	 * The application's global HTTP middleware stack.
	 *
	 * @var array
	 */
	protected $middleware = [
		'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
//		'Illuminate\Cookie\Middleware\EncryptCookies',
        'talenthub\Http\Middleware\EncryptCookies',
		'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
		'Illuminate\Session\Middleware\StartSession',
		'Illuminate\View\Middleware\ShareErrorsFromSession',
		'talenthub\Http\Middleware\VerifyCsrfToken',
	];

	/**
	 * The application's route middleware.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		'auth_talent' => 'talenthub\Http\Middleware\Authenticate',
		'auth.basic' => 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
        'guest' => 'talenthub\Http\Middleware\RedirectIfAuthenticated',
        'admin' => 'talenthub\Http\Middleware\Admin',
        'account_confirmation'  =>  'talenthub\Http\Middleware\AccountConfirmation',
        'profile_view_auth' => 'talenthub\Http\Middleware\ProfileViewAuth',
        'auth_manager'  =>  'talenthub\Http\Middleware\AuthenticateManager',
	];

}
