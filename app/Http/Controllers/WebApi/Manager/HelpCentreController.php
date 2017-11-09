<?php namespace talenthub\Http\Controllers\WebApi\Manager;

use Illuminate\Http\Request;
use talenthub\Http\Controllers\WebApi\RequestStatusEnum;
use talenthub\Http\Controllers\WebApi\WebApiBase;
use talenthub\Services\Manager\HelpCentre\IHelpCentreService;

class HelpCentreController extends WebApiBase {

    private $helpCentreService;

    /**
     * HelpCentreController constructor.
     * @param IHelpCentreService $helpCentreService
     */
    public function __construct(IHelpCentreService $helpCentreService)
    {
        $this->helpCentreService = $helpCentreService;
    }

    public function postQuery(Request $request){
        if(!$request->has('managerQuery'))
        {
            $this->updateRequestStatus(RequestStatusEnum::DATA_VALIDATION_ERROR);
            return $this->sendResponse();
        }

        if($this->helpCentreService->SaveQuery($request))
        {
            return $this->sendResponse();
        }
        $this->updateRequestStatus(RequestStatusEnum::INTERNAL_ERROR);
        return $this->sendResponse();

    }

}
