<?php namespace talenthub\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use talenthub\Http\Controllers\MessageController;
use talenthub\Notifications;
use talenthub\Repositories\SiteSessions;

class NavBarComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		view()->composer('templates.userHeader',function($view){

            $notifications = $this->getNotificationData();

            $message = $this->getMessageData();

            $view->with(['notifications'=>$notifications['notifications'],'unReadNotifications'=>$notifications['unReadNotifications'],'messageCount'=>$message]);
        });

        view()->composer('message.template.left_hand_side_menu',function($view){
            $message = $this->getMessageData();
            $view->with(['messageCount'=>$message]);
        });
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}


    /**
     * Get the notification data
     * @return array
     */
    public function getNotificationData()
    {
        //Counting the notifications need to presented to the user
        $count = DB::table('notifications')
            ->select(DB::raw("count(*) as count"))
            ->where('notification_to','=',Session::get(SiteSessions::USER_ID))
            ->whereIn('status',[Notifications::NOTIFICATION_STATUS_UNREAD,Notifications::NOTIFICATION_STATUS_READ])
            ->where('notification_on','>=',
                DB::raw("(select min(notification_on) from notifications where notification_to =".Session::get(SiteSessions::USER_ID).
                    " AND status = '".Notifications::NOTIFICATION_STATUS_UNREAD."')"))
            ->get();



        $unReadNotifications = DB::table('notifications')->select(DB::raw("count(*) as count"))
            ->where('notification_to','=',Session::get(SiteSessions::USER_ID))
            ->where('status','=',Notifications::NOTIFICATION_STATUS_UNREAD)
            ->get();

        $unReadNotifications = $unReadNotifications[0]->{'count'};

        if($count[0]->{'count'}<10)
            $count=10;



        $notifications = DB::table('notifications')
            ->leftjoin('users','users.user_id','=','notifications.notification_from')
            ->where('notifications.notification_to','=',Session::get(SiteSessions::USER_ID))
            ->where('notifications.notification_on','>=',Carbon::now()->subYear(1))
            ->selectRaw('notifications.*,users.first_name,users.last_name, users.user_type, users.management_level, users.profile_small_image_path, users.school_type')
            ->orderBy('notifications.notification_on','desc')
            ->take($count)
            ->get();

        return ['unReadNotifications'=>$unReadNotifications,'notifications'=>$notifications];
    }


    /**
     *Message Data
     */
    public function getMessageData()
    {
        $messageCount = DB::table('messages')->where('to_user_id','=',Session::get(SiteSessions::USER_ID))
            ->where('to_user_message_status','=',MessageController::MESSAGE_STATUS_UNREAD)
            ->selectRaw('count(*) as count')
            ->get();

        return $messageCount[0]->{'count'};
    }

}
