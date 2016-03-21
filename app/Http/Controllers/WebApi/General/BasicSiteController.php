<?php namespace talenthub\Http\Controllers\WebApi\General;


use Illuminate\Http\Request;
use talenthub\Http\Controllers\WebApi\WebApiBase;
use talenthub\Repositories\BasicSiteRepository;

class BasicSiteController extends WebApiBase {

    /**
     * Getting all the basic site constants required at front end and sending it to Client as JSON response
     * @param Request $request
     * @return mixed
     */
    public function getBasicSiteConstants(Request $request)
    {
        $countries=BasicSiteRepository::getListOfCountries(true);
        array_shift($countries);
        $this->response['countries_list'] = $countries;
        return $this->sendResponse($this->response);
    }

}
