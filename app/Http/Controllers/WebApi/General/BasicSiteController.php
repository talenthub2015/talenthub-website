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
        //List Of countries
        $countries=BasicSiteRepository::getListOfCountries(true);
        array_shift($countries);
        $this->response['countries_list'] = $countries;

        return $this->sendResponse($this->response);
    }


    /*
     * List of Sports Available in the Application
     */
    public function getListOfSports(Request $request)
    {
        //List of Sports
        $sports = BasicSiteRepository::getSportTypes();
        array_shift($sports);
        $this->response['sports'] = $sports;
        return $this->sendResponse($this->response);
    }

}
