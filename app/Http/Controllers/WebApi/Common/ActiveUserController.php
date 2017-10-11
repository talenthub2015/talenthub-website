<?php namespace talenthub\Http\Controllers\WebApi\Common;

use talenthub\Http\Controllers\WebApi\WebApiBase;

class ActiveUserController extends WebApiBase {

    //TODO :: Add IUserService and use it in the controller to get active user

    /**
     * ActiveUserController constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getActiveUser(){
        return $this->response();
    }

}
