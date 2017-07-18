<?php
namespace talenthub\Http\Controllers\WebApi\Manager;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use talenthub\Http\Controllers\WebApi\RequestStatusEnum;
use talenthub\Http\Controllers\WebApi\WebApiBase;

use Illuminate\Http\Request;

class VerificationController extends WebApiBase {

    const FILE_DIRECTORY_NAME = "/app/verification-files/";

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function status()
	{

	}

	public function request(Request $request){
	    if(!$this->validateRequestForCoachAndAgent($request))
        {
            //Get
            $this->statusCode = RequestStatusEnum::DATA_VALIDATION_ERROR;
            $this->sendResponse([]);
        }

        $this->sendResponse([]);

    }

    public function requestFilesUpload(Request $request){
	    $disk = Storage::disk('local');
        $disk->makeDirectory(self::FILE_DIRECTORY_NAME);
	    foreach(Input::file('files') as $file){
            $file->move(storage_path().self::FILE_DIRECTORY_NAME,
                $file->getClientOriginalName().".".$file->getClientOriginalExtension());
        }
    }

    private function validateRequestForCoachAndAgent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'club' => 'required',
            'clubCountry' => 'required',
            'leagueName' => 'required',
            'leagueWebsite' => 'required',
            'files' => 'required | mimes:pdf,doc,docx,jpeg,jpg,png'
        ]);

        return $validator->fails();
    }
}
