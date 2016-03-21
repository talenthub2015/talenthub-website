<?php
/**
 * Created by PhpStorm.
 * User: piyush sharma
 * Date: 14-02-2016
 * Time: 13:26
 */

namespace talenthub\Repositories\Cookies;

use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
use talenthub\Repositories\Cookies\Contracts\ICookies;

class ManagerCookies implements ICookies {

    const COOKIE_EXPIRE_TIME = 60;

    /**Setting Cookie with the response.
     * @param Response | RedirectResponse $response
     * @param $cookieType
     * @param $value - Value of Cookie
     * @return Response
     */
    public function setCookie($response, $cookieType, $value)
    {
        if(ManagerCookiesEnum::isValidName($cookieType))
        {
            $response->withCookie(cookie("unsigned::".$cookieType,$value,self::COOKIE_EXPIRE_TIME,null,null,false,false));
        }
        return $response;
    }

    /**
     * Getting Cookie value from the request.
     * @param Request $request
     * @param $cookieType
     * @return mixed
     */
    public function getCookie(Request $request, $cookieType)
    {
        return $request->cookie($cookieType);
    }
}