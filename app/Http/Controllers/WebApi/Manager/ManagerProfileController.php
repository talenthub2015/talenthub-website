<?php namespace talenthub\Http\Controllers\WebApi\Manager;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use talenthub\Http\Controllers\WebApi\RequestStatusEnum;
use talenthub\Http\Controllers\WebApi\WebApiBase;
use talenthub\Http\Requests;
use talenthub\Http\Controllers\Controller;

use Illuminate\Http\Request;
use talenthub\ManagerModels\ManagerCareerHistory;
use talenthub\ManagerModels\ManagerCareerHistoryAchievement;
use talenthub\ManagerModels\ManagerProfile;
use talenthub\Repositories\BasicSiteRepository;
use talenthub\Repositories\SiteConstants;
use talenthub\Repositories\SiteSessions;
use talenthub\Repositories\UserProfileRepository;
use talenthub\User;

class ManagerProfileController extends WebApiBase
{

    /**
     * Retrieves ManagerProfile Model, and send back to the client
     * @return JSON result
     */
    public function getProfileData()
    {
        $manager = [];
        try {
            $manager = ManagerProfile::where('user_id', '=', session(SiteSessions::USER_ID))->firstOrFail();
            $manager = $manager->toArray();
            $manager_additional_info = User::find(session(SiteSessions::USER_ID));
            //Selecting Required Fields from User table
            $manager = array_merge($manager, ["user_type" => $manager_additional_info->user_type,
                "sport_type" => $manager_additional_info->sport_type, "management_level" => $manager_additional_info->management_level,
                "profile_image_path" => $manager_additional_info->profile_image_path]);
        } catch (ModelNotFoundException $e) {
            $this->error_message = "Manager not found";
            $this->updateRequestStatus(RequestStatusEnum::MODEL_NOT_FOUND);
        }

        return $this->sendResponse($manager);
    }


    /**
     * Saving Manager Profile Data
     * @return mixed
     */
    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'dob' => 'required|date',
            'gender' => 'required | in:' . strtolower(implode(',', array_diff(UserProfileRepository::getUserGender(), [0 => "--Select Gender--"]))),
            'nationality' => 'required',
            'street_address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'country' => 'required',
            'bio' => 'required'
        ]);

        if ($validator->fails()) {
            $this->updateRequestStatus(RequestStatusEnum::DATA_VALIDATION_ERROR);
            return $this->sendResponse($validator->failed());
        }
        $managerProfile = ManagerProfile::where('user_id', '=', session(SiteSessions::USER_ID))->first();
        $managerProfile->UpdateManagerProfile($request);
        return $this->sendResponse($managerProfile->toArray());
    }


    /*Update Career History of a Manager*/
    public function updateCareerHistory(Request $request)
    {
        $validator = Validator::make($request->all(), [

        ]);

        DB::transaction(function() use($request)
        {
            $managerProfile = ManagerProfile::where('user_id', '=', session(SiteSessions::USER_ID))->first();
            $managerProfile->institution_type = $request->institution_type;
            $managerProfile->institution_name = $request->institution_name;
            $managerProfile->save();

            $careerHistories = $request->careerHistory;
            foreach($careerHistories as $careerHistory)
            {
                $managerCareerHistory=null;

                //Checking if career history already exists
                if($managerCareerHistory = ManagerCareerHistory::CareerHistoryExists($managerProfile->profile_id,$careerHistory["year"]))
                {
                }
                else
                {
                    $managerCareerHistory = ManagerCareerHistory::create(['profile_id'=>$managerProfile->profile_id,
                        'career_year'=>$careerHistory["year"]]);
                }

                $achievements = $careerHistory["achievement"];

                foreach($achievements as $achievement)
                {
                    //Checking if Achievement already exists for Career History
                    if(ManagerCareerHistoryAchievement::AchievementExists($managerCareerHistory->id,$achievement["info"]))
                    {

                    }
                    else
                    {
                        $managerCareerHistory->Achievements()->save(new ManagerCareerHistoryAchievement(['achievement'=>$achievement["info"]]));
                    }
                }
                //Removing Obselete Achievements
                ManagerCareerHistoryAchievement::RemoveObseleteAchievement($managerCareerHistory,$achievements);
            }
            ManagerCareerHistory::RemoveObseleteCareerHistory($managerProfile,$careerHistories);
        });
        $this->sendResponse();
    }
}
