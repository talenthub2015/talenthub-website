<?php namespace talenthub;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use talenthub\Repositories\BasicSiteRepository;
use talenthub\Repositories\SiteSessions;
use talenthub\Repositories\SportsRepository;
use talenthub\Repositories\UserProfileRepository;

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
        'grade_avg', 'academic_achivements', 'sat_verbal', 'sat_math', 'sat_writing', 'sat_reading',
        'sat_overall', 'pact', 'act', 'psat', 'potential_major_category_1', 'potential_major_1',
        'potential_major_category_2', 'potential_major_2', 'potential_major_category_3', 'potential_major_3',
        'reason_choice_major_1',
        'sport_type', 'positions', 'position', 'preferred_position', 'params'
    ];


    public $getMutatedData = true;
    public $setMutatedData = true;



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
     *Relationship of Talent User with talent Career information i.e. user has many career information
     */
    public function careerInformation()
    {
        return $this->hasMany('talenthub\TalentCareerInformation','user_id');
    }


    /**Relationship of User with Awards i.e. user has a award information
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function awards()
    {
        return $this->hasOne('talenthub\Awards','user_id');
    }


    /**
     * Presenting Many to Many relationship with other users
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function endorsements()
    {
        return $this->belongsToMany('talenthub\UserProfile','endorsements','user_id','endorsement_by');
    }



    /**
     * Presenting Has many relationship with other users for Connections table/Favourites
     * Here this relation is : where you favourited others
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function favourites()
    {
        return $this->hasMany('talenthub\Favourites','user_id');
    }


    /**
     * Presenting Has many relationship with other users for Connections table/Favourites
     * Here this relation is : where others favourited you
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function favouritedByOthers()
    {
        return $this->hasMany('talenthub\Favourites','favourited_to');
    }


    /**Relationship between user profile and recommendations
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recommendations()
    {
        return $this->hasMany('talenthub\Talent\Recommendations',"user_id");
    }


    /**
     *Relationship between userProfile and videos uploaded by the user
     */
    public function videos()
    {
        return $this->hasMany('\talenthub\Media\Videos',"user_id");
    }

    /**
     *Relationship between userProfile and Images uploaded by the user
     */
    public function images()
    {
        return $this->hasMany('\talenthub\Media\Images',"user_id");
    }



    /**
     * Presenting Many to Many relationship with other users for Messages
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function messages()
    {
        return $this->belongsToMany('talenthub\UserProfile','messages','user_id','to_user_id')
            ->withPivot('subject','message','sent_on','status');
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
        if($this->setMutatedData)
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


    /**
     * Setting Gender
     * @param $gender
     */
    public function setgenderAttribute($gender)
    {
        if($this->setMutatedData)
        {
            $this->attributes["gender"] = ($gender != null && $gender != "") ? UserProfileRepository::getUserGender()[$gender] : "";
        }
        else
        {
            $this->attributes["gender"]=($gender != null && $gender != "") ? $gender : "";
        }
    }

    /**
     * Getting Gender
     * @param $gender
     */
    public function getgenderAttribute($gender)
    {
        if($this->getMutatedData)
        {
            return array_search($gender,UserProfileRepository::getUserGender());
        }
        return $gender;
    }


    /**
     * Setting Address Type
     * @param $gender
     */
    public function setaddressTypeAttribute($addressType)
    {
        if($this->setMutatedData)
        {
            $this->attributes["address_type"] = ($addressType != 0 && $addressType != null) ? UserProfileRepository::getAddressTypes()[$addressType] : "";
        }
        else
        {
            $this->attributes["address_type"]=  ($addressType != 0 && $addressType != null) ? $addressType : "";
        }
    }

    /**
     * Getting Address Type
     * @param $gender
     */
    public function getaddressTypeAttribute($addressType)
    {
        if($this->getMutatedData)
        {
            return array_search($addressType,UserProfileRepository::getAddressTypes());
        }
        return $addressType;
    }


    /**
     * Inserting line break befor showing it on profile
     * @param $academic_achivements
     * @return mixed
     */
    public function getacademicAchivementsAttribute($academic_achivements)
    {
        return preg_replace("/\r?\n/","<br>",$academic_achivements);
    }




    /**Common function for setting Living With database field of Father, Mother and Guardian.
     * @param $living_with
     */
    public function setLivingWithDataFields($living_with,$database_field_name)
    {
        if($this->setMutatedData)
        {
            $this->attributes[$database_field_name]=($living_with != null && $living_with != "") ? UserProfileRepository::getLivingWithType()[$living_with] : "";
        }
        else
        {
            $this->attributes[$database_field_name]=($living_with != null && $living_with != "") ? $living_with : "";
        }
    }


    /**Setting Data field father_living_with to corresponding data as provided by the user
     * @param $living_with_father
     */
    public function setfatherLivingWithAttribute($living_with_father)
    {
        $this->setLivingWithDataFields($living_with_father,"father_living_with");
    }

    /**Setting Data field father_living_with to corresponding data as provided by the user
     * @param $living_with_father
     */
    public function getfatherLivingWithAttribute($living_with_father)
    {
        if($this->getMutatedData)
        {
            return array_search($living_with_father,UserProfileRepository::getLivingWithType());
        }
        else
        {
            return $living_with_father;
        }
    }


    /**Setting Data field mother_living_with to corresponding data as provided by the user
     * @param $living_with_mother
     */
    public function setmotherLivingWithAttribute($living_with_mother)
    {
        $this->setLivingWithDataFields($living_with_mother,"mother_living_with");
    }

    /**Setting Data field mother_living_with to corresponding data as provided by the user
     * @param $living_with_mother
     */
    public function getmotherLivingWithAttribute($living_with_mother)
    {
        if($this->getMutatedData)
        {
            return array_search($living_with_mother,UserProfileRepository::getLivingWithType());
        }
        else
        {
            return $living_with_mother;
        }
    }



    /**Setting Data field guardian_living_with to corresponding data as provided by the user
     * @param $living_with_guardian
     */
    public function setguardianLivingWithAttribute($living_with_guardian)
    {
        $this->setLivingWithDataFields($living_with_guardian,"guardian_living_with");
    }

    /**Setting Data field guardian_living_with to corresponding data as provided by the user
     * @param $living_with_guardian
     */
    public function getguardianLivingWithAttribute($living_with_guardian)
    {
        if($this->getMutatedData)
        {
            return array_search($living_with_guardian,UserProfileRepository::getLivingWithType());
        }
        else
        {
            return $living_with_guardian;
        }
    }



    /**
     * Setting Graduting From Field
     * @param $gender
     */
    public function setgraduatingFromAttribute($graduatingFrom)
    {
        if($this->setMutatedData)
        {
            $this->attributes["graduating_from"] = ($graduatingFrom != 0 && $graduatingFrom != null) ? UserProfileRepository::getInstituteType()[$graduatingFrom] : "";
        }
        else
        {
            $this->attributes["graduating_from"]=  ($graduatingFrom != 0 && $graduatingFrom != null) ? $graduatingFrom : "";
        }
    }

    /**
     * Getting Address Type
     * @param $gender
     */
    public function getgraduatingFromAttribute($graduatingFrom)
    {
        if($this->getMutatedData)
        {
            return array_search($graduatingFrom,UserProfileRepository::getInstituteType());
        }
        return $graduatingFrom;
    }




    /**
     * Setting Graduting From Field
     * @param $gender
     */
    public function setschoolTypeAttribute($school_type)
    {
        if($this->setMutatedData)
        {
            $this->attributes["school_type"] = ($school_type != 0 && $school_type != null) ? UserProfileRepository::getInstituteType()[$school_type] : "";
        }
        else
        {
            $this->attributes["school_type"]=  ($school_type != 0 && $school_type != null) ? $school_type : "";
        }
    }

    /**
     * Getting Address Type
     * @param $gender
     */
    public function getschoolTypeAttribute($school_type)
    {
        if($this->getMutatedData)
        {
            return array_search($school_type,UserProfileRepository::getInstituteType());
        }
        return $school_type;
    }




    /**
     * Mutating Country before saving in database
     * @param $country
     */
    public function setschoolCountryAttribute($country)
    {
        if($this->setMutatedData)
        {
            $this->attributes["school_country"]=BasicSiteRepository::getListOfCountries()[$country];
        }
    }

    /**
     * Mutating country before presenting it to a user
     * @param $country
     * @return mixed
     */
    public function getschoolCountryAttribute($country)
    {
        if($this->getMutatedData)
        {
            return array_search($country,BasicSiteRepository::getListOfCountries());
        }
        return ucfirst($country);
    }


    /**
     * Mutating grade_avg before saving in database
     * @param $grade_avg
     */
    public function setgradeAvgAttribute($grade_avg)
    {
        if($this->setMutatedData)
        {
            $this->attributes["grade_avg"] = ($grade_avg != 0 && $grade_avg != null) ? UserProfileRepository::getGradeAverageType()[$grade_avg] : "";
        }
        else
        {
            $this->attributes["grade_avg"]=  ($grade_avg != 0 && $grade_avg != null) ? $grade_avg : "";
        }
    }

    /**
     * Mutating grade_avg before presenting it to a user
     * @param $grade_avg
     * @return mixed
     */
    public function getgradeAvgAttribute($grade_avg)
    {
        if($this->getMutatedData)
        {
            return array_search($grade_avg,UserProfileRepository::getGradeAverageType());
        }
        return ucfirst($grade_avg);
    }




}
