<?php namespace talenthub\ManagerModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ManagerProfile extends Model {

	protected $table = "manager_profile";

    protected $primaryKey = "profile_id";

    public $timestamps = true;

    protected $fillable = ['first_name','middle_name','last_name','dob','gender','nationality','mobile_number',
        'home_number','street_address','city','state','zip','country','bio','institution_type','institution_name'];


    /**Manager User Profile belongs to User table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function User()
    {
        return $this->belongsTo('talenthub\User','user_id');
    }

    /**List of Career history associated with the manager
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function CareerHistory()
    {
        return $this->hasMany('talenthub\ManagerModels\ManagerCareerHistory','profile_id');
    }

    /**Get Manager profile from Database
     * @param $user_id
     * @return mixed
     */
    public static function getManagerProfile($user_id)
    {
        return self::where('user_id', '=', $user_id)->first();
    }

    /**Updates Manager Profile & saving the changes
     * @param Request $request
     */
    public function UpdateManagerProfile(Request $request)
    {
        $request->has('first_name') ? ($this->first_name = $request->first_name) : "";
        $request->has('middle_name') ? ($this->middle_name = $request->middle_name) : "";
        $request->has('last_name') ? ($this->last_name = $request->last_name) : "";
        $request->has('gender') ? ($this->gender = $request->gender) : "";
        $request->has('dob') ? ($this->dob = $request->dob) : "";
        $request->has('nationality') ? ($this->nationality = $request->nationality) : "";
        $request->has('mobile_number') ? ($this->mobile_number = $request->mobile_number) : "";
        $request->has('home_number') ? ($this->home_number = $request->home_number) : "";
        $request->has('street_address') ? ($this->street_address = $request->street_address) : "";
        $request->has('city') ? ($this->city = $request->city) : "";
        $request->has('state') ? ($this->state = $request->state) : "";
        $request->has('zip') ? ($this->zip = $request->zip) : "";
        $request->has('country') ? ($this->country = $request->country) : "";
        $request->has('bio') ? ($this->bio = $request->bio) : "";

        $this->save();
    }
}
