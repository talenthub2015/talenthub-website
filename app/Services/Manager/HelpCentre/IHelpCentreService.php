<?php
/**
 * Created by PhpStorm.
 * User: Piyush Sharma
 * Date: 11/9/2017
 * Time: 11:08 PM
 */

namespace talenthub\Services\Manager\HelpCentre;

use Illuminate\Http\Request;

interface IHelpCentreService
{
    public function SaveQuery(Request $request);
}