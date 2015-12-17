<?php namespace talenthub\TalentCareerStatisticsModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use talenthub\Repositories\SiteSessions;
use talenthub\Repositories\SportsRepository;

class SwimmingStatistics extends Model
{

    protected $table = "career_sport_statistics";

    protected $primaryKey = "statistic_id";

    protected $fillable = [
        'statistic_type', 'param1', 'param2', 'param3', 'param4', 'param5', 'param6', 'param7'
    ];


    /*
     * Data map for mapping data from database to user representable form
     */
    public static $dataMap = array(
        'event_name' => 'param1', 'distance' => 'param2', 'type' => 'param3', 'min' => 'param4', 'sec' => 'param5',
        'hun' => 'param6', 'date' => 'param7'
    );


}
