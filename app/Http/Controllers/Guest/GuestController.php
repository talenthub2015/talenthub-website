<?php namespace talenthub\Http\Controllers\Guest;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use League\Flysystem\Exception;
use talenthub\Http\Controllers\Controller;

use Illuminate\Http\Request;
use talenthub\Services\Manager\Profile\IProfileService;

class GuestController extends Controller {

    private $_profileService;

	public function __construct(IProfileService $profileService){
	    $this->_profileService = $profileService;
    }

    public function getManagerProfileView(Request $request){
	    if($request->id == null)
        {
            return new Exception("Id is null");
        }
        try{
            $manager = $this->_profileService->GetMangerProfileData($request->id);
        }
        catch (ModelNotFoundException $e) {
            $this->error_message = "Manager not found";
            $this->updateRequestStatus(RequestStatusEnum::MODEL_NOT_FOUND);
        }

        return view('guest.manager_profile', compact('manager'));
    }

}
