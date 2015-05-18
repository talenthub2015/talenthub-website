<?php namespace talenthub\Http\Requests;

use Illuminate\Support\Facades\Session;
use talenthub\Http\Requests\Request;
use talenthub\Repositories\BasicSiteRepository;
use talenthub\Repositories\SiteSessions;
use talenthub\Repositories\SportsRepository;
use talenthub\Repositories\UserProfileRepository;
use talenthub\TalentCareerStatisticsModels\BaseBallStatistics;

class TalentCVRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{

//		return [
////            'positions[]'=>'in:'.implode(",",array_keys(SportsRepository::getSportPositions(Session::get(SiteSessions::USER_SPORT_TYPE)))),
////            'preferred_position'=>'required_with:positions|in:'.implode(",",array_keys(SportsRepository::getSportPositions(Session::get(SiteSessions::USER_SPORT_TYPE)))),
//            'club_club_school_country[0]'=>'not_in:'.implode(',',array_keys(BasicSiteRepository::getListOfCountries())),
////            'club_club_league_level[]'=>'not_in:0|in:'.implode(',',array_keys(SportsRepository::getClubLeagueLevel())),
////            'club_club_average_league_status[]'=>'not_in:0|in:'.implode(',',array_keys(SportsRepository::getClubLeagueStatus())),
////            'club_club_school_most_played_position[]'=>'in:'.implode(",",array_keys(SportsRepository::getSportPositions(Session::get(SiteSessions::USER_SPORT_TYPE)))),
//////            'club_club_school_coach_email[]'=>'email',
////            'club_club_school_coach_mobile_number[]'=>'digits_between:10,12',
////            'club_email[]'=>'email',
////            'club_contact_number[]'=>'digits_between:10,12',
//////            SportsRepository::getClubDataMap(BaseBallStatistics::$dataMap,true)['year']=>'digits:4',
//////            SportsRepository::getClubDataMap(BaseBallStatistics::$dataMap,true)['age']=>'digits_between:1,3|max:100',
////            'school_type[]'=>'not_in:0|in:'.implode(",",array_keys(UserProfileRepository::getInstituteType())),
////            'school_club_school_country[]'=>'not_in:0|in:'.implode(',',array_keys(BasicSiteRepository::getListOfCountries())),
////            'school_team_reputation[]'=>'not_in:0|in:'.implode(',',array_keys(SportsRepository::getSchoolTeamReputation())),
////            'school_team_side_level[]'=>'not_in:0|in:'.implode(',',array_keys(SportsRepository::getSchoolTeamSideLevel())),
////            'school_club_school_most_played_position[]'=>'not_in:0|in:'.implode(",",array_keys(SportsRepository::getSportPositions(Session::get(SiteSessions::USER_SPORT_TYPE)))),
////            'school_club_school_coach_email[]'=>'email',
////            'school_club_school_coach_mobile_number[]'=>'digits_between:10,12',
////            'school_email[]'=>'email',
////            'school_contact_number[]'=>'digits_between:10,12',
////            SportsRepository::getSchoolDataMap(BaseBallStatistics::$dataMap,true)['year']=>'digits:4',
////            SportsRepository::getSchoolDataMap(BaseBallStatistics::$dataMap,true)['age']=>'digits_between:1,3|max:100',
//		];


//        for($i=0;$i<count($this->request->positions);$i++)
//        {
//            $rules['positions.'.$i]="in:".implode(",",array_keys(SportsRepository::getSportPositions(Session::get(SiteSessions::USER_SPORT_TYPE))));
//        }
//
//        //dd($this->request);
//        return $rules;

	}

}
