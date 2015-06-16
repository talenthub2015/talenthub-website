<?php namespace talenthub\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use talenthub\Http\Requests;
use talenthub\Http\Controllers\Controller;

use Illuminate\Http\Request;
use talenthub\Repositories\SiteSessions;
use talenthub\User;
use talenthub\UserProfile;
use talenthub\UserSettings;

class SettingsController extends Controller
{


    /**
     *Showing Privacy Settings
     */
    public function privacySettings()
    {
        $userSettings = UserSettings::where('user_id','=',Session::get(SiteSessions::USER_ID))
            ->whereRaw("setting_type in ('".UserSettings::PRIVACY_TYPE_PROFILE."','".UserSettings::PRIVACY_TYPE_VIDEOS."','".UserSettings::PRIVACY_TYPE_IMAGES."')")
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
                if($value == UserSettings::PRIVACY_TYPE_PROFILE)
                {
                    $userSetting = UserSettings::where('user_id','=',Session::get(SiteSessions::USER_ID))
                        ->where('setting_type','=',UserSettings::PRIVACY_TYPE_PROFILE)->get();
                    array_push($settingCovered,UserSettings::PRIVACY_TYPE_PROFILE);
                }
                if($value == UserSettings::PRIVACY_TYPE_VIDEOS)
                {
                    $userSetting = UserSettings::where('user_id','=',Session::get(SiteSessions::USER_ID))
                        ->where('setting_type','=',UserSettings::PRIVACY_TYPE_VIDEOS)->get();
                    array_push($settingCovered,UserSettings::PRIVACY_TYPE_VIDEOS);
                }
                if($value == UserSettings::PRIVACY_TYPE_IMAGES)
                {
                    $userSetting = UserSettings::where('user_id','=',Session::get(SiteSessions::USER_ID))
                        ->where('setting_type','=',UserSettings::PRIVACY_TYPE_IMAGES)->get();

                    array_push($settingCovered,UserSettings::PRIVACY_TYPE_IMAGES);
                }


                if(count($userSetting) >= 1)
                {
                    $updateSetting = $userSetting[0];
                    $updateSetting->setting_value = UserSettings::PRIVACY_SET;
                }
                else if(count($userSetting) == 0)
                {
                    $updateSetting = new UserSettings();
                    $updateSetting->user_id = Session::get(SiteSessions::USER_ID);
                    $updateSetting->setting_type = $value;
                    $updateSetting->setting_value = UserSettings::PRIVACY_SET;
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

        $uncoveredSettings = array_diff([UserSettings::PRIVACY_TYPE_PROFILE,UserSettings::PRIVACY_TYPE_VIDEOS,UserSettings::PRIVACY_TYPE_IMAGES],$settingCovered);

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
        $userProfile=UserProfile::find(Session::get(SiteSessions::USER_ID));
        return view('profile.settings.general_settings',compact('userProfile'));
    }


    /**
     * Updating Email or Password of a user as per selected choice of a user
     * @param Request $request
     */
    public function updateGeneralSettings(Request $request)
    {
        $settingType = $request->has("setting_type") ? $request->get("setting_type") : null;
        if ($settingType == null) {
            return redirect()->back()->withErrors(['Setting Type not specified by the user.']);
        }

        switch ($settingType)
        {
            case UserSettings::GENERAL_TYPE_EMAIL:
                $validator = Validator::make($request->all(),[
                    'email' =>'required|email|unique:users,username'
                ]);

                if($validator->fails())
                {
                    return redirect()->back()->with(['setting_type'=>UserSettings::GENERAL_TYPE_EMAIL])->withErrors($validator->errors());
                }

                $userProfile = User::find(Session::get(SiteSessions::USER_ID));

                $userProfile->username = $request->get("email");

                $userProfile->save();

                return redirect('settings/general')->with(["setting_type"=>UserSettings::GENERAL_TYPE_EMAIL,"general_update_status"=>"successful"]);

                break;

            case UserSettings::GENERAL_TYPE_PASSWORD:

                $validator = Validator::make($request->all(),[
                    'password'=>'required|confirmed|min:6'
                ]);

                if($validator->fails())
                {
                    return redirect()->back()->with(['setting_type'=>UserSettings::GENERAL_TYPE_PASSWORD])->withErrors($validator->errors());
                }

                $userProfile = User::find(Session::get(SiteSessions::USER_ID));

                $userProfile->password = $request->get("password");

                $userProfile->save();

                return redirect('settings/general')->with(["setting_type"=>UserSettings::GENERAL_TYPE_PASSWORD,"general_update_status"=>"successful"]);

                break;
        }

        return redirect('settings/general')->with(["general_update_status"=>"error"]);

    }

}
