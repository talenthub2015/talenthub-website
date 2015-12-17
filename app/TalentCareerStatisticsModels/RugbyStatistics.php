<?php namespace talenthub\TalentCareerStatisticsModels;

use Illuminate\Database\Eloquent\Model;

class RugbyStatistics extends Model {

    protected $table = "career_sport_statistics";

    protected $primaryKey = "statistic_id";

    protected $fillable = [
        'statistic_type','param1','param2','param3','param4','param5','param6','param7','param8','param9','param10',
        'param11','param12','param13','param14','param15','param16','param17','param18','param19','param20','param21',
        'param22','param23','param24','param25','param26','param27','param28','param29','param30','param31','param32'
    ];


    /*
     * Data map for mapping data from database to user representable form
     */
    public static $dataMap = array(
        'year'=>'param1','age'=>'param2','forward'=>'param3','forward_GP' => 'param4', 'forward_GS' => 'param5',
        'forward_GC' => 'param6', 'forward_LTA' => 'param7', 'forward_LTS' => 'param9', 'forward_LJA' => 'param10',
        'forward_LJS' => 'param11', 'forward_YC' => 'param12', 'forward_RC' => 'param13', 'forward_TR' => 'param14',
        'forward_TA' => 'param15', 'backline' => 'param16', 'back_GP' => 'param17', 'back_GS' => 'param18',
        'back_GC' => 'param19', 'back_YC' => 'param20', 'back_RC' => 'param21', 'back_TR' => 'param22',
        'back_TA' => 'param23', 'kicker' => 'param24', 'kick_CA' => 'param25', 'kick_CS' => 'param26', 'kick_SC' => 'param27',
        'kick_LC' => 'param28', 'kick_PA' => 'param29', 'kick_PS' => 'param30', 'kick_SP' => 'param31', 'kick_LP' => 'param32'
    );

}
