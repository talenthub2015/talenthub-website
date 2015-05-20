<?php namespace talenthub\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use talenthub\Repositories\BasicSiteRepository;
use talenthub\Repositories\SiteConstants;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        if(Auth::user())
        {
            return redirect('/home');
        }
        return view('welcome');
	}


    /**
     * Redirect the user to Sign Up page
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function signUp()
    {
        if(Auth::user())
        {
            return redirect('/home');
        }
        $sport_types=BasicSiteRepository::getSportTypes();
        $userManagerManagementLevel=BasicSiteRepository::getUserManagementLevelType(SiteConstants::USER_MANAGER);
        return view('sign_up',compact('sport_types','userManagerManagementLevel'));
    }

}
