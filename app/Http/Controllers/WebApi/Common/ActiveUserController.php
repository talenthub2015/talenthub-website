<?php namespace talenthub\Http\Controllers\WebApi\Common;

use talenthub\Http\Controllers\WebApi\RequestStatusEnum;
use talenthub\Http\Controllers\WebApi\WebApiBase;
use talenthub\Services\Common\User\IUserService;

class ActiveUserController extends WebApiBase {

    private $_userService;

    /**
     * ActiveUserController constructor.
     * @param IUserService $userService
     */
    public function __construct(IUserService $userService)
    {
        $this->_userService = $userService;
    }

    /**
     * @return mixed
     */
    public function getActiveUser(){
        $user = $this->_userService->getActiveUser();
        if(!$user)
        {
            $this->statusCode = RequestStatusEnum::MODEL_NOT_FOUND;
            return $this->sendResponse();
        }
        return $this->sendResponse($user->toArray());
    }

}
