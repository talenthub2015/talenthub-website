<?php namespace talenthub\TalentCareerStatisticsModels;

use Illuminate\Database\Eloquent\Model;

class TrackAndFieldStatistics extends Model {

    protected $table = "career_sport_statistics";

    protected $primaryKey = "statistic_id";

    protected $fillable = [
        'statistic_type','param1','param2','param3','param4','param5','param6','param7','param8','param9','param10'
    ];


    /*
     * Data map for mapping data from database to user representable form
     */
    public static $dataMap = array(
        'event_name'=>'param1','seasons'=>'param2','best1_min'=>'param3','best1_sec' => 'param4', 'best1_hun' => 'param5',
        'best1_date' => 'param6', 'best2_min' => 'param7', 'best2_sec' => 'param8', 'best2_hun' => 'param9',
        'best2_date' => 'param10'
    );

}
