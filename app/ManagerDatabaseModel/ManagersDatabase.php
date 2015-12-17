<?php namespace talenthub\ManagerDatabaseModel;

use Illuminate\Database\Eloquent\Model;
use talenthub\Repositories\BasicSiteRepository;
use talenthub\Repositories\SiteConstants;
use talenthub\Repositories\SportsRepository;
use talenthub\Repositories\UserProfileRepository;

class ManagersDatabase extends Model {

	protected $table = "managers_database";

    protected $primaryKey = "id";

    protected $fillable = ['manager_type','management_level','sport_type','sport_gender','designation','coach_name','email',
        'contact_no','country','state', 'institution_type','institution_name'];


    /*
     * Variable used to check whether need to mutate values while retrieving values form database or saving in it.
     */
    public $getMutatedData = true;  //Getting Mutated data from database.
    public $setMutatedData = true;   //Setting data to be mutated before saving to database


    /**
     * Storing corresponding text of the index selected by the admin
     * @param $manager_type
     */
    public function setmanagerTypeAttribute($manager_type)
    {
        if($this->setMutatedData)
        {
            $this->attributes["manager_type"] = ($manager_type != null && $manager_type != "") ? BasicSiteRepository::getManagerTypes()[$manager_type] : "";
        }
        else
        {
            $this->attributes["manager_type"]=BasicSiteRepository::getManagerTypes()[$manager_type];
        }

    }


    /**
     * Storing corresponding text of the index selected by the admin
     * @param $management_level
     */
    public function setmanagementLevelAttribute($management_level)
    {
        $this->attributes["management_level"]=BasicSiteRepository::getUserManagementLevelType(SiteConstants::USER_MANAGER)[$management_level];
    }

    /**
     * Storing corresponding text of the index selected by the admin
     * @param $sport_type
     */
    public function setsportTypeAttribute($sport_type)
    {
        $this->attributes["sport_type"]=BasicSiteRepository::getSportTypes()[$sport_type];
    }

    /**
     * Storing corresponding text of the index selected by the admin
     * @param $manager_type
     */
    public function setsportGenderAttribute($sport_gender)
    {
        $this->attributes["sport_gender"]=SportsRepository::getSportsGender()[$sport_gender];
    }

    /**
     * Storing corresponding text of the index selected by the admin
     * @param $country
     */
    public function setcountryAttribute($country)
    {
        $this->attributes["country"]=BasicSiteRepository::getListOfCountries()[$country];
    }

    /**
     * Storing corresponding text of the index selected by the admin
     * @param $state
     */
    public function setstateAttribute($state)
    {
        if($this->setMutatedData)
        {
            $this->attributes["state"] = ($state != null && $state != "" && $state != 0) ? BasicSiteRepository::getAmericanState()[$state] : "";
        }
        else
        {
            $this->attributes["state"]=BasicSiteRepository::getAmericanState()[$state];
        }

    }


    /**
     * Storing corresponding text of the index selected by the admin
     * @param $institution_type
     */
    public function setinstitutionTypeAttribute($institution_type)
    {
        $this->attributes["institution_type"]=UserProfileRepository::getInstituteType()[$institution_type];
    }

    /**
     * Scope to filter database with name
     */
    public function scopeName($query,$name,$queryAsOr=false)
    {
        if($name!=null && $name != 'null')
        {
            if($queryAsOr)
            {
                $query->orWhere('coach_name','like','%'.$name.'%');
            }
            else
            {
                $query->where('coach_name','like','%'.$name.'%');
            }
        }
        return $query;
    }

    /**
     * Scope to filter database with manager type
     */
    public function scopeManagerType($query,$manager_type,$queryAsOr=false)
    {
        if($manager_type!=null && $manager_type != 'null')
        {
            if($queryAsOr)
            {
                $query->orWhere('manager_type','=',$manager_type);
            }
            else
            {
                $query->where('manager_type','=',$manager_type);
            }
        }
        return $query;
    }


    /**
     * Scope to filter database with Management Level
     * @param $query
     * @param $institution_type
     */
    public function scopeManagementLevel($query,$management_level,$queryAsOr=false)
    {
        if($management_level != null && $management_level != 'null')
        {
            if($queryAsOr)
            {
                $query->orWhere('management_level','=',$management_level);
            }
            else
            {
                $query->where('management_level','=',$management_level);
            }
        }
        return $query;
    }





    /**
     * Scope to filter database with sport
     */
    public function scopeSport($query,$sport,$queryAsOr=false)
    {
        if($sport!=null && $sport != 'null')
        {
            if($queryAsOr)
            {
                $query->orWhere('sport_type','=',$sport);
            }
            else
            {
                $query->where('sport_type','=',$sport);
            }
        }
        return $query;
    }

    /**
     * Scope to filter database with sport gender
     */
    public function scopeSportGender($query,$sport_gender,$queryAsOr=false)
    {
        if($sport_gender !=null && $sport_gender != 'null')
        {
            if($queryAsOr)
            {
                $query->orWhere('sport_gender','=',$sport_gender);
            }
            else
            {
                $query->where('sport_gender','=',$sport_gender);
            }
        }
        return $query;
    }

    /**
     * Scope to filter database with state
     */
    public function scopeState($query,$state,$queryAsOr=false)
    {
        if($state !=null && $state != 'null')
        {
            if($queryAsOr)
            {
                $query->orWhere('state','=',$state);
            }
            else
            {
                $query->where('state','=',$state);
            }
        }
        return $query;
    }


    /**
     * Scope to filter database with Institution Type
     * @param $query
     * @param $institution_type
     */
//    public function scopeInstitutionType($query,$institution_type,$queryAsOr=false)
//    {
//        if($institution_type != null && $institution_type != 'null')
//        {
//            if($queryAsOr)
//            {
//                $query->orWhere('institution_type','=',$institution_type);
//            }
//            else
//            {
//                $query->where('institution_type','=',$institution_type);
//            }
//        }
//    }



    /**
     * Scope to filter database with Country
     * @param $query
     * @param $country
     */
    public function scopeCountry($query,$country,$queryAsOr=false)
    {
        if($country != null && $country != 'null')
        {
            if($queryAsOr)
            {
                $query->orWhere('country','=',$country);
            }
            else
            {
                $query->where('country','=',$country);
            }
        }
    }







}
