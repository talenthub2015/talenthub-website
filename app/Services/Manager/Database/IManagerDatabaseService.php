<?php
/**
 * Created by PhpStorm.
 * User: Piyush Sharma
 * Date: 12/4/2017
 * Time: 10:45 PM
 */

namespace talenthub\Services\Manager\Database;


use Illuminate\Http\Request;

interface IManagerDatabaseService
{
    function searchTalentProfiles(Request $request);
}