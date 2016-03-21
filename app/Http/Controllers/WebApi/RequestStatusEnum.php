<?php
/**
 * Created by PhpStorm.
 * User: piyush sharma
 * Date: 21-02-2016
 * Time: 00:12
 */

namespace talenthub\Http\Controllers\WebApi;


use talenthub\Repositories\BasicEnum;

/*
 * Enum Class for Request Status for API requests
 * */
abstract class RequestStatusEnum extends BasicEnum{
    const SUCCESS = "200";
    const NOT_FOUND = "404";
    const DATA_VALIDATION_ERROR = "411";
    const INTERNAL_ERROR = "500";
    const MODEL_NOT_FOUND = "600";
    const USER_NOT_LOGGED_IN = "999";
}