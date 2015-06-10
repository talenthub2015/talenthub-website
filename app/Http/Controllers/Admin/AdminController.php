<?php namespace talenthub\Http\Controllers\Admin;

use talenthub\Http\Requests;
use talenthub\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.admin_home');
	}


    public function addManager()
    {
        return view('admin.managers_database.add_manager');
    }

}
