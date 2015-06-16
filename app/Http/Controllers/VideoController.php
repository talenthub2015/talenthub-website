<?php namespace talenthub\Http\Controllers;

use Carbon\Carbon;
use Dotenv;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Session;
use talenthub\Http\Requests;
use talenthub\Http\Controllers\Controller;

use Illuminate\Http\Request;
use talenthub\Media\Videos;
use talenthub\Repositories\AssetsConstantRepository;
use talenthub\Repositories\SiteSessions;
use talenthub\User;
use talenthub\UserProfile;
use Madcoda\Youtube;
use talenthub\UserSettings;

class VideoController extends Controller {

	/**
	 * Display all videos of a user on the page.
	 *
	 * @return Response
	 */
	public function index($id)
	{
        if($this->checkIfGuestDoNotHavePermission($id,UserSettings::PRIVACY_TYPE_VIDEOS))
        {
            return redirect('/');
        }

        $videos = null;
        $userProfile = null;

        $youtube = new Youtube(array('key'=> Dotenv::findEnvironmentVariable("GOOGLE_API_KEY_YOUTUBE")));

        try{
            $userProfile = UserProfile::findOrFail($id);
            $userProfile->getMutatedData = false;
            $videos = $userProfile->videos;
        }
        catch(ModelNotFoundException $e)
        {
            return abort(404);
        }

        return view('profile.userMedia.videos',compact('videos','userProfile','youtube'));
	}


    /**
     * Storing videos of a user on the page.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $video = new Videos();
        $video->video_source = AssetsConstantRepository::VIDEO_SOURCE_YOUTUBE;
        $video->video_url= $request->get("video_url");
        $video->user_id = Session::get(SiteSessions::USER_ID);
        $video->title = $request->get("title");
        $video->descriptions = $request->get("descriptions");
        $video->added_on = Carbon::now();
        $video->save();

//    $youtube = new Youtube(array('key'=> Dotenv::findEnvironmentVariable("GOOGLE_API_KEY_YOUTUBE")));
//
//    var_dump($request->get("video_url"));
//    $video = $youtube->getVideoInfo($youtube->parseVIdFromURL($request->get("video_url")));
//        dd($video);
        return redirect('profile/'.Session::get(SiteSessions::USER_ID).'/videos');
    }




    /**
     * Checking if a user/Guest have permission for a given part or not
     * @param $profile_id
     * @param $privacy_type
     * @return boolean
     */
    public function checkIfGuestDoNotHavePermission($profile_id,$privacy_type)
    {
        $userProfileSetting = UserSettings::where('user_id','=',$profile_id)
            ->where('setting_type','=',$privacy_type)->first();

        if($userProfileSetting != null && $userProfileSetting->setting_value == UserSettings::PRIVACY_SET)
        {
            return true;
        }
        return false;
    }

}
