<?php
/**
 * Created by PhpStorm.
 * User: Piyush Sharma
 * Date: 11/9/2017
 * Time: 11:09 PM
 */

namespace talenthub\Services\Manager\HelpCentre;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use talenthub\ManagerModels\HelpCentre;
use talenthub\Repositories\SiteSessions;
use talenthub\User;

class HelpCentreService implements IHelpCentreService
{
    public function SaveQuery(Request $request)
    {
        $help = new HelpCentre();
        $help->query = $request->managerQuery;
        $help->status = HelpCentre::STATUS_UNADDRESSED;

        $user = User::find(Session::get(SiteSessions::USER_ID));

        return $user->HelpCentre()->save($help);
    }
}