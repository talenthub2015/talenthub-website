<?php
/**
 * Created by PhpStorm.
 * User: Piyush Sharma
 * Date: 12/4/2017
 * Time: 10:46 PM
 */

namespace talenthub\Services\Manager\Database;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use PhpSpec\Exception\Exception;
use talenthub\Repositories\BasicSiteRepository;
use talenthub\Repositories\SiteConstants;
use talenthub\User;

class ManagerDatabaseService implements IManagerDatabaseService
{
    public function searchTalentProfiles(Request $request)
    {
        $this->validateRequest($request);
        $user = User::where('user_type', '=', SiteConstants::USER_TALENT)
            ->where('gender', '=', strtolower($request->gender))
            ->where('country', '=', strtolower($request->country))
            ->get();
        return $this->buildUserModel($user);
    }

    private function validateRequest($request)
    {
        if(!$request->has('gender'))
        {
            throw new Exception('Gender is missing');
        }
        else if(!$request->has('country'))
        {
            throw new Exception('Country is missing');
        }
        else if(array_search($request->gender, BasicSiteRepository::getGenders()) == 0)
        {
            throw new Exception('Gender has invalid value');
        }
        else if(array_search($request->country, BasicSiteRepository::getListOfCountries()) == 0)
        {
            throw new Exception('Country has invalid value');
        }
    }

    private function buildUserModel(Collection $users)
    {
        $usersModel = [];
        foreach ($users as $user)
        {
            $userArray = $user->toArray();
            $userArray["external_profile_url"] = "/external/profile/".$user->user_id;
            array_push($usersModel, $userArray);
        }
        return $usersModel;
    }
}