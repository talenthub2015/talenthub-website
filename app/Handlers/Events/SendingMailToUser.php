<?php namespace talenthub\Handlers\Events;

use Illuminate\Support\Facades\Mail;
use talenthub\Events\SendMail;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class SendingMailToUser {

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  SendMail  $event
	 * @return void
	 */
	public function handle(SendMail $event)
	{
        $view="";
        $view_bcc = "";
        $data=$event->viewData;
        $subject="";
		switch($event->mailType)
        {
            case SendMail::MAIL_TYPE_USER_CONFIRMATION:
                $view="emails.registration_confirmation";
                $view_bcc = "emails.registration_notification_internal_team";
                $subject="Confirm Talenthub Account";
                $subject_bcc = "New User registered";
                $event->bcc = ['izaacsomers@gmail.com','philipmngadi@gmail.com','kylewestman@talenthubapp.com'];
                break;

            case SendMail::MAIL_TYPE_USER_PASSWORD_REST:
                $view="emails.";
                $subject="";
                break;

            case SendMail::MAIL_TYPE_CONTACT_MANAGER:

                $view = "emails.contact_manager";
                $subject = $data["talent"]->first_name." ".$data["talent"]->last_name."::".$data["talent"]->sport_type." Player, looking for sports scholarship";

                break;

            case SendMail::MAIL_TYPE_REQUEST_RECOMMENDATION:

                $view = "emails.request_recommendation";
                $subject = $data["userProfile"]->first_name." ".$data["userProfile"]->last_name." requested you for your recommendation.";

                break;

            default:

                break;
        }

        Mail::send($view, compact('data'), function($message) use ($event,$subject)
        {
            $message->to($event->mailTo)->subject($subject);

            if(count($event->cc)>0)
            {
                foreach($event->cc as $cc_address)
                {
                    $message->cc($cc_address);
                }
            }
        });
        if(count($event->bcc)>0)
        {
            foreach($event->bcc as $bcc_address)
            {
                Mail::send($view_bcc, compact('data'), function($message) use ($event,$subject_bcc,$bcc_address)
                {
                    $message->subject($subject_bcc);
                    $message->to($bcc_address);
                });
            }
        }
	}

}
