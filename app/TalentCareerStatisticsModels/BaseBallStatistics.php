<?php namespace talenthub\TalentCareerStatisticsModels;

use Illuminate\Database\Eloquent\Model;

class BaseBallStatistics extends Model {

    protected $table = "career_sport_statistics";

    protected $primaryKey = "statistic_id";

    protected $fillable = [
        'statistic_type','param1','param2','param3','param4','param5','param6','param7','param8','param9','param10',
        'param11','param12','param13','param14','param15','param16','param17','param18','param19','param20','param21',
        'param22','param23','param24','param25','param26'
    ];


    /*
     * Data map for mapping data from database to user representable form
     */
    public static $dataMap = array(
        'year' => 'param1', 'age' => 'param2', 'batting' => 'param3', 'GP' => 'param4', 'AB' => 'param5', 'R' => 'param6',
        'H' => 'param7', '2B' => 'param8','3B' => 'param9', 'HR' => 'param10','RBI' => 'param11', 'SB' => 'param12',
        'CS' => 'param13', 'BB' => 'param14','SO' => 'param15', 'fielding' => 'param16', 'POS' => 'param17',
        'G' => 'param18', 'GS' => 'param19', 'CG' => 'param20','INN' => 'param21', 'CH' => 'param22', 'PO' => 'param23',
        'A' => 'param24', 'E' => 'param25', 'DP' => 'param26'
    );





}
