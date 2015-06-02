<?php namespace talenthub\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use talenthub\Http\Requests;
use talenthub\Http\Controllers\Controller;

use Illuminate\Http\Request;
use talenthub\Media\Videos;
use talenthub\UserProfile;

class VideoController extends Controller {

	/**
	 * Display all videos of a user on the page.
	 *
	 * @return Response
	 */
	public function index($id)
	{
        $videos = null;
        $userProfile = null;

        try{
            $videos = Videos::all()->where('user_id','=',$id);
            $userProfile = UserProfile::findOrFail($id);
            $userProfile->getMutatedData = false;
        }
        catch(ModelNotFoundException $e)
        {
            return abort(404);
        }

        return view('profile.userMedia.videos',compact('videos','userProfile'));
	}

}
