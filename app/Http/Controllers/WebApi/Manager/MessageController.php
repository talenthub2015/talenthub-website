<?php namespace talenthub\Http\Controllers\Webapi\Manager;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use talenthub\Http\Controllers\WebApi\RequestStatusEnum;
use talenthub\Http\Controllers\WebApi\WebApiBase;
use talenthub\Services\Common\Message\IMessageService;

class MessageController extends WebApiBase {

    public $_messageService;

    /**
     * MessageController constructor.
     * @param IMessageService $messageService
     */
    public function __construct(IMessageService $messageService)
    {
        $this->_messageService = $messageService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function postMessage(Request $request)
    {
        if($this->isPostRequestInValid($request)){
            $this->statusCode = RequestStatusEnum::DATA_VALIDATION_ERROR;
            return $this->sendResponse();
        }

        $this->_messageService->sendMessage($request);
        $this->statusCode = RequestStatusEnum::SUCCESS;
        return $this->sendResponse();
    }

    public function getMessage()
    {
        return response();
    }

    private function isPostRequestInValid(Request $request){
        $validator = Validator::make($request->all(), [
            'fromId' => 'required',
            'toId' => 'required',
            'message' => 'required'
        ]);

        return $validator->fails();
    }

}
