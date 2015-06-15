<?php namespace talenthub\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use talenthub\Http\Requests;
use talenthub\Http\Controllers\Controller;

use Illuminate\Http\Request;
use talenthub\Repositories\SiteSessions;
use talenthub\UserProfile;
use talenthub\UserSettings;

class SettingsController extends Controller
{

    /**
     * Type of Privacy options available
     */
    const PRIVACY_TYPE_PROFILE = "privacy_type_profile";
    const PRIVACY_TYPE_VIDEOS = "privacy_type_videos";
    const PRIVACY_TYPE_IMAGES = "privacy_type_images";

    //Value accepted for a privacy type
    const PRIVACY_SET = "yes";
    const PRIVACY_UNSET = "no";


    /**
     *Showing Privacy Settings
     */
    public function privacySettings()
    {
        $userSettings = UserSettings::where('user_id','=',Session::get(SiteSessions::USER_ID))
            ->whereRaw("setting_type in ('".self::PRIVACY_TYPE_PROFILE."','".self::PRIVACY_TYPE_VIDEOS."','".self::PRIVACY_TYPE_IMAGES."')")
            ->get()->toArray();

        return view('profile.settings.privacy_settings',compact('userSettings'));
    }


    /**
     * Saving and Updating Privacy Settings of a user
     * @param Request $request
     */
    public function updatePrivacySettings(Request $request)
    {
        $settingCovered = array();

        if($request->has("privacy_settings") && count($request->get("privacy_settings"))>0)
        {
            foreach($request->get("privacy_settings") as $key=>$value)
            {
                $userSetting=null;
                $updateSetting=null;
                if($value == self::PRIVACY_TYPE_PROFILE)
                {
                    $userSetting = UserSettings::where('user_id','=',Session::get(SiteSessions::USER_ID))
                        ->where('setting_type','=',self::PRIVACY_TYPE_PROFILE)->get();
                    array_push($settingCovered,self::PRIVACY_TYPE_PROFILE);
                }
                if($value == self::PRIVACY_TYPE_VIDEOS)
                {
                    $userSetting = UserSettings::where('user_id','=',Session::get(SiteSessions::USER_ID))
                        ->where('setting_type','=',self::PRIVACY_TYPE_VIDEOS)->get();
                    array_push($settingCovered,self::PRIVACY_TYPE_VIDEOS);
                }
                if($value == self::PRIVACY_TYPE_IMAGES)
                {
                    $userSetting = UserSettings::where('user_id','=',Session::get(SiteSessions::USER_ID))
                        ->where('setting_type','=',self::PRIVACY_TYPE_IMAGES)->get();

                    array_push($settingCovered,self::PRIVACY_TYPE_IMAGES);
                }


                if(count($userSetting) >= 1)
                {
                    $updateSetting = $userSetting[0];
                    $updateSetting->setting_value = self::PRIVACY_SET;
                }
                else if(count($userSetting) == 0)
                {
                    $updateSetting = new UserSettings();
                    $updateSetting->user_id = Session::get(SiteSessions::USER_ID);
                    $updateSetting->setting_type = $value;
                    $updateSetting->setting_value = self::PRIVACY_SET;
                }

                if(count($userSetting)>1)
                {
                    for($i=1;$i<count($userSetting);$i++)
                    {
                        $userSetting[$i]->delete();
                    }
                }
                $updateSetting->save();
            }
        }

        $uncoveredSettings = array_diff([self::PRIVACY_TYPE_PROFILE,self::PRIVACY_TYPE_VIDEOS,self::PRIVACY_TYPE_IMAGES],$settingCovered);

        if(count($uncoveredSettings)>0)
        {
            foreach($uncoveredSettings as $privacySetting)
            {
                UserSettings::where('user_id','=',Session::get(SiteSessions::USER_ID))
                    ->where('setting_type','=',$privacySetting)->delete();
            }
        }

        return redirect('settings/privacy')->with(['privacy_update_status'=>'successful']);
    }


    /**
     *View the page for general Settings
     */
    public function generalSettings()
    {
        return view('profile.settings.general_settings',compact('userSettings'));
    }

}
