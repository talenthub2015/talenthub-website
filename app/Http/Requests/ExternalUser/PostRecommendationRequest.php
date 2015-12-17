<?php namespace talenthub\Http\Requests\ExternalUser;

use talenthub\Http\Requests\Request;

class PostRecommendationRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
        if(!$this->has("user_id") || !is_int((integer)$this->get("user_id")) ||
            !$this->has("recommendation_id") || !is_int((integer)$this->get("recommendation_id")))
        {
          return false;
        }
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'name'=>'required',
            'email'=>'required|email',
            'organisation'=>'required',
            'position'=>'required',
            'athletic_ability'=>'required|digits_between:1,10',
            'leadership'=>'required|digits_between:1,10',
            'team_player'=>'required|digits_between:1,10',
            'easy_to_work'=>'required|digits_between:1,10',
            'comment_athletic_ability'=>'required',
            'comment_player_personality'=>'required',
		];
	}

}
