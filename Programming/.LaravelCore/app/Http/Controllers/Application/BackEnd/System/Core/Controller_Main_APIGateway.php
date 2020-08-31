<?php

namespace App\Http\Controllers\Application\BackEnd\System\Core
    {
    //use Illuminate\Http\Request;
 
    class Controller_Main_APIGateway extends \App\Http\Controllers\Controller
        {
        public function __construct()
            {
            $this->middleware(\App\Http\Middleware\Application\BackEnd\API\Gateway\RequestHandler::class);
            $this->middleware(\App\Http\Middleware\Application\BackEnd\API\Gateway\ResponseHandler::class);
            $this->middleware(\App\Http\Middleware\Application\BackEnd\API\Gateway\TerminateHandler::class);
            }
        
        public function init()
            {
            }
            
        public function getRoute()
            {
            try {
                //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                
                $varDataReceive = \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession);
/*                               
                $varAPI = [
                    'service' => 'core',
                    'class' => 'API', 
                    'subClass' => 'gateway', 
                    'version' => 1
                    //'version' => $varDataReceive['metadata']['API']['version']
                    ];
                $varData = [
//                    'dddd' => 'dddd'
//                    'userName' => $varDataReceive['data']['userName'],
  //                  'userPassword' => $varDataReceive['data']['userPassword']
                    ];
*/
//echo '~~~~~~~~~~~~~~~~~~~~~~~~~~~';                
$varAPI = [
    'service' => 'core',
    'class' => 'API', 
    'subClass' => 'gateway', 
    'version' => 'latest'
    ];
$varData = [
//    'userName' => 'teguh.pratama',
//    'userPassword' => 'teguhpratama789'
    ];
//echo '~~~~~~~~~~~~~~~~~~~~~~~~~~~'; 

                //---> Method Call
                $varDataSend = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setCallAPIEngine($varUserSession, $varAPI, $varData);

                //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----    
                return \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::setResponse($varUserSession, $varDataSend);
                } 
            catch (\Exception $ex) {
                return \App\Helpers\ZhtHelper\System\Helper_HTTPError::setResponse($varUserSession, 422, '$ex->getMessage()');
                }
            }
        }
    }