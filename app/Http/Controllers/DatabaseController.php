<?php namespace talenthub\Http\Controllers;

use Illuminate\Support\Facades\Session;
use talenthub\Http\Requests;
use talenthub\Http\Controllers\Controller;

use Illuminate\Http\Request;
use talenthub\Repositories\BasicSiteRepository;
use talenthub\Repositories\SiteSessions;
use talenthub\Repositories\SportsRepository;
use talenthub\Repositories\UserProfileRepository;
use talenthub\UserProfile;

class DatabaseController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $userProfile=UserProfile::find(Session::get(SiteSessions::USER_ID));
        $userProfile->getMutatedData = false;
        $sport_type = array_map('ucfirst',BasicSiteRepository::getSportTypes());
        $sport_gender = array_map('ucfirst',array_merge(['0'=>'-- Select Option --'],SportsRepository::getSportsGender()));
        $state = array_map('ucfirst',array_merge(['0' => "-- Select State --"],BasicSiteRepository::getAmericanState()));
        $institution_type = array_map('ucfirst',UserProfileRepository::getInstituteType());

        return view('database.database_home',compact('userProfile','sport_type','sport_gender','state','institution_type'));
	}


}
