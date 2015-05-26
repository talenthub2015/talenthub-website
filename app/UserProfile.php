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
        'profile_image_path','profile_icon_image_path','profile_small_image_path','profile_cover_image_path',
        'first_name', 'middle_name', 'last_name', 'dob', 'gender', 'height', 'weight', 'nationality', 'mobile_number',
        'home_number', 'address_type', 'street_address', 'state_province', 'zip', 'country', 'graduation_year',
        'graduating_from', 'ncaa', 'about', 'summary', 'father_name', 'father_occupation', 'father_mobile_number', 'father_alumni',
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


    public $getMutatedData = true;
    public $setMutateData = true;



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
        if($this->getMutatedData)
        {
            return array_search($sport,BasicSiteRepository::getSportTypes());
        }
        return ucfirst($sport);
    }


    /**
     *Relationship of User with Career information i.e. user has many career information
     */
    public function careerInformation()
    {
        return $this->hasMany('talenthub\TalentCareerInformation','user_id');
    }


    public function awards()
    {
        return $this->hasOne('talenthub\Awards','user_id');
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
        if($this->getMutatedData) {
            $sportPositions = SportsRepository::getSportPositions(Session::get(SiteSessions::USER_SPORT_TYPE));
            $positionArray = array();
            $positions = explode("|", $positions);
            $i = 0;
            foreach ($positions as $position) {
                $positionArray[$i++] = array_search($position, $sportPositions);
            }
            return $positionArray;
        }
        return ucfirst($positions);
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
        if($this->getMutatedData) {
            $sportPositions = SportsRepository::getSportPositions(Session::get(SiteSessions::USER_SPORT_TYPE));
            return array_search($position, $sportPositions);
        }
        return ucfirst($position);
    }


    /**
     * Getting param data from database and modifying it to an array of corresponding field values
     * @param $param
     */
    public function getparamsAttribute($param)
    {
        if($this->getMutatedData) {
            $finalArray = [];
            $userProfileParamsKeys = SportsRepository::getExtraParamsKeysUserProfile();
            foreach ($userProfileParamsKeys as $key) {
                $finalArray[$key] = "";
            }
            $dataParam = explode("|", $param);

            foreach ($dataParam as $data) {
                $var = explode(":", $data);
                if (in_array($var[0], $userProfileParamsKeys)) {
                    $finalArray[array_search($var[0], $userProfileParamsKeys)] = $var[1];
                }
            }

            return $finalArray;
        }
        return ucfirst($param);
    }


    /**
     * Mutating Country before saving in database
     * @param $country
     */
    public function setcountryAttribute($country)
    {
        if($this->setMutateData)
        {
            $this->attributes["country"]=BasicSiteRepository::getListOfCountries()[$country];
        }
    }

    /**
     * Mutating country before presenting it to a user
     * @param $country
     * @return mixed
     */
    public function getcountryAttribute($country)
    {
        if($this->getMutatedData)
        {
            return array_search($country,BasicSiteRepository::getListOfCountries());
        }
        return ucfirst($country);
    }







}
