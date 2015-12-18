<?php namespace talenthub\Http\Controllers\Admin;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use talenthub\Http\Requests;
use talenthub\Http\Controllers\Controller;

use Illuminate\Http\Request;
use talenthub\ManagerDatabaseModel\ManagersDatabase;
use talenthub\Repositories\BasicSiteRepository;
use talenthub\Repositories\SiteConstants;
use talenthub\Repositories\SportsRepository;
use talenthub\Repositories\UserProfileRepository;

class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.admin_home');
	}


    /**
     * Display page for adding Managers in the website
     * @return \Illuminate\View\View
     */
    public function addManager()
    {
        $manager_type = array_map('ucfirst',array_merge(['0'=>'-- Select Option --'],BasicSiteRepository::getManagerTypes()));
        $management_level = array_map('ucfirst',array_merge(['0'=>'-- Select Option --'],BasicSiteRepository::getUserManagementLevelType(SiteConstants::USER_MANAGER)));
        $sport_type = array_map('ucfirst',BasicSiteRepository::getSportTypes());
        $sport_gender = array_map('ucfirst',array_merge(['0'=>'-- Select Option --'],SportsRepository::getSportsGender()));
        $country = array_map('ucfirst',BasicSiteRepository::getListOfCountries());
        $american_state = array_map('ucfirst',array_merge([0 => "-- Select State --"],BasicSiteRepository::getAmericanState()));
        $institution_type = array_map('ucfirst',UserProfileRepository::getInstituteType());


        return view('admin.managers_database.add_manager',compact('manager_type','management_level','sport_type','sport_gender',
            'country','american_state','institution_type'));
    }


    /**
     * Storing all the managers
     * @param Request $request
     */
    public function storeManagers(Request $request)
    {
        $totalManagers = count($request->get("coach_name"));

        $requestData = $request->all();

        //Array for storing managers, who won't get stored in the database and informed user
        $managersNotStored = array();

        for ($i = 0; $i < $totalManagers; $i++)
        {
            if ($this->checkIfManagerExists($requestData, $i))
            {
                $newManagerData = ManagersDatabase::create([
                    "manager_type" => $requestData["manager_type"][$i], "management_level" => $requestData["management_level"][$i],
                    "sport_type" => $requestData["sport_type"][$i], "sport_gender" => $requestData["sport_gender"][$i],
                    "designation" => $requestData["designation"][$i], "coach_name" => $requestData["coach_name"][$i],
                    "email" => $requestData["email"][$i], "contact_no" => $requestData["contact_no"][$i],
                    "country" => $requestData["country"][$i], "state" => $requestData["state"][$i],
//                    "institution_type" => $requestData["institution_type"][$i],
                    "institution_name" => $requestData["institution_name"][$i]
                ]);
            }
            else
            {
                array_push($managersNotStored, [
                        "manager_type" => BasicSiteRepository::getManagerTypes()[$requestData["manager_type"][$i]],
                        "management_level" => BasicSiteRepository::getUserManagementLevelType(SiteConstants::USER_MANAGER)[$requestData["management_level"][$i]],
                        "sport_type" => BasicSiteRepository::getSportTypes()[$requestData["sport_type"][$i]],
                        "sport_gender" => SportsRepository::getSportsGender()[$requestData["sport_gender"][$i]],
                        "designation" => $requestData["designation"][$i], "coach_name" => $requestData["coach_name"][$i],
                        "email" => $requestData["email"][$i], "contact_no" => $requestData["contact_no"][$i],
                        "country" => BasicSiteRepository::getListOfCountries()[$requestData["country"][$i]],
                        "state" => $requestData["state"][$i] != 0 ? BasicSiteRepository::getAmericanState()[$requestData["state"][$i]] : "",
//                        "institution_type" => UserProfileRepository::getInstituteType()[$requestData["institution_type"][$i]],
                        "institution_name" => $requestData["institution_name"][$i]
                    ]);
            }
        }

        if (count($managersNotStored) > 0)
        {
            Session::flash('managers_not_added',$managersNotStored);
            Session::flash('manager_added_status',"partial_successful");
        }
        else
        {
            Session::flash('manager_added_status',"successful");
        }


        return redirect('admin/addManager');
    }


    /**
     * Checking if Manager at some index $i in $request, already exists in the database or not
     * @param $request --- It is an array
     * @param $i
     */
    public function checkIfManagerExists($requestData,$i)
    {
        $managerFound = ManagersDatabase::where('email','=',$requestData["email"][$i])->get();

        if(count($managerFound) > 0)
        {
            return false;
        }
        return true;
    }


    /**
     * View Managers in the database
     * @param null $name
     * @param null $manager_type
     * @param null $sport
     * @param null $sport_gender
     * @param null $state
     */
    public function viewManagers($name=null, $manager_type=null, $sport=null, $sport_gender=null, $country=null, $state=null)
    {
        $managers = ManagersDatabase::name($name)
                        ->managerType($manager_type)
                        ->sport($sport)
                        ->sportGender($sport_gender)
                        ->country($country)
                        ->state($state)
                        ->paginate(25);

        $manager_type = array_map('ucfirst',array_merge(['0'=>'-- Select Option --'],BasicSiteRepository::getManagerTypes()));
        $management_level = array_map('ucfirst',array_merge(['0'=>'-- Select Option --'],BasicSiteRepository::getUserManagementLevelType(SiteConstants::USER_MANAGER)));
        $sport_type = array_map('ucfirst',BasicSiteRepository::getSportTypes());
        $sport_gender = array_map('ucfirst',array_merge(['0'=>'-- Select Option --'],SportsRepository::getSportsGender()));
        $country = array_map('ucfirst',BasicSiteRepository::getListOfCountries());
        $state = array_map('ucfirst',array_merge(['0' => "-- Select State --"],BasicSiteRepository::getAmericanState()));


        return view('admin.managers_database.view_manager',compact('managers','manager_type','management_level','sport_type','sport_gender',
            'country','state'));
    }


    /**
     * Searching Managers based upon the parameters submitted by the user
     * @param Request $request
     */
    public function searchManagers(Request $request)
    {
        $name='null';
        $manager_type='null';
        $sport='null';
        $sport_gender='null';
        $country = 'null';
        $state='null';

        if($request->has("coach_name") && trim($request->get("coach_name"))!="")
        {
            $name = $request->get("coach_name");
        }
        if($request->has("manager_type") && trim($request->get("manager_type"))!="" && $request->get("manager_type")!=0)
        {
            $manager_type = BasicSiteRepository::getManagerTypes()[$request->get("manager_type")];
        }
        if($request->has("sport_type") && trim($request->get("sport_type"))!="" && $request->get("sport_type") !=0)
        {
            $sport = BasicSiteRepository::getSportTypes()[$request->get("sport_type")];
        }
        if($request->has("sport_gender") && trim($request->get("sport_gender"))!="" && $request->get("sport_gender") != 0)
        {
            $sport_gender = SportsRepository::getSportsGender()[$request->get("sport_gender")];
        }
        if($request->has("country") && trim($request->get("country"))!="" && $request->get("country") != 0)
        {
            $state = BasicSiteRepository::getListOfCountries()[$request->get("country")];
        }
        if($request->has("state") && trim($request->get("state"))!="" && $request->get("state") != 0)
        {
            $state = BasicSiteRepository::getAmericanState()[$request->get("state")];
        }

        return redirect('admin/viewManager/'.$name.'/'.$manager_type.'/'.$sport.'/'.$sport_gender.'/'.$state);

    }


    /**
     * Delete manager from the database
     * @param Request $request
     */
    public function deleteManager(Request $request)
    {
        $manager = ManagersDatabase::destroy($request->get("manager_id"));

        return redirect('admin/viewManager')->with('manager_delete_status','successful');
    }

}
