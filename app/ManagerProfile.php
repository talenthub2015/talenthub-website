<?php namespace talenthub;

use Illuminate\Database\Eloquent\Model;
use talenthub\Repositories\BasicSiteRepository;

class ManagerProfile extends Model {

    protected $table="users";

    protected $primaryKey = "user_id";

    //Fillable fields for the profiles
    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'dob', 'gender', 'nationality', 'mobile_number',
        'home_number', 'address_type', 'street_address', 'state_province', 'zip', 'country',
        'sport_type', 'almer_mater','manager_additional_information'
    ];


    /**
     *Defining relationship with Manager Career information.
     */
    public function managerCareerInformation()
    {
        return $this->hasMany('talenthub\ManagerCareerInformation','user_id');
    }



    /**
     * Mutator to update country index number from the user to country name before storing in the database
     * @param $country
     */
    public function setcountryAttribute($country)
    {
        $this->attributes['country']= BasicSiteRepository::getListOfCountries()[$country];
    }


    /**
     * Mutator to update country name to index number from database before showing to user
     * @param $country
     */
    public function getcountryAttribute($country)
    {
        return array_search($country,BasicSiteRepository::getListOfCountries());
    }
}
