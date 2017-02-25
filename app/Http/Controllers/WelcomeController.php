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
        $user = Auth::user();
        if($user && SiteConstants::isTalent($user->user_type))
        {
            return redirect('/home');
        }
        else if($user && SiteConstants::isManager($user->user_type))
        {
            return redirect('/manager');
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
        $managerTypes = array_merge(["0"=>"-- Select Option --"],BasicSiteRepository::getManagerTypes());
        return view('sign_up',compact('sport_types','userManagerManagementLevel','managerTypes'));
    }


    /**Redirects to Sign In page
     * @return \Illuminate\View\View
     */
    public function signIn()
    {
        if(Auth::user())
        {
            return redirect('/home');
        }
        return view('sign_in');
    }

}
