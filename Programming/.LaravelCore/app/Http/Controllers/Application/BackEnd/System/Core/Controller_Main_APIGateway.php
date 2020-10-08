<?php

namespace App\Http\Controllers\Application\BackEnd\System\Core
    {
    //use Illuminate\Http\Request;
 
    class Controller_Main_APIGateway extends \App\Http\Controllers\Controller
        {
        public function __construct()
            {
            $this->middleware(\App\Http\Middleware\Application\BackEnd\API\Gateway\RequestHandler::class, ['only' => ['main'], 'except' => []]);
            $this->middleware(\App\Http\Middleware\Application\BackEnd\API\Gateway\ResponseHandler::class, ['only' => ['main'], 'except' => []]);
            $this->middleware(\App\Http\Middleware\Application\BackEnd\API\Gateway\TerminateHandler::class, ['only' => ['main'], 'except' => []]);
            }
        
        public function init()
            {
            }
            
        public function main()
            {
            try {
                //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                //$varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                $varUserSession = (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System()))['UserLoginSessionID'];
                
                $varDataReceive = \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession);

                $varAPIKey = 'core.API.gateway';
                $varAPIVersion = 'latest';
                
                $varData = [
                    'metadata' => $varDataReceive['metadata'],
                    'data' => $varDataReceive['data']
                    ];
/*
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
*/
                //---> Method Call
                $varDataSend = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setCallAPIEngine($varUserSession, $varAPIKey, $varAPIVersion, $varData);

                //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----    
                return \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::setResponse($varUserSession, $varDataSend);
                } 
//            catch (\Exception $ex) {
//                return \App\Helpers\ZhtHelper\System\Helper_HTTPError::setResponse($varUserSession, 422, $ex->getMessage());
//                }
            catch (\Symfony\Component\HttpKernel\Exception\HttpException $ex) {
                return \App\Helpers\ZhtHelper\System\Helper_HTTPError::setResponse($varUserSession, $ex->getStatusCode(), $ex->getMessage());
                }
            }
        }
    }