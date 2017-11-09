<?php namespace talenthub\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'talenthub\Services\Registrar'
		);

		//Common Services
        $this->app->bind('talenthub\Services\Common\Message\IMessageService',
            'talenthub\Services\Common\Message\MessageService');

        $this->app->bind('talenthub\Services\Common\User\IUserService',
            'talenthub\Services\Common\User\UserService');

        //Manager
		$this->app->bind('talenthub\Services\Manager\Verification\IVerificationRequestService',
            'talenthub\Services\Manager\Verification\VerificationRequestService');

        $this->app->bind('talenthub\Services\Manager\Profile\IProfileService',
            'talenthub\Services\Manager\Profile\ProfileService');

        $this->app->bind('talenthub\Services\Manager\HelpCentre\IHelpCentreService',
            'talenthub\Services\Manager\HelpCentre\HelpCentreService');

        //Talent

	}

}
