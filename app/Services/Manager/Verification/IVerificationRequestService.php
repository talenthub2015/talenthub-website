<?php
/**
 * Created by PhpStorm.
 * User: Piyush Sharma
 * Date: 7/23/2017
 * Time: 5:57 PM
 */

namespace talenthub\Services\Manager\Verification;


use Illuminate\Http\Request;

interface IVerificationRequestService
{
    function getVerificationRequest(Request $request);

    function saveVerificationRequest(Request $request);

    function saveVerificationRequestFiles(Request $request);
}