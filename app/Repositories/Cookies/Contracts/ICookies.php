<?php
/**
 * Created by PhpStorm.
 * User: piyush sharma
 * Date: 09-02-2016
 * Time: 23:57
 */

namespace talenthub\Repositories\Cookies\Contracts;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


interface ICookies {


    /**Setting Cookie with the response.
     * @param Response | RedirectResponse $response
     * @param $cookieType
     * @return Response
     */
    public function setCookie($response, $cookieType, $value);

    /**
     * Getting Cookie value from the request.
     * @param Request $request
     * @param $cookieType
     * @return mixed
     */
    public function getCookie(Request $request, $cookieType);

}