<?php namespace talenthub\Http\Controllers\ManagerApp;

use Illuminate\Support\Facades\Auth;
use talenthub\Http\Requests;
use talenthub\Http\Controllers\Controller;

use Illuminate\Http\Request;
use talenthub\Repositories\BasicSiteRepository;

class ManagerProfileController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    $constants = null;

	    $constants["countries"] = BasicSiteRepository::getListOfCountries(true);

		return response()->view('manager_app/app', compact('constants'))->withCookie(cookie('unsigned::test_data','test/data',10,null,null,false, false));
	}

}
