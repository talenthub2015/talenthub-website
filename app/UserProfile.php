<?php namespace talenthub;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use talenthub\Repositories\BasicSiteRepository;
use talenthub\Repositories\SiteSessions;
use talenthub\Repositories\SportsRepository;

class UserProfile extends Model
{

    protected $table = "users";

    protected $primaryKey = "user_id";

    //Fillable fields for the profiles
    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'dob', 'gender', 'height', 'weight', 'nationality', 'mobile_number',
        'home_number', 'address_type', 'street_address', 'state_province', 'zip', 'country', 'graduation_year',
        'graduating_from', 'ncaa', 'father_name', 'father_occupation', 'father_mobile_number', 'father_alumni',
        'father_living_with', 'mother_name', 'mother_occupation', 'mother_mobile_number', 'mother_alumni',
        'mother_living_with', 'guardian_name', 'guardian_occupation', 'guardian_mobile_number', 'guardian_alumni',
        'guardian_living_with', 'school_type', 'school_name', 'school_address', 'school_city', 'school_state_province',
        'school_zip', 'school_country', 'school_contact_person_name', 'school_contact_person_phone',
        'current_gpa', 'grade_avg', 'academic_achivements', 'sat_verbal', 'sat_math', 'sat_writing', 'sat_reading',
        'sat_overall', 'pact', 'act', 'psat', 'potential_major_category_1', 'potential_major_1',
        'potential_major_category_2', 'potential_major_2', 'potential_major_category_3', 'potential_major_3',
        'reason_choice_major_1',
        'sport_type', 'positions', 'position', 'preferred_position', 'params'
    ];


    /**
     * Mutating value of sports selected by the user before storing into database
     * @param $sport
     */
    public function setSportTypeAttribute($sport)
    {
        $this->attributes["sport_type"]=BasicSiteRepository::getSportTypes()[$sport];
    }



    /**
     * Mutating sport type as a key to the array in which all the sports are defined
     * @param $value
     */
    public function getSportTypeAttribute($sport)
    {
        return array_search($sport,BasicSiteRepository::getSportTypes());
    }


    /**
     *Relationship of User with Career information i.e. user has many career information
     */
    public function careerInformation()
    {
        return $this->hasMany('talenthub\TalentCareerInformation','user_id');
    }


    /**
     * Modify the data got from the user and save it in database in form "position1|position2"
     * @param $positionArray
     */
    public function setPositionsAttribute($positionArray)
    {
        $sportPositions = SportsRepository::getSportPositions(Session::get(SiteSessions::USER_SPORT_TYPE));
        $positions="";
        foreach($positionArray as $positionIndex)
        {
            $positions.=$sportPositions[$positionIndex]."|";
        }
        $positions=substr($positions,0,-1);
        $this->attributes["positions"]=$positions;
    }


    /**
     * After retrieving positions from the database modifying it to array containing index of positions selected
     * @param $positions
     * @return array
     */
    public function getPositionsAttribute($positions)
    {
        $sportPositions = SportsRepository::getSportPositions(Session::get(SiteSessions::USER_SPORT_TYPE));
        $positionArray=array();
        $positions = explode("|",$positions);
        $i=0;
        foreach($positions as $position)
        {
            $positionArray[$i++]=array_search($position,$sportPositions);
        }
        return $positionArray;
    }


    /**
     * Mutating Preferred Position to text from index
     * @param $position
     */
    public function setPreferredPositionAttribute($position)
    {
        $sportPositions = SportsRepository::getSportPositions(Session::get(SiteSessions::USER_SPORT_TYPE));
        $this->attributes["preferred_position"]=$sportPositions[$position];
    }

    /**
     * Mutating Preferred to index from text from the database
     * @param $position
     */
    public function getPreferredPositionAttribute($position)
    {
        $sportPositions = SportsRepository::getSportPositions(Session::get(SiteSessions::USER_SPORT_TYPE));
        return array_search($position,$sportPositions);
    }





}
