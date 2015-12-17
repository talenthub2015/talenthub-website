<?php namespace talenthub\Handlers\Events;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use talenthub\Events\NotifyUser;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use talenthub\Notifications;

class NotificationSaved {

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
	 * @param  NotifyUser  $event
	 * @return void
	 */
	public function handle(NotifyUser $event)
	{
        if($event->notification_type == Notifications::NOTIFICATION_TYPE_FAVOURITE)
        {
            $exiting = DB::table('notifications')->where('notification_to','=',$event->notification_to)
                                            ->where('notification_from','=',$event->notification_from)
                                            ->where('notification_type','=',$event->notification_type)
                                            ->where('source_id','=',$event->source_id)
                                            ->where('notification_on','>',Carbon::now()->subMonth(1))
                                            ->get();
            if(count($exiting)==0)
            {
                DB::table('notifications')
                    ->insert([
                        'notification_to'   =>  $event->notification_to,
                        'notification_from' =>  $event->notification_from,
                        'status'            =>  Notifications::NOTIFICATION_STATUS_UNREAD,
                        'notification_type' =>  $event->notification_type,
                        'source_id'         =>  $event->source_id,
                        'notification_on'   =>  Carbon::now()
                    ]);
            }

        }
        else
        {
            DB::table('notifications')
                ->insert([
                    'notification_to'   =>  $event->notification_to,
                    'notification_from' =>  $event->notification_from,
                    'status'            =>  Notifications::NOTIFICATION_STATUS_UNREAD,
                    'notification_type' =>  $event->notification_type,
                    'source_id'         =>  $event->source_id,
                    'notification_on'   =>  Carbon::now()
                ]);
        }
	}

}
