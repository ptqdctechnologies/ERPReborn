<?php

namespace App\Http\Controllers\Application\BackEnd\System\Authentication
    {
    use Illuminate\Http\Request;
 
    class Controller_Main extends \App\Http\Controllers\Controller
        {
        public function __construct()
            {
            $this->middleware(\App\Http\Middleware\Application\BackEnd\API\Authentication\RequestHandler::class, ['only' => ['getUserAuthentication'], 'except' => []]);
            $this->middleware(\App\Http\Middleware\Application\BackEnd\API\Authentication\ResponseHandler::class, ['only' => ['getUserAuthentication'], 'except' => []]);
            $this->middleware(\App\Http\Middleware\Application\BackEnd\API\Authentication\TerminateHandler::class, ['only' => ['getUserAuthentication'], 'except' => []]);
            }

        public function init()
            {
            }

        public function getUserAuthentication()
            {
            try {
                //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                
                $varDataReceive = \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession);

                $varAPIKey = 'authentication.general.getUserAuthentication';
                $varAPIVersion = $varDataReceive['metadata']['API']['version'];

                $varData = [
                    'userName' => $varDataReceive['data']['userName'],
                    'userPassword' => $varDataReceive['data']['userPassword']
                    ];

/*
//echo '~~~~~~~~~~~~~~~~~~~~~~~~~~~';                
$varAPI = [
    'service' => 'authentication',
    'class' => 'general', 
    'subClass' => 'getUserAuthentication', 
    'version' => 'latest'
    ];
$varData = [
    'userName' => 'teguh.pratama',
    'userPassword' => 'teguhpratama789'
    ];
//echo '~~~~~~~~~~~~~~~~~~~~~~~~~~~';                
*/

                //---> Method Call
                $varDataSend = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setCallAPIEngine($varUserSession, $varAPIKey, $varAPIVersion, $varData);

                //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                return \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::setResponse($varUserSession, $varDataSend);
                } 
            //catch (\Exception $ex) {
                //return \App\Helpers\ZhtHelper\System\Helper_HTTPError::setResponse($varUserSession, 422, $ex->getMessage());
                //}
            catch (\Symfony\Component\HttpKernel\Exception\HttpException $ex) {
                return \App\Helpers\ZhtHelper\System\Helper_HTTPError::setResponse($varUserSession, $ex->getStatusCode(), $ex->getMessage());
                }
            //return $varReturn;
            }
        }
    }
 
?>