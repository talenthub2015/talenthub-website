<?php namespace talenthub\TalentCareerStatisticsModels;

use Illuminate\Database\Eloquent\Model;

class TennisStatistics extends Model {

    protected $table = "career_sport_statistics";

    protected $primaryKey = "statistic_id";

    protected $fillable = [
        'statistic_type', 'param1', 'param2', 'param3', 'param4', 'param5'
    ];


    /*
     * Data map for mapping data from database to user representable form
     */
    public static $dataMap = array(
        'year' => 'param1', 'age' => 'param2', 'MP' => 'param3', 'MW' => 'param4', 'ML' => 'param5'
    );

}
