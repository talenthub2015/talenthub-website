<?php
/**
 * Created by PhpStorm.
 * User: Piyush Sharma
 * Date: 10/11/2017
 * Time: 9:20 PM
 */

namespace talenthub\Services\Common\Message;

use Carbon\Carbon;
use Illuminate\Http\Request;
use talenthub\UserProfile;

class MessageService implements IMessageService
{

    const SUBJECT_CONTACT_MANAGER = "Hello";
    const MESSAGE_STATUS_READ = "read";
    const MESSAGE_STATUS_UNREAD = "unread";
    const MESSAGE_STATUS_TRASH = "trash";

    /**
     * @param Request $request
     */
    public function sendMessage(Request $request)
    {
        $userProfile = UserProfile::find($request->fromId);
        $userProfile->messages()->attach($request->toId, [
            'subject'=>self::SUBJECT_CONTACT_MANAGER,
            'message'=>$request->message,
            'sent_on'=>Carbon::now(),
            'from_user_message_status'=>self::MESSAGE_STATUS_READ,
            'to_user_message_status'=>self::MESSAGE_STATUS_UNREAD
        ]);
        return $userProfile->save();
    }
}