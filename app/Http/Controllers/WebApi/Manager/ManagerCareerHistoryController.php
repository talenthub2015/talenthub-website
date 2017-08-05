<?php namespace talenthub\Http\Controllers\WebApi\Manager;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use talenthub\Http\Controllers\WebApi\RequestStatusEnum;
use talenthub\Http\Controllers\WebApi\WebApiBase;
use talenthub\Http\Requests;
use Illuminate\Http\Request;
use talenthub\ManagerModels\ManagerCareerHistory;
use talenthub\ManagerModels\ManagerCareerHistoryAchievement;
use talenthub\ManagerModels\ManagerProfile;
use talenthub\Repositories\SiteSessions;

class ManagerCareerHistoryController extends WebApiBase
{
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

            $careerHistories = $request->career_history;
            foreach($careerHistories as $careerHistory)
            {
                $managerCareerHistory=null;

                //Checking if career history already exists
                if($managerCareerHistory = ManagerCareerHistory::CareerHistoryExists($managerProfile->profile_id,$careerHistory["career_year"]))
                {
                }
                else
                {
                    $managerCareerHistory = ManagerCareerHistory::create(['profile_id'=>$managerProfile->profile_id,
                        'career_year'=>$careerHistory["career_year"]]);
                }

                $achievements = $careerHistory["achievements"];

                foreach($achievements as $achievement)
                {
                    //Checking if Achievement already exists for Career History
                    if(ManagerCareerHistoryAchievement::AchievementExists($managerCareerHistory->id,$achievement["achievement"]))
                    {

                    }
                    else
                    {
                        $managerCareerHistory->Achievements()->save(new ManagerCareerHistoryAchievement(['achievement'=>$achievement["achievement"]]));
                    }
                }
                //Removing Obselete Achievements
                ManagerCareerHistoryAchievement::RemoveObseleteAchievement($managerCareerHistory,$achievements);
            }
            ManagerCareerHistory::RemoveObseleteCareerHistory($managerProfile,$careerHistories);
        });
        $this->sendResponse();
    }

    /**Get Whole career History of a Manager
     */
    public function getCareerHistory(Request $request)
    {
        $managerProfile = null;
        try
        {
            $managerProfile = ManagerProfile::getManagerProfile(Session::get(SiteSessions::USER_ID));
        }
        catch(ModelNotFoundException $e)
        {
            $this->updateRequestStatus(RequestStatusEnum::MODEL_NOT_FOUND);
            return $this->sendResponse();
        }
        $managerCareerHistory = ManagerCareerHistory::getCareerHistoryAndAchievements($managerProfile->profile_id);
        return $this->sendResponse(["careerHistory"=>$managerCareerHistory]);
    }

}
