<?php
/**
 * Created by PhpStorm.
 * User: piyush sharma
 * Date: 20-02-2016
 * Time: 23:59
 */

namespace talenthub\Http\Controllers\WebApi;


use Illuminate\Routing\Controller;

class WebApiBase extends Controller{
    /*Status Code for Request*/
    protected $statusCode;
    /*Response need to send back to the Client*/
    protected  $response;
    /*Error message, if any*/
    protected $error_message;
    /*Constructor initializing Status Code*/
    public function __construct()
    {
        //Default value of Status Code is Success.
        $this->statusCode = RequestStatusEnum::SUCCESS;
    }

    /**Updating request status.
     * @param $statusCode
     */
    public function updateRequestStatus($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    /**Returning the response
     * @param $response
     * @return mixed
     */
    public function sendResponse($response=[])
    {
        $this->response = $response != "" || $response != null ? $response : $this->response;
        $this->response["status_code"] = $this->statusCode;
        $this->response["error_message"] = $this->error_message;
        return response()->json($this->response,200);
    }
}