<?php
/**
 * Created by PhpStorm.
 * User: Piyush Sharma
 * Date: 11/12/2017
 * Time: 9:08 PM
 */

namespace talenthub\Services\Common;


interface IEmailService
{
    public function SendEmail($to, $from, $header);
}