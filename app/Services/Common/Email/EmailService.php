<?php
/**
 * Created by PhpStorm.
 * User: Piyush Sharma
 * Date: 11/12/2017
 * Time: 9:10 PM
 */

namespace talenthub\Services\Common\Email;


use Illuminate\Support\Facades\Mail;
use talenthub\ManagerModels\HelpCentre;

class EmailService implements IEmailService
{
    const EMAIL_VIEW = "emails.help_center_email_to_admin";

    public function SendEmail(HelpCentre $helpCenter,$to, $from, $subject, $header = null, $cc = [])
    {
        $user = $helpCenter->user()->toArray();
        Mail::send(self::EMAIL_VIEW, compact('helpCenter', 'user'), function($message) use ($to, $from, $subject, $header, $cc)
        {
            $message->from($from);
            $message->to($to)->subject($subject);

            if(count($cc) > 0)
            {
                foreach($cc as $cc_address)
                {
                    $message->cc($cc_address);
                }
            }
        });
    }
}