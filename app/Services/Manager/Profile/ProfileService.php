<?php
/**
 * Created by PhpStorm.
 * User: Piyush Sharma
 * Date: 8/1/2017
 * Time: 10:00 PM
 */

namespace talenthub\Services\Manager\Profile;


use Illuminate\Support\Facades\Session;
use talenthub\ManagerModels\ManagerProfile;
use talenthub\Repositories\SiteSessions;
use talenthub\User;

class ProfileService implements IProfileService
{
    public function GetMangerProfileData($profileId){
        if($profileId)
        {
            return $this->GetMangerProfileDataByProfileId($profileId);
        }
        return $this->GetMangerProfileDataBySessionId();
    }

    private function GetMangerProfileDataBySessionId(){
        $manager = ManagerProfile::where('user_id', '=', session(SiteSessions::USER_ID))->firstOrFail();

        Session::put(SiteSessions::MANGER_PROFILE_ID, $manager->profile_id);

        return $this->GetManagerProfileInfo($manager);
    }

    private function GetMangerProfileDataByProfileId($profileId){
        $manager = ManagerProfile::find($profileId);
        return $this->GetManagerProfileInfo($manager);
    }

    private function GetManagerProfileInfo($manager){
        foreach($manager->CareerHistory as $careerHistory){
            $careerHistory->Achievements;
        }
        $manager->verification;
        $manager = $manager->toArray();
        $manager_additional_info = User::find($manager["user_id"]);
        //Selecting Required Fields from User table
        $manager = array_merge($manager, ["user_type" => $manager_additional_info->user_type,
            "sport_type" => $manager_additional_info->sport_type, "management_level" => $manager_additional_info->management_level,
            "profile_image_path" => $manager_additional_info->profile_image_path]);

        return $manager;
    }
}