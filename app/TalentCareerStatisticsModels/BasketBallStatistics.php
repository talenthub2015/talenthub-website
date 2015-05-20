<?php namespace talenthub\TalentCareerStatisticsModels;

use Illuminate\Database\Eloquent\Model;

class BasketBallStatistics extends Model {

    protected $table = "career_sport_statistics";

    protected $primaryKey = "statistic_id";

    protected $fillable = [
        'statistic_type','param1','param2','param3','param4','param5','param6','param7','param8','param9','param10',
        'param11','param12'
    ];


    /*
     * Data map for mapping data from database to user representable form
     */
    public static $dataMap = array(
        'year'=>'param1','age'=>'param2','GP' => 'param3', 'GS' => 'param4', 'PTS' => 'param5', 'OREB' => 'param6', 'REB' => 'param7',
        'AST' => 'param8', 'STL' => 'param9','BLK' => 'param10', 'TOV' => 'param11'
    );

}
