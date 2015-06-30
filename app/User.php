<?php namespace talenthub;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Http\Request;
use talenthub\Repositories\BasicSiteRepository;
use talenthub\Repositories\SiteConstants;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

    /*
     * Primary key used for this model
     */
    protected $primaryKey="user_id";

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['username', 'password','user_type','sport_type','active','management_level',
        'first_name','last_name','profile_image_path','confirmation_token'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password','remember_token'];

    /**
     * Mutator for password to hash it
     *
     * @param $value
     * @return string
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Mutator for setting sport type. Modifying the data, value from the page,to string to store in database as per defined indexes in the code.
     * @param $value
     */
    public function setSportTypeAttribute($value)
    {
        $this->attributes['sport_type'] = BasicSiteRepository::getSportTypes()[$value];
    }


    /*Mutator for setting Management Level.*/
    public function setmanagementLevelAttribute($management_level)
    {
        if(SiteConstants::isManager($this->attributes['user_type']))
        {
            $this->attributes['management_level']=BasicSiteRepository::getUserManagementLevelType(SiteConstants::USER_MANAGER)[$management_level];
        }
        else if(SiteConstants::isTalent($this->attributes['user_type']))
        {
            $this->attributes['management_level']=BasicSiteRepository::getUserManagementLevelType(SiteConstants::USER_TALENT)[$management_level];
        }
    }




}
