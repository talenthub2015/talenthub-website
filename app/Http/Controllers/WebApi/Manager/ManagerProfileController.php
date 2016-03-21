<?php namespace talenthub\Http\Controllers\WebApi\Manager;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use talenthub\Http\Controllers\WebApi\RequestStatusEnum;
use talenthub\Http\Controllers\WebApi\WebApiBase;
use talenthub\Http\Requests;
use talenthub\Http\Controllers\Controller;

use Illuminate\Http\Request;
use talenthub\ManagerModels\ManagerProfile;
use talenthub\Repositories\BasicSiteRepository;
use talenthub\Repositories\SiteConstants;
use talenthub\Repositories\SiteSessions;
use talenthub\Repositories\UserProfileRepository;

class ManagerProfileController extends WebApiBase {

    /**
     * Retrieves ManagerProfile Model, and send back to the client
     * @return JSON result
     */
    public function getProfileData()
    {
        $manager=[];
        try{
            $manager = ManagerProfile::where('user_id','=',session(SiteSessions::USER_ID))->firstOrFail();
            $manager = $manager->toArray();
        }
        catch(ModelNotFoundException $e) {
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
        $validator = Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'dob' => 'required|date',
            'gender' => 'required | in:'.strtolower(implode(',',array_diff(UserProfileRepository::getUserGender(),[0=>"--Select Gender--"]))),
            'nationality' => 'required',
            'street_address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'country' => 'required',
            'bio' => 'required'
        ]);

        if($validator->fails())
        {
            $this->updateRequestStatus(RequestStatusEnum::DATA_VALIDATION_ERROR);
            return $this->sendResponse($validator->failed());
        }
        $managerProfile = ManagerProfile::where('user_id','=',session(SiteSessions::USER_ID))->first();
        $managerProfile->UpdateManagerProfile($request);
        return $this->sendResponse($managerProfile->toArray());
    }
}
