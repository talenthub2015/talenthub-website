<?php namespace talenthub\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use talenthub\Http\Requests;
use talenthub\Http\Controllers\Controller;

use Illuminate\Http\Request;
use talenthub\Media\Images;
use talenthub\Repositories\SiteSessions;
use talenthub\Repositories\StorageLocationsRepository;
use talenthub\UserProfile;
use talenthub\UserSettings;

class ImageController extends Controller {

    /**
     * Display all videos of a user on the page.
     *
     * @return Response
     */
    public function index($id)
    {
        if($this->checkIfGuestDoNotHavePermission($id,UserSettings::PRIVACY_TYPE_IMAGES))
        {
            return redirect('/');
        }

        $images = null;
        $userProfile = null;

        try{
            $userProfile = UserProfile::findOrFail($id);
            $userProfile->getMutatedData = false;
            $images = $userProfile->images;
        }
        catch(ModelNotFoundException $e)
        {
            return abort(404);
        }

        return view('profile.userMedia.images',compact('images','userProfile'));
    }


    /**
     * Storing videos of a user on the page.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if(!$request->hasFile("image"))
        {
            return redirect()->back()->withErrors(["imageUploaded"=>'image not found']);
        }

        $validator = Validator::make($request->all(), ['image'=>'required','title'=>'required','descriptions'=>'required']);
        $imageFile = $request->file('image');

        $imageExt = $imageFile->getClientOriginalExtension();
        if(array_search(strtolower($imageExt),['jpg','jpeg','png','gif']))
        {
            return redirect()->back()->withErrors(["imageUploaded"=>'File extension is not supported.']);
        }
        if($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->back()->withErrors($validator->errors());
        }

        $fileName=hash("md5",$imageFile->getClientOriginalName().Session::get(SiteSessions::USER_ID).Session::get(SiteSessions::USER_NAME)).".".$imageFile->getClientOriginalExtension();

        $userProfile = UserProfile::find(Session::get(SiteSessions::USER_ID));

        //Saving Image

//            $image = Image::canvas(300, 300);
//            $image_updated  = Image::make($imageFile)->resize(300, 300,function($constraint){
//                $constraint->aspectRatio();
//            });
//            $image->insert($image_updated, 'center');

            $image = Image::make($imageFile);
            $fileName=hash("md5",time().Session::get(SiteSessions::USER_ID).Session::get(SiteSessions::USER_NAME)).".".$imageFile->getClientOriginalExtension();

            $this->createImageSourceDirectories(StorageLocationsRepository::USER_DIRECTORY_TYPE_SPORT_IMAGES);

            $image->save(public_path().StorageLocationsRepository::USER_SPORT_IMAGES_STORAGE_PATH.$fileName);

        $imageRecord = new Images();
        $imageRecord->user_id = Session::get(SiteSessions::USER_ID);
        $imageRecord->title = $request->get("title");
        $imageRecord->descriptions = $request->get("descriptions");
        $imageRecord->image_url = url(StorageLocationsRepository::USER_SPORT_IMAGES_STORAGE_PATH.$fileName);
        $imageRecord->added_on = Carbon::now();

        $imageRecord->save();

        return redirect('profile/'.Session::get(SiteSessions::USER_ID).'/Images');
    }


    /**
     *Check is directory exists or not , if not then creates the directories
     */
    public function createImageSourceDirectories($type)
    {
        //Creating Directories for User Profile Images
        if($type == StorageLocationsRepository::USER_DIRECTORY_TYPE_SPORT_IMAGES)
        {
            if(!file_exists(public_path().StorageLocationsRepository::USER_SPORT_IMAGES_STORAGE_PATH))
            {
                $result = File::makeDirectory(public_path().StorageLocationsRepository::USER_SPORT_IMAGES_STORAGE_PATH, 0775, true);
            }
        }
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

        if(Auth::guest() && $userProfileSetting != null && $userProfileSetting->setting_value == UserSettings::PRIVACY_SET)
        {
            return true;
        }
        return false;
    }

}
