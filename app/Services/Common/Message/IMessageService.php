<?php
/**
 * Created by PhpStorm.
 * User: Piyush Sharma
 * Date: 10/11/2017
 * Time: 9:20 PM
 */

namespace talenthub\Services\Common\Message;

use Illuminate\Http\Request;

interface IMessageService
{
    public function sendMessage(Request $request);
}