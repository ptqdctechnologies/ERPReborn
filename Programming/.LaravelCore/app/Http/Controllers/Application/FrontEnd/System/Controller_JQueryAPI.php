<?php

namespace App\Http\Controllers\Application\FrontEnd\System
    {
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
 
    class Controller_JQueryAPI extends \App\Http\Controllers\Controller
        {
        public function __construct()
            {
            }

        public function setRequest()
            {
            $varUserSession = 000000;

            $varDataReceive = \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession);

            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varDataReceive['APIWebToken'], 
                $varDataReceive['APIKey'], 
                $varDataReceive['APIVersion'], 
                $varDataReceive['data']
                );
            
            //---> Jika HTTP Status Sukses (200)
            if($varData['metadata']['HTTPStatusCode']==200)
                {
                $varReturn = response()->json($varData);
                }
            //---> Jika HTTP Status Tidak Sukses
            else
                {
                $varReturn = response(
                    $varData['data']['message'],
                    $varData['metadata']['HTTPStatusCode']
                    );
                }
            return $varReturn;
            }   
        }   
    }