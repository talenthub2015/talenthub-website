<?php
/**
 * Created by PhpStorm.
 * User: Piyush Sharma
 * Date: 7/23/2017
 * Time: 3:55 PM
 */

namespace talenthub\Services\Manager\Verification;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use talenthub\ManagerModels\ManagerProfile;
use talenthub\ManagerModels\Verification;
use talenthub\ManagerModels\VerificationFile;
use talenthub\Repositories\SiteConstants;
use talenthub\Repositories\SiteSessions;


class VerificationRequestService implements IVerificationRequestService
{
    public $fileDirectoryName;
    public $relativeDirectoryLocation;

    public function __construct()
    {
        $this->fileDirectoryName = join(DIRECTORY_SEPARATOR, array("app","verification-files"));
        $this->relativeDirectoryLocation = join(DIRECTORY_SEPARATOR, array($this->fileDirectoryName,""));
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function getVerificationRequest(Request $request){
        $managerProfile = ManagerProfile::find($request->managerProfileId);
        return $managerProfile->verification->first();
    }

    /**
     * @param Request $request
     * @return bool|\Illuminate\Database\Eloquent\Model
     */
    public function saveVerificationRequest(Request $request)
    {
        $managerProfile = ManagerProfile::find(Session::get(SiteSessions::MANGER_PROFILE_ID));
        $verification = $managerProfile->verification;
        $user = $managerProfile->user;
        if($verification == null)
        {
            $verification = new Verification();
        }
        $this->mapRequestToVerificationModel($user, $verification, $request);

        return $managerProfile->verification()->save($verification);
    }

    public function saveVerificationRequestFiles(Request $request)
    {
        $verificationRequest = Verification::find($request->verificationId);
        $verificationFiles = $verificationRequest->verificationFiles();
        $newVerificationFilesSaved=
            DB::transaction(function() use ($request, $verificationFiles) {
                $newRecord = [];
                foreach($request->file('files') as $file){
                    $newVerificationFile = new VerificationFile();

                    $fileName = time()."_".$file->getClientOriginalName().".".$file->getClientOriginalExtension();
                    $file->move($this->relativeDirectoryLocation, $fileName);
                    $newVerificationFile->fullFileName = $file->getClientOriginalName();
                    $newVerificationFile->fileRelativeLocation = $this->relativeDirectoryLocation.$fileName;
                    array_push($newRecord, $verificationFiles->save($newVerificationFile)->toArray());
                }
                return $newRecord;
            });
        return $newVerificationFilesSaved;
    }


    private function mapRequestToVerificationModel($user, $verificationModel, $request){
        if(SiteConstants::isAgent($user->user_type))
        {
            $verificationModel->agentLicenceNumber = $request->agentLicenceNumber;
            $verificationModel->issuedDate = $request->issuedDate;
            $verificationModel->expiryDate = $request->expiryDate;
        }
        else
        {
            $verificationModel->club = $request->club;
            $verificationModel->clubCountry = $request->clubCountry;
            $verificationModel->league = $request->league;
            $verificationModel->leagueWebsite = $request->leagueWebsite;
            $verificationModel->clubWebsite = $request->clubWebsite;
            $verificationModel->roleAtClub = $request->roleAtClub;
        }
    }
}