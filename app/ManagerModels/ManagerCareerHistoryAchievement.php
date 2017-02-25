<?php namespace talenthub\ManagerModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Queue\Capsule\Manager;

class ManagerCareerHistoryAchievement extends Model {

    protected $table = "manager_career_history_achievement";

    protected $fillable = ['çareer_history_id','achievement'];
    protected $primaryKey = "id";

    /**Returns Manager History with which this achievement is associated with.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function CareerHistory()
    {
        return $this->belongsTo('talenthub\ManagerModels\ManagerCareerHistory','career_history_id');
    }

    /**Checking if an achievement for the career history already exists in database or not
     * @param $career_id
     * @param $achievement
     * @return bool
     */
    public static function AchievementExists($career_id, $achievement)
    {
        $careerHistoryAchievement = ManagerCareerHistoryAchievement::where('career_history_id','=',$career_id)
            ->where('achievement','=',$achievement)->get();
        if(count($careerHistoryAchievement) > 0)
        {
            return $careerHistoryAchievement;
        }
        return false;
    }


    /**Removing all the Obselete achievements from a career history.
     * @param $careerHistory
     * @param $newAchievements
     */
    public static function RemoveObseleteAchievement($careerHistory, $newAchievements)
    {
        $newAchievementsArray = [];
        foreach($newAchievements as $achievement)
        {
            array_push($newAchievementsArray, $achievement["info"]);
        }
        $allAchievements = $careerHistory->Achievements;
        foreach($allAchievements as $achievement)
        {
            if(!in_array($achievement->achievement,$newAchievementsArray))
            {
                $achievement->delete();
            }
        }
    }
}
