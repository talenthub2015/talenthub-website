<?php
/**
 * Created by PhpStorm.
 * User: Piyush Sharma
 * Date: 11/12/2017
 * Time: 9:10 PM
 */

namespace talenthub\Services\Common;


use Illuminate\Support\Facades\Mail;

class EmailService implements IEmailService
{
    const EMAIL_VIEW = "";

    public function SendEmail($to, $from, $subject, $header = null, $cc = [])
    {
        Mail::send(self::EMAIL_VIEW, compact('data'), function($message) use ($to, $from, $subject, $header, $cc)
        {
            $message->form($from);
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