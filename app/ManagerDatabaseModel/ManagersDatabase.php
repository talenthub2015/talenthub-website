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
    public $setMutateData = true;   //Setting data to be mutated before saving to database


    /**
     * Storing corresponding text of the index selected by the admin
     * @param $manager_type
     */
    public function setmanagerTypeAttribute($manager_type)
    {
        $this->attributes["manager_type"]=BasicSiteRepository::getManagerTypes()[$manager_type];
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
        $this->attributes["state"]=BasicSiteRepository::getAmericanState()[$state];
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
    public function scopeName($query,$name)
    {
        if($name!=null && $name != 'null')
        {
            $query->where('coach_name','like','%'.$name.'%');
        }
        return $query;
    }

    /**
     * Scope to filter database with manager type
     */
    public function scopeManagerType($query,$manager_type)
    {
        if($manager_type!=null && $manager_type != 'null')
        {
            $query->where('manager_type','=',$manager_type);
        }
        return $query;
    }


    /**
     * Scope to filter database with sport
     */
    public function scopeSport($query,$sport)
    {
        if($sport!=null && $sport != 'null')
        {
            $query->where('sport_type','=',$sport);
        }
        return $query;
    }

    /**
     * Scope to filter database with sport gender
     */
    public function scopeSportGender($query,$sport_gender)
    {
        if($sport_gender !=null && $sport_gender != 'null')
        {
            $query->where('sport_gender','=',$sport_gender);
        }
        return $query;
    }

    /**
     * Scope to filter database with state
     */
    public function scopeState($query,$state)
    {
        if($state !=null && $state != 'null')
        {
            $query->where('state','=',$state);
        }
        return $query;
    }

}
