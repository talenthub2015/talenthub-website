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
use talenthub\Services\Common\Email\EmailService;
use talenthub\User;

class HelpCentreService implements IHelpCentreService
{
    const HELP_CENTRE_EMAIL_SUBJECT = "Help Needed";
    const HELP_CENTRE_TO_EMAIL = "Help Needed";
    private $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function SaveQueryAndEmail(Request $request)
    {
        $help = new HelpCentre();
        $help->query = $request->managerQuery;
        $help->status = HelpCentre::STATUS_UNADDRESSED;

        $user = User::find(Session::get(SiteSessions::USER_ID));
        $this->emailService->SendEmail($help,
            $_ENV["HELP_CENTRE_MAIL"],
            $user->username,
            self::HELP_CENTRE_EMAIL_SUBJECT);

        return $user->HelpCentre()->save($help);
    }
}