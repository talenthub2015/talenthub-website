<?php namespace talenthub;

use Illuminate\Database\Eloquent\Model;
use talenthub\Repositories\BasicSiteRepository;

class ManagerCareerInformation extends Model {

    protected $table="manager_career_information";

    protected $primaryKey = "manager_career_id";

    //Fillable fields for the profiles
    protected $fillable = [
        'company', 'industry', 'career_country', 'position_held', 'duties', 'from_date', 'to_date'
    ];


    /**
     *Defining relationship with Manager profile.
     */
    public function managerProfile()
    {
        return $this->belongsTo('talenthub\ManagerProfile','user_id');
    }



    /**
     * Mutator to update country index number from the user to country name before storing in the database
     * @param $country
     */
    public function setcareerCountryAttribute($country)
    {
        $this->attributes['career_country']= BasicSiteRepository::getListOfCountries()[$country];
    }


    /**
     * Mutator to update country name to index number from database before showing to user
     * @param $country
     */
    public function getcareerCountryAttribute($country)
    {
        return array_search($country,BasicSiteRepository::getListOfCountries());
    }

}
