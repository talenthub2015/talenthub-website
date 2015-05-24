<?php namespace talenthub\TalentCareerStatisticsModels;

use Illuminate\Database\Eloquent\Model;

class SoccerStatistics extends Model {

    protected $table = "career_sport_statistics";

    protected $primaryKey = "statistic_id";

    protected $fillable = [
        'statistic_type','param1','param2','param3','param4','param5','param6','param7','param8','param9','param10',
        'param11','param12','param13','param14','param15','param16','param17','param18','param19','param20','param21',
        'param22','param23','param24','param25','param26','param27','param28','param29','param30','param31','param32',
        'param33','param34','param35','param36','param37','param38','param39','param40','param41'
    ];


    /*
     * Data map for mapping data from database to user representable form
     */
    public static $dataMap = array(
        'year'=>'param1','age'=>'param2','goalkeeper'=>'param3','goal_GP' => 'param4', 'goal_GS' => 'param5',
        'goal_W' => 'param6', 'goal_D' => 'param7', 'goal_L' => 'param8', 'goal_GA' => 'param9',
        'goal_PKG' => 'param10', 'goal_CS' => 'param11', 'goal_YC' => 'param12', 'goal_RC' => 'param13',
        'goal_MP' => 'param14', 'defender' => 'param15', 'defender_GP' => 'param16', 'defender_GS' => 'param17',
        'defender_G' => 'param18', 'defender_A' => 'param19', 'defender_CS' => 'param20', 'defender_YC' => 'param21',
        'defender_RC' => 'param22', 'defender_MP' => 'param23', 'midfield' => 'param24', 'midfield_GP' => 'param25',
        'midfield_GS' => 'param26', 'midfield_G' => 'param27', 'midfield_A' => 'param28', 'midfield_YC' => 'param29',
        'midfield_RC' => 'param30', 'midfield_MP' => 'param31','forward'=>'param32','forward_GP'=>'param33',
        'forward_GS'=>'param34','forward_G'=>'param35','forward_A'=>'param36','forward_PKG'=>'param37','forward_YC'=>'param38',
        'forward_RC'=>'param39','forward_MP'=>'param40'
    );

}
