<?php namespace talenthub\ManagerModels;

use Illuminate\Database\Eloquent\Model;

class ManagerCareerHistory extends Model {

    protected $table = "manager_career_history";

    protected $fillable = ['profile_id','career_year'];
    protected $primaryKey = "id";

    /**Returning all the Achievements related to the Career History
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Achievements()
    {
        return $this->hasMany('talenthub\ManagerModels\ManagerCareerHistoryAchievement','career_history_id');
    }

    /**
     * Checking if a career history already exists in database or not
     * @param $profile_id
     * @param $year
     * @return ManagerCareerHistory/bool
     */
    public static function CareerHistoryExists($profile_id, $year)
    {
        $careerHistory = ManagerCareerHistory::where('profile_id','=',$profile_id)->where('career_year','=',$year)->first();
        if(count($careerHistory) > 0)
        {
            return $careerHistory;
        }
        return false;
    }

    /**Removing all the Obselete Career History of the manager.
     * @param $careerHistory
     * @param $newCareerHistory
     */
    public static function RemoveObseleteCareerHistory($managerProfile, $newCareerHistory)
    {
        $newCareerHistoryArray = [];
        foreach($newCareerHistory as $careerHistory)
        {
            array_push($newCareerHistoryArray, $careerHistory["career_year"]);
        }
        $allCareerHistory = $managerProfile->CareerHistory;
        foreach($allCareerHistory as $careerHistory)
        {
            if(!in_array($careerHistory->career_year,$newCareerHistoryArray))
            {
                $careerHistory->delete();
            }
        }
    }

    /**Get all the Career History of the Manager
     * @param $managerProfileId
     */
    public static function getCareerHistory($managerProfileId)
    {
        return self::where('profile_id','=',$managerProfileId)->get();
    }

    /**Get all the Career History & respective achievements associated with it, of the Manager
     * @param $managerProfileId
     */
    public static function getCareerHistoryAndAchievements($managerProfileId)
    {
        $careerHistories = self::getCareerHistory($managerProfileId);
        foreach($careerHistories as &$careerHistory)
        {
            $careerHistory->Achievements;
        }
        unset($careerHistory);
        return $careerHistories;
    }
}
