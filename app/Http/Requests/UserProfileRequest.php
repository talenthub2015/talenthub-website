<?php namespace talenthub\Http\Requests;

use Illuminate\Support\Facades\Session;
use talenthub\Http\Requests\Request;
use talenthub\Repositories\BasicSiteRepository;
use talenthub\Repositories\SiteConstants;
use talenthub\Repositories\SiteSessions;
use talenthub\Repositories\UserProfileRepository;

class UserProfileRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
        if(SiteConstants::isTalent(Session::get(SiteSessions::USER_TYPE)))
        {
            return [
                'dob' => 'date',
                'gender'=> 'in:'.implode(",",array_keys(UserProfileRepository::getUserGender())),
                'height'=> 'numeric',
                'weight'=> 'numeric',
                'mobile_number' => 'numeric',
                'home_number' => 'numeric',
                'address_type'=> 'in:'.implode(",",array_keys(UserProfileRepository::getAddressTypes())),
                'zip' => 'numeric',
                'country'=> 'in:'.implode(",",array_keys(BasicSiteRepository::getListOfCountries())),
                'graduation_year' => 'numeric',
                'father_mobile_number'=> 'numeric',
                'father_living_with'=> 'in:'.implode(",",array_keys(UserProfileRepository::getLivingWithType())),
                'mother_mobile_number'=>'numeric',
                'mother_living_with'=> 'in:'.implode(",",array_keys(UserProfileRepository::getLivingWithType())),
                'guardian_mobile_number'=>'numeric',
                'guardian_living_with'=> 'in:'.implode(",",array_keys(UserProfileRepository::getLivingWithType())),
                'school_type'=> 'in:'.implode(",",array_keys(UserProfileRepository::getInstituteType())),
                'school_zip'=> 'regex:/^\d{4,5}$/',
                'school_country'=> 'in:'.implode(",",array_keys(BasicSiteRepository::getListOfCountries())),
                'school_contact_person_phone'=> 'numeric',
                'grade_avg'=> 'in:'.implode(",",array_keys(UserProfileRepository::getGradeAverageType())),
                'sat_verbal'=> 'regex:/^\d+(\.?\d+)?$/', 'sat_math' => 'regex:/^\d+(\.?\d+)?$/', 'sat_writing' => 'regex:/^\d+(\.?\d+)?$/' ,
                'sat_reading' => 'regex:/^\d+(\.?\d+)?$/', 'sat_overall' => 'regex:/^\d+(\.?\d+)?$/',
                'pact' => 'regex:/^\d+(\.?\d+)?$/', 'act' => 'regex:/^\d+(\.?\d+)?$/', 'psat' => 'regex:/^\d+(\.?\d+)?$/'
            ];
        }
        else if(SiteConstants::isManager(Session::get(SiteSessions::USER_TYPE)))
        {
            return [
                'dob' => 'date',
                'gender'=> 'in:'.implode(",",array_keys(UserProfileRepository::getUserGender())),
                'mobile_number' => 'numeric',
                'home_number' => 'numeric',
                'address_type'=> 'in:'.implode(",",array_keys(UserProfileRepository::getAddressTypes())),
                'zip' => 'numeric',
                'country'=> 'in:'.implode(",",array_keys(BasicSiteRepository::getListOfCountries())),
            ];
        }
	}

}
