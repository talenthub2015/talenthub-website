<?php namespace talenthub\Http\Controllers\WebApi\Manager;

use Illuminate\Http\Request;
use talenthub\Http\Controllers\WebApi\WebApiBase;

class HelpCentreController extends WebApiBase {

    public function postQuery(Request $request){
        return $this->sendResponse();
    }

}
