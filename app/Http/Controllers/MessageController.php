<?php namespace talenthub\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use talenthub\Http\Requests;
use talenthub\Http\Controllers\Controller;

use Illuminate\Http\Request;
use talenthub\Repositories\SiteSessions;
use talenthub\User;
use talenthub\UserProfile;

class MessageController extends Controller {

    const MESSAGE_STATUS_READ = "read";
    const MESSAGE_STATUS_UNREAD = "unread";
    const MESSAGE_STATUS_TRASH = "trash";

    /**
     *Showing messages details - Inbox
     */
    public function index()
    {
        $inboxMessages = null;
        $userProfile = UserProfile::find(Session::get(SiteSessions::USER_ID));
        //$inboxMessages = $userProfile->messages()->wherePivot('to_user_id','=',$userProfile->user_id)->paginate(10);
        $inboxMessages = DB::table('messages')
            ->join('users',function($join) use ($userProfile) {
                $join->on('users.user_id','=','messages.user_id')
                    ->where('messages.to_user_id','=',$userProfile->user_id)
                    ->where('to_user_message_status','!=',self::MESSAGE_STATUS_TRASH);
            })
            ->select('messages.*','users.first_name','users.last_name','users.profile_small_image_path','users.user_type',
                'users.management_level')
            ->orderBy('messages.sent_on','desc')
            ->paginate(15);
        //$sentMessages = $userProfile->messages()->wherePivot('user_id','=',$userProfile->user_id)->paginate(10);

        return view('message.messages',compact('userProfile','inboxMessages'));
    }


    /**
     *Showing messages details - Sent
     */
    public function sentMessages()
    {
        $sentMessages = null;
        $userProfile = UserProfile::find(Session::get(SiteSessions::USER_ID));
        //$inboxMessages = $userProfile->messages()->wherePivot('to_user_id','=',$userProfile->user_id)->paginate(10);
        $sentMessages = DB::table('messages')
            ->join('users',function($join) use ($userProfile) {
                $join->on('users.user_id','=','messages.to_user_id')
                    ->where('messages.user_id','=',$userProfile->user_id)
                    ->where('from_user_message_status','!=',self::MESSAGE_STATUS_TRASH);
            })
            ->select('messages.*','users.first_name','users.last_name','users.profile_small_image_path','users.user_type',
                'users.management_level')
            ->orderBy('messages.sent_on','desc')
            ->paginate(15);
        //$sentMessages = $userProfile->messages()->wherePivot('user_id','=',$userProfile->user_id)->paginate(10);

        return view('message.sentMessages',compact('userProfile','sentMessages'));
    }


    /**
     *View the message selected by the user
     */
    public function viewMessage($message_id)
    {
        $message_from_type = Input::get('message_type');
        $message=null;
        $reply_forward_to_id = null;
        //When Message is reading from Inbox
        if($message_from_type=="inbox")
        {
            //Updating Message Status to Read
            DB::table('messages')->where('message_id',$message_id)
                ->where('to_user_id',Session::get(SiteSessions::USER_ID))
                ->update(['to_user_message_status'=>self::MESSAGE_STATUS_READ]);

            $message = DB::table('messages')
                ->join('users',function($join) use ($message_id) {
                    $join->on('users.user_id','=','messages.user_id')
                        ->where('messages.message_id','=',$message_id);
                })
                ->select('messages.*','users.first_name','users.last_name','users.profile_small_image_path','users.user_type',
                    'users.management_level')
                ->get();
            $reply_forward_to_id=$message[0]->user_id;
        }
        //When Message is reading from Sent Box
        else if($message_from_type=="sent")
        {
            $message = DB::table('messages')
                ->join('users',function($join) use ($message_id) {
                    $join->on('users.user_id','=','messages.to_user_id')
                        ->where('messages.message_id','=',$message_id);
                })
                ->select('messages.*','users.first_name','users.last_name','users.profile_small_image_path','users.user_type',
                    'users.management_level')
                ->get();

            $reply_forward_to_id=$message[0]->to_user_id;
        }


        $message = $message[0];
        return view('message.viewMessage',compact('message','reply_forward_to_id'));
    }


    /**
     * Either replying or forwarding a message
     * @param Request $request
     */
    public function replyOrForwardMessage(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'message'=>'required',
            'to_user_id'=>'required|numeric'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors());
        }

        try
        {
            $userProfile = UserProfile::find(Session::get(SiteSessions::USER_ID));
            $userProfile->messages()->attach($request->to_user_id,
                ['subject'=>$request->subject,'message'=>$request->message,'sent_on'=>Carbon::now(),
                    'from_user_message_status'=>self::MESSAGE_STATUS_READ,'to_user_message_status'=>self::MESSAGE_STATUS_UNREAD]);
            $userProfile->save();
        }
        catch(ModelNotFoundException $e)
        {
            return redirect()->back()->withErrors(['user_error'=>'user not found']);
        }

        return redirect()->back()->with(['status'=>'successfull']);

    }


    /**
     *Posting a message to a user
     */
    public function sendMessage(Request $request)
    {
        if(!Auth::check())
        {
            return response()->json(['status'=>'error','type'=>'user_not_logged_in']);
        }

        $validator = Validator::make($request->all(),[
            'user_id'=> 'required',
            'to_user_id'=> 'required',
            'subject'=> 'required',
            'message'=> 'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['status'=>'error','type'=>'validation_error']);
        }


        try
        {
            $userProfile = UserProfile::find($request->user_id);
            $userProfile->messages()->attach($request->to_user_id,
                ['subject'=>$request->subject,'message'=>$request->message,'sent_on'=>Carbon::now(),
                    'from_user_message_status'=>self::MESSAGE_STATUS_READ,'to_user_message_status'=>self::MESSAGE_STATUS_UNREAD]);
            $userProfile->save();
        }
        catch(ModelNotFoundException $e)
        {
            return response()->json(['status'=>'error','type'=>'user_not_found']);
        }

        return response()->json(['status'=>'successful']);
    }


    /**
     *Changing status of a message as trash
     */
    public function moveToTrash(Request $request)
    {
        $message=null;
        $redirect_route="";

        if($request->message_type == "inbox")
        {
            $messages=DB::table('messages')->where('to_user_id',Session::get(SiteSessions::USER_ID))
                            ->where('message_id',$request->message_id)
                            ->update(['to_user_message_status'=>self::MESSAGE_STATUS_TRASH]);

            $redirect_route = "messages";
        }
        else if($request->message_type == "sent")
        {
            $messages=DB::table('messages')->where('user_id',Session::get(SiteSessions::USER_ID))
                ->where('message_id',$request->message_id)
                ->update(['from_user_message_status'=>self::MESSAGE_STATUS_TRASH]);

            $redirect_route = "sentMessages";
        }

        if($messages>0)
        {
            return redirect($redirect_route)->with(['move_message_trash_status'=>'successful']);
        }
        return redirect()->back()->with(['move_message_trash_status'=>'error']);
    }


}
