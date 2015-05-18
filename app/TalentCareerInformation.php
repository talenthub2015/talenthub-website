<?php namespace talenthub;

use Illuminate\Database\Eloquent\Model;
use talenthub\Repositories\SiteConstants;
use talenthub\Repositories\SportsRepository;

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
                return $this->hasMany('talenthub\TalentCareerStatisticsModels\BaseBallStatistics','career_id');
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

}
