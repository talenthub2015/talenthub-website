<?php
namespace talenthub\Http\Controllers\WebApi\Manager;

use Illuminate\Support\Facades\Validator;
use talenthub\Http\Controllers\WebApi\RequestStatusEnum;
use talenthub\Http\Controllers\WebApi\WebApiBase;
use Illuminate\Http\Request;
use talenthub\ManagerModels\Verification;
use talenthub\Repositories\SiteConstants;
use talenthub\Services\Manager\Verification\IVerificationRequestService;

class VerificationController extends WebApiBase {

    public $_verificationRequestService;

    public function __construct(IVerificationRequestService $verificationRequestService)
    {
        parent::__construct();
        $this->_verificationRequestService = $verificationRequestService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
	public function getVerificationRequest(Request $request)
	{
	    if(!$request->has('managerProfileId'))
        {
            $this->statusCode = RequestStatusEnum::DATA_VALIDATION_ERROR;
            return $this->sendResponse();
        }
        $verificationRequest = $this->_verificationRequestService->getVerificationRequest($request);
	    if(!$verificationRequest)
        {
            return $this->sendResponse([]);
        }
	    return $this->sendResponse($verificationRequest->toArray());
	}

	public function request(Request $request){
	    if(!$this->validateRequestForCoachAndAgent($request))
        {
            $this->statusCode = RequestStatusEnum::DATA_VALIDATION_ERROR;
            return $this->sendResponse([]);
        }

        $verification = $this->_verificationRequestService->saveVerificationRequest($request);
        $this->statusCode = RequestStatusEnum::SUCCESS;
        return $this->sendResponse($verification->toArray());
    }

    public function requestFilesUpload(Request $request){
	    $verificationFiles = $this->_verificationRequestService->saveVerificationRequestFiles($request);
	    $this->statusCode = RequestStatusEnum::SUCCESS;
	    return $this->sendResponse($verificationFiles);
	}

    /**
     * @param Request $request
     * @return bool
     */
    private function validateRequestForCoachAndAgent(Request $request)
    {
        if(SiteConstants::isAgent($request->user_type))
        {
            $validator = Validator::make($request->all(), [
                'agentLicenceNumber' => 'required',
                'issuedDate' => 'required',
                'expiryDate' => 'required'
            ]);
        }
        else
        {
            $validator = Validator::make($request->all(), [
                'club' => 'required',
                'clubCountry' => 'required',
                'leagueName' => 'required',
                'leagueWebsite' => 'required'
            ]);
        }
        return !$validator->fails();
    }
}
