<?php namespace talenthub;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use talenthub\Repositories\BasicSiteRepository;
use talenthub\Repositories\SiteConstants;
use talenthub\Repositories\SiteSessions;
use talenthub\Repositories\SportsRepository;
use talenthub\Repositories\UserProfileRepository;

class TalentCareerInformation extends Model {

	protected $table="career_information";

    protected $primaryKey = "career_id";

    protected $fillable=[
        'career_type','school_type','club_school_name','club_school_country','club_league_name','club_league_level',
        'club_season_played','club_average_league_status','school_team_reputation','school_team_side_level',
        'club_school_most_played_position','club_school_coach_name','club_school_coach_email',
        'club_school_coach_mobile_number','additional_information','from_date','to_date'
    ];

    public static $club_fillable = [
        'club_school_name','club_school_country','club_league_name','club_league_level',
        'club_season_played','club_average_league_status','club_school_most_played_position','club_school_coach_name',
        'club_school_coach_email','club_school_coach_mobile_number','additional_information'
    ];

    public static $school_fillable=[
        'school_type','club_school_name','club_school_country','school_team_reputation','school_team_side_level',
        'club_school_most_played_position','club_school_coach_name','club_school_coach_email',
        'club_school_coach_mobile_number','additional_information'
    ];


    /*
     * Variable used to check whether need to mutate values while retrieving values form database or saving in it.
     */
    public $getMutatedData = true;  //Getting Mutated data from database.
    public $setMutateData = true;   //Setting data to be mutated before saving to database


    /**
     *Relationship of Career information with sport statistics for respective sports
     */
    public function careerSportStatistics($sportType)
    {
        switch($sportType)
        {
            case SportsRepository::BASEBALL:
                return $this->hasMany('talenthub\TalentCareerStatisticsModels\BaseBallStatistics','career_id');
                break;

            case SportsRepository::BASKETBALL:
                return $this->hasMany('talenthub\TalentCareerStatisticsModels\BaseBallStatistics','career_id');
                break;

            case SportsRepository::FOOTBALL:
                return $this->hasMany('talenthub\TalentCareerStatisticsModels\BaseBallStatistics','career_id');
                break;

            case SportsRepository::RUGBY:
                return $this->hasMany('talenthub\TalentCareerStatisticsModels\BaseBallStatistics','career_id');
                break;

            case SportsRepository::SOCCER:
                return $this->hasMany('talenthub\TalentCareerStatisticsModels\BaseBallStatistics','career_id');
                break;

            case SportsRepository::SOFTBALL:
                return $this->hasMany('talenthub\TalentCareerStatisticsModels\BaseBallStatistics','career_id');
                break;

            case SportsRepository::SWIMMING:
                return $this->hasMany('talenthub\TalentCareerStatisticsModels\BaseBallStatistics','career_id');
                break;

            case SportsRepository::TENNIS:
                return $this->hasMany('talenthub\TalentCareerStatisticsModels\TennisStatistics','career_id');
                break;

            case SportsRepository::TRACK_FIELD:
                return $this->hasMany('talenthub\TalentCareerStatisticsModels\BaseBallStatistics','career_id');
                break;

            case SportsRepository::WATERPOLO:
                return $this->hasMany('talenthub\TalentCareerStatisticsModels\BaseBallStatistics','career_id');
                break;

            default:
                return false;
        }
    }


    /**
     *Relation between Career information and career information
     */
    public function careerReferences()
    {
        return $this->hasMany('talenthub\TalentCareerReferences','career_id');
    }


    /**
     * Mutating School type to have string value before saving
     * @param $school_type
     */
    public function setschoolTypeAttribute($school_type)
    {
        if($this->setMutateData)
        {
            $this->attributes["school_type"] = UserProfileRepository::getInstituteType()[$school_type];
        }
    }


    /**
     * Mutating value to have index value after retrieving it from database
     * @param $school_type
     */
    public function getschoolTypeAttribute($school_type)
    {
        if($this->getMutatedData)
        {
            return array_search($school_type,UserProfileRepository::getInstituteType());
        }
        return $school_type;
    }


    /**
     * Mutating Country to have string value before saving
     * @param $school_type
     */
    public function setclubSchoolCountryAttribute($country)
    {
        if($this->setMutateData)
        {
            $this->attributes["club_school_country"] = BasicSiteRepository::getListOfCountries()[$country];
        }
    }


    /**
     * Mutating country value to have index value after retrieving it from database
     * @param $school_type
     */
    public function getclubSchoolCountryAttribute($country)
    {
        if($this->getMutatedData)
        {
            return array_search($country,BasicSiteRepository::getListOfCountries());
        }
        return $country;
    }


    /**
     * Mutating Club League level to have string value before saving
     * @param $school_type
     */
    public function setclubLeagueLevelAttribute($league_level)
    {
        if($this->setMutateData)
        {
            $this->attributes["club_league_level"] = SportsRepository::getClubLeagueLevel()[$league_level];
        }
    }


    /**
     * Mutating Club League level  value to have index value after retrieving it from database
     * @param $school_type
     */
    public function getclubLeagueLevelAttribute($league_level)
    {
        if($this->getMutatedData)
        {
            return array_search($league_level,SportsRepository::getClubLeagueLevel());
        }
        return $league_level;
    }



    /**
     * Mutating Club League Status to have string value before saving
     * @param $school_type
     */
    public function setclubAverageLeagueStatusAttribute($league_status)
    {
        if($this->setMutateData)
        {
            $this->attributes["club_average_league_status"] = SportsRepository::getClubLeagueStatus()[$league_status];
        }
    }


    /**
     * Mutating Club League Status value to have index value after retrieving it from database
     * @param $school_type
     */
    public function getclubAverageLeagueStatusAttribute($league_status)
    {
        if($this->getMutatedData)
        {
            return array_search($league_status,SportsRepository::getClubLeagueStatus());
        }
        return $league_status;
    }


    /**
     * Mutating School Team Reputation to have string value before saving
     * @param $school_type
     */
    public function setschoolTeamReputationAttribute($school_reputation)
    {
        if($this->setMutateData)
        {
            $this->attributes["school_team_reputation"] = SportsRepository::getSchoolTeamReputation()[$school_reputation];
        }
    }


    /**
     * Mutating School Team Reputation value to have index value after retrieving it from database
     * @param $school_type
     */
    public function getschoolTeamReputationAttribute($school_reputation)
    {
        if($this->getMutatedData)
        {
            return array_search($school_reputation,SportsRepository::getSchoolTeamReputation());
        }
        return $school_reputation;
    }



    /**
     * Mutating School Team Side Level to have string value before saving
     * @param $school_type
     */
    public function setschoolTeamSideLevelAttribute($school_team_level)
    {
        if($this->setMutateData)
        {
            $this->attributes["school_team_side_level"] = SportsRepository::getSchoolTeamSideLevel()[$school_team_level];
        }
    }


    /**
     * Mutating School Team Side Level value to have index value after retrieving it from database
     * @param $school_type
     */
    public function getschoolTeamSideLevelAttribute($school_team_level)
    {
        if($this->getMutatedData)
        {
            return array_search($school_team_level,SportsRepository::getSchoolTeamSideLevel());
        }
        return $school_team_level;
    }



    /**
     * Mutating Most Played Position to have string value before saving
     * @param $school_type
     */
    public function setclubSchoolMostPlayedPositionAttribute($most_played_position)
    {
        if($this->setMutateData)
        {
            if($most_played_position != null || $most_played_position != "")
            {
                $this->attributes["club_school_most_played_position"] = SportsRepository::getSportPositions(Session::get(SiteSessions::USER_SPORT_TYPE))[$most_played_position];
            }
            else
            {
                $this->attributes["club_school_most_played_position"] = "";
            }
        }
    }


    /**
     * Mutating Most Played Position value to have index value after retrieving it from database
     * @param $school_type
     */
    public function getclubSchoolMostPlayedPositionAttribute($most_played_position)
    {
        if($this->getMutatedData)
        {
            return array_search($most_played_position,SportsRepository::getSportPositions(Session::get(SiteSessions::USER_SPORT_TYPE)));
        }
        return $most_played_position;
    }

}
