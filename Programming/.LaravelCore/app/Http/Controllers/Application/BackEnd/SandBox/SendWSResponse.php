<?php

namespace App\Http\Controllers\Application\BackEnd\SandBox
    {
    use Illuminate\Http\Request;
 
    class SendWSResponse extends \App\Http\Controllers\Controller
        {
        public function __construct()
            {
            $this->middleware(\App\Http\Middleware\Application\BackEnd\RequestHandler_General::class);
            }
            
        public function sendResponse()
            {
            $varDataReceive = \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest(000000);
            $varDataSend = ['message' => 'Sukses alhamdulillah'];
            return \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::setResponse(000000, $varDataSend);
            }
        }
    }