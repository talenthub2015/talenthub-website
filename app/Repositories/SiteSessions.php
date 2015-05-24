<?php
/**
 * Created by PhpStorm.
 * User: piyush sharma
 * Date: 12-05-2015
 * Time: 15:49
 */

namespace talenthub\Repositories;


use Illuminate\Support\Facades\Session;

class SiteSessions
{

    /*
     * Defined session attributes
     */
    const USER_ID = "user_id";
    const USER_NAME = "user_name";
    const USER_EMAIL = "user_email";
    const USER_TYPE = "user_type";
    const USER_MANAGEMENT_LEVEL = "user_management_level";
    const USER_SPORT_TYPE = "sport_type";

    const USER_COMPLETING_PROFILE_FIRST_TIME = "user_completing_profile_first_type";


    /**
     * Setting Session data of a user while login
     *
     * @param $user
     */
    public static function setLoginSessionData($user)
    {
        Session::put(self::USER_ID, $user->user_id);
        Session::put(self::USER_EMAIL, $user->username);
        Session::put(self::USER_NAME, $user->name !=""  ? $user->name : "User" );
        Session::put(self::USER_TYPE, $user->user_type);
        Session::put(self::USER_MANAGEMENT_LEVEL, $user->management_level);
        Session::put(self::USER_SPORT_TYPE, $user->sport_type);
    }

}