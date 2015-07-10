<?php namespace talenthub\Events;

use talenthub\Events\Event;

use Illuminate\Queue\SerializesModels;

class SendMail extends Event {

	use SerializesModels;

    const MAIL_TYPE_USER_CONFIRMATION = "user_account_confirmation_mail";
    const MAIL_TYPE_USER_PASSWORD_REST = "user_password_reset";
    const MAIL_TYPE_CONTACT_MANAGER = "contact_manager";
    const MAIL_TYPE_REQUEST_RECOMMENDATION = "request_recommendation";

    public $mailType;

    public $mailTo;

    public $cc = [];

    public $viewData;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct($mailType, $mailTo, $cc, $data)
	{
        $this->mailType = $mailType;
        $this->mailTo = $mailTo;
        $this->cc = $cc;
        $this->viewData = $data;
	}

}
