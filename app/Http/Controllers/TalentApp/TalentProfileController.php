<?php namespace talenthub\Http\Controllers\TalentApp;

use talenthub\Http\Requests;
use talenthub\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TalentProfileController extends Controller {

	public function index(){
	    return response()->view('talent_app/app');
    }

}
