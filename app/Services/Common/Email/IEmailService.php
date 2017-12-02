<?php
/**
 * Created by PhpStorm.
 * User: Piyush Sharma
 * Date: 11/12/2017
 * Time: 9:08 PM
 */

namespace talenthub\Services\Common\Email;


use talenthub\ManagerModels\HelpCentre;

interface IEmailService
{
    public function SendEmail(HelpCentre $helpCentre, $to, $from, $subject, $header, $cc = []);
}