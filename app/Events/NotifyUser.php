<?php namespace talenthub\Events;

use talenthub\Events\Event;

use Illuminate\Queue\SerializesModels;

class NotifyUser extends Event {

	use SerializesModels;

    public $notification_to;
    public $notification_from;
    public $notification_type;
    public $source_id;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct($notification_to,$notification_from,$notification_type,$source_id)
	{
        $this->notification_to = $notification_to;
        $this->notification_from = $notification_from == null ? -9999 : $notification_from;
        $this->notification_type = $notification_type;
        $this->source_id = $source_id == null ? -9999 : $source_id;
	}

}
