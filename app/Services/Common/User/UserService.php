<?php
/**
 * Created by PhpStorm.
 * User: Piyush Sharma
 * Date: 10/12/2017
 * Time: 10:45 PM
 */

namespace talenthub\Services\Common\User;


use Illuminate\Support\Facades\Session;
use talenthub\Exceptions\SessionException;
use talenthub\Repositories\SiteSessions;
use talenthub\User;

class UserService implements IUserService
{
    /**
     * @return User
     * @throws SessionException
     */
    public function getActiveUser()
    {
        $userId = Session::get(SiteSessions::USER_ID);
        if(!$userId)
        {
            throw new SessionException(SiteSessions::USER_ID." is not set");
        }
        return User::find($userId);

    }
}