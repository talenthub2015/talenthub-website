<?php namespace talenthub\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use talenthub\Events\NotifyUser;
use talenthub\Events\SendMail;
use talenthub\Http\Requests;
use talenthub\Http\Controllers\Controller;

use talenthub\Http\Requests\ExternalUser\PostRecommendationRequest;
use talenthub\Notifications;
use talenthub\Repositories\SiteConstants;
use talenthub\Repositories\SiteSessions;
use talenthub\Talent\Recommendations;
use talenthub\UserProfile;

class RecommendationController extends Controller {

	/** Show recommendation Page
	 * @return Response
	 */
	public function index()
	{
        $recommender_type = array_map('ucfirst',SiteConstants::getRecommenderType());
        return view('profile.talent.request_recommendation',compact('recommender_type'));
	}


    /**
     *Requesting recommendation from the person as specified in the form
     * @param Request $request
     */
    public function request(HttpRequest $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'recommender_type'=>'required|in:'.SiteConstants::RECOMMENDER_COACH.",".SiteConstants::RECOMMENDER_ATHLETE
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors());
        }

        $recommendation = new Recommendations();
        $recommendation->user_id = Session::get(SiteSessions::USER_ID);
        $recommendation->status =   SiteConstants::RECOMMENDATION_STATUS_WAITING;
        $recommendation->name   =   $request->get("name");
        $recommendation->email  =   $request->get("email");
        $recommendation->recommender_type   =   SiteConstants::getRecommenderType()[$request->get("recommender_type")];

        $recommendation->save();

        $userProfile = UserProfile::find(Session::get(SiteSessions::USER_ID));
        //Send Mail to the Desired Person for recommendation
        Event::fire(new SendMail(SendMail::MAIL_TYPE_REQUEST_RECOMMENDATION,$recommendation->email,[],["recommendation"=>$recommendation,"userProfile"=>$userProfile]));

        Session::flash('recommendation_request_status','success');
        return redirect()->back();
    }


    /**
     *External user posting recommendation for talent
     * @param Request $request
     */
    public function recommendationForm($user_id,$recommendation_id,$user_name)
    {
        if(is_null($user_id) || is_null($recommendation_id) || is_null($user_name))
        {
            return "Your link is incorrect, please use the correct link as provided in your mail";
        }

        $recommendationData=null;

        try {
            $recommendationData = Recommendations::findOrFail($recommendation_id);
            if($user_id != $recommendationData->user_id)
            {
                throw new ModelNotFoundException();
            }
        }
        catch(ModelNotFoundException $e)
        {
            return "Your link is incorrect, please use the correct link as provided in your mail";
        }
        return view("profile.guest.recommendation_form",compact('recommendationData'));
    }


    /**
     * Saving Recommendation provided by a user to the Talent
     * @param PostRecommendationRequest $request
     */
    public function saveRecommendation(PostRecommendationRequest $request)
    {
        $recommendation = null;
        try
        {
            $recommendation = Recommendations::findOrFail($request->get("recommendation_id"));
            if($request->get("user_id") != $recommendation->user_id)
            {
                throw new ModelNotFoundException();
            }
        }
        catch(ModelNotFoundException $e)
        {
            return redirect()->back()->withErrors(["model_not_found"=>"No record found with provided recommendation"]);
        }
        foreach($request->all() as $key =>$value)
        {
            if(isset($recommendation->$key))
            {
                $recommendation->$key = $value;
            }
        }
        $recommendation->status = SiteConstants::RECOMMENDATION_STATUS_COMPLETE;
        $recommendation->save();

        Event::fire(new NotifyUser($recommendation->user_id,null,Notifications::NOTIFICATION_TYPE_RECOMMENDATION,$recommendation->recommendation_id));

        return view('profile.guest.recommendationThanks');

    }

}
