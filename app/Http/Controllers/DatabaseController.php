<?php namespace talenthub\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use talenthub\Http\Requests;
use talenthub\Http\Controllers\Controller;

use Illuminate\Http\Request;
use talenthub\ManagerDatabaseModel\ManagersDatabase;
use talenthub\Repositories\BasicSiteRepository;
use talenthub\Repositories\SiteConstants;
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
        $sport_gender = array_map('ucfirst',array_merge(['0'=>'-- Select Option --'],SportsRepository::getSportsGender()));
        $state = array_map('ucfirst',array_merge(['0' => "-- Select State --"],BasicSiteRepository::getAmericanState()));
        $institution_type = array_map('ucfirst',UserProfileRepository::getInstituteType());
        $country = array_map('ucfirst',BasicSiteRepository::getListOfCountries());

        return view('database.database_home',compact('userProfile','sport_gender','state','institution_type','country'));
	}


    /**
     * Search for opportunities available for Student Talent and aspiring professionals
     * @param Request $request
     */
    public function searchOpportunities(Request $request)
    {
        $state='null';
        $institution_type = 'null';
        $gender = 'null';
        $sport_type = 'null';
        $country = 'null';

        $sport_type = Session::get(SiteSessions::USER_SPORT_TYPE);

        //If Sport Gender is "Male"
        if(array_search(Session::get(SiteSessions::USER_GENDER),UserProfileRepository::getUserGender()) == 1)
        {
            $gender=SportsRepository::getSportsGender()[1];
        }
        //If Sport gender is "Female"
        else if(array_search(Session::get(SiteSessions::USER_GENDER),UserProfileRepository::getUserGender()) == 2)
        {
            $gender=SportsRepository::getSportsGender()[2];
        }

        $talent_management_level = Session::get(SiteSessions::USER_MANAGEMENT_LEVEL);

        switch($talent_management_level)
        {
            case SiteConstants::USER_TALENT_MANAGEMENT_LEVEL_STUDENT:

                //If Institution type is "High School"
                $institution_type = $request->institution_type;

                $state = BasicSiteRepository::getAmericanState()[$request->state];

                break;


            case SiteConstants::USER_TALENT_MANAGEMENT_LEVEL_ASPIRING_PRO:

                $country = BasicSiteRepository::getListOfCountries()[$request->country];

                break;
        }

        //dd($managers);

        return redirect('database/talent-opportunities/'.$state.'/'.$institution_type.'/'.$gender.'/'.$sport_type.'/'.$country);
    }


    /**
     * Opportunities for Sport Talent - either Aspiring professional or Student
     * @param $state
     * @param $institution_tye
     * @param $gender
     * @param $sport_type
     */
    public function talentOpportunities($state=null,$institution_type=null,$gender=null,$sport_type=null,$country = null)
    {
        $talent_management_level = Session::get(SiteSessions::USER_MANAGEMENT_LEVEL);
        $managers = null;

        switch($talent_management_level)
        {
            case SiteConstants::USER_TALENT_MANAGEMENT_LEVEL_STUDENT:

                //Management level and Gender requested by the user.
                $managerManagementLevel = null;

                //If Institution type is "High School"
                if($institution_type == 1)
                {
                    $managerManagementLevel=SiteConstants::USER_MANAGER_MANAGEMENT_LEVEL_HIGH_SCHOOL;
                }
                //If Institution type is "University"
                else if($institution_type == 2)
                {
                    $managerManagementLevel=SiteConstants::USER_MANAGER_MANAGEMENT_LEVEL_UNIVERSITY;
                }

                $managers = ManagersDatabase::managerType(SiteConstants::USER_MANAGER_COACH)
                    ->managementLevel($managerManagementLevel)
                    ->state($state)
                    ->institutionType(UserProfileRepository::getInstituteType()[$institution_type])
                    ->sportGender($gender)
                    ->sport($sport_type)
                    ->paginate(25);


                break;


            case SiteConstants::USER_TALENT_MANAGEMENT_LEVEL_ASPIRING_PRO:

                $managers = ManagersDatabase::country($country)
                    ->sport($sport_type)
                    ->sportGender($gender)
                    ->whereIn('management_level',[SiteConstants::USER_MANAGER_MANAGEMENT_LEVEL_AMATEUR,SiteConstants::USER_MANAGER_MANAGEMENT_LEVEL_PRO,SiteConstants::USER_MANAGER_MANAGEMENT_LEVEL_SEMI_PRO])
                    ->paginate(25);
                break;
        }


        $managers_already_contacted = DB::table("managers_contacted")->where('user_id','=',Session::get(SiteSessions::USER_ID))->lists('manager_id');


        $userProfile=UserProfile::find(Session::get(SiteSessions::USER_ID));
        $userProfile->getMutatedData = false;
        $sport_gender = array_map('ucfirst',array_merge(['0'=>'-- Select Option --'],SportsRepository::getSportsGender()));
        $state = array_map('ucfirst',array_merge(['0' => "-- Select State --"],BasicSiteRepository::getAmericanState()));
        $institution_type = array_map('ucfirst',UserProfileRepository::getInstituteType());
        $country = array_map('ucfirst',BasicSiteRepository::getListOfCountries());


        return view('database.talent_database_search_result',compact('managers','managers_already_contacted','userProfile','sport_gender','state','institution_type','country'));
    }


    /**
     * Contacting Manager by Talent
     * @param Request $request
     */
    public function contactManager(Request $request)
    {
        $validator = Validator::make($request->all(),['manager_id'=>'required','talent_id'=>'required']);

        if($validator->fails())
        {
            return response()->json(['status'=>'error','error_type'=>'ID_MISSING']);
        }

        if(Session::get(SiteSessions::USER_ID) != $request->talent_id)
        {
            return response()->json(['status'=>'error','error_type'=>'TALENT_ID_INVALID']);
        }

        try
        {
            DB::table('managers_contacted')->insert(['user_id'=>$request->talent_id,'manager_id'=>$request->manager_id,'contacted_on'=>Carbon::now()]);
        }
        catch(QueryException $e)
        {
            return response()->json(['status'=>'error','error_type'=>'DATABASE_ERROR']);
        }
        return response()->json(['status'=>'successful']);
    }


}
