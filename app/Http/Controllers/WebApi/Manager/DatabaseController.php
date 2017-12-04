<?php namespace talenthub\Http\Controllers\WebApi\Manager;

use Illuminate\Http\Request;
use talenthub\Http\Controllers\WebApi\WebApiBase;
use talenthub\Services\Manager\Database\IManagerDatabaseService;

class DatabaseController extends WebApiBase {

    private $_managerDatabaseService;

    /**
     * DatabaseController constructor.
     * @param IManagerDatabaseService $managerDatabaseService
     */
    public function __construct(IManagerDatabaseService $managerDatabaseService)
    {
        $this->_managerDatabaseService = $managerDatabaseService;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function searchTalents(Request $request){
        return $this->sendResponse($this->_managerDatabaseService->searchTalentProfiles($request));
    }

}
