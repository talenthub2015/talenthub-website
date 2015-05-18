<?php namespace talenthub\Services;

use talenthub\Repositories\BasicSiteRepository;
use talenthub\Repositories\SiteConstants;
use talenthub\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
            'username'      =>  'required|email|max:255|unique:users',
			'password'      =>  'required|confirmed|min:6',
            'user_type'     =>  'required|in:'.SiteConstants::USER_TALENT.",".SiteConstants::USER_MANAGER,
            'sport_type'   =>   'required|in:'.implode(',',array_keys(BasicSiteRepository::getSportTypes())),
            'managementLevel'   => 'required_if:user_type,'.SiteConstants::USER_MANAGER.'|in:'.
                implode(",",array_keys(BasicSiteRepository::getUserManagementLevelType(SiteConstants::USER_MANAGER))),
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
        return User::create([
			'username'  =>  $data['username'],
			'password'  =>  $data['password'],
            'user_type' =>  $data['user_type'],
            'management_level' => $data['managementLevel'],
            'sport_type'=>  $data['sport_type']
		]);
	}

}
