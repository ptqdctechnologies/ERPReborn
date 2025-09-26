<?php

namespace App\Http\Controllers\Application\BackEnd\System\Authentication
    {
    use Illuminate\Http\Request;
 
    class Controller_Main extends \App\Http\Controllers\Controller
        {
        public function __construct()
            {
            $this->middleware(\App\Http\Middleware\Application\BackEnd\API\Authentication\RequestHandler::class, ['only' => ['setLogin'], 'except' => []]);
            $this->middleware(\App\Http\Middleware\Application\BackEnd\API\Authentication\ResponseHandler::class, ['only' => ['setLogin'], 'except' => []]);
            $this->middleware(\App\Http\Middleware\Application\BackEnd\API\Authentication\TerminateHandler::class, ['only' => ['setLogin'], 'except' => []]);
            }


        public function init()
            {
            }


        public function setLogin()
            {
            try {
                //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    //---> Initializing : varUserSession
                        $varUserSession =
                            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();

                    //---> Initializing : varDataReceive
                        $varDataReceive =
                            \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest(
                                $varUserSession
                                );

                    //---> Initializing : varAPIKey
                        $varAPIKey =
                            'authentication.general.setLogin';

                    //---> Initializing : varAPIVersion
                        $varAPIVersion =
                            $varDataReceive['metadata']['API']['version'];

                    //---> Initializing : varData
                        $varData = [
                            'userName' => $varDataReceive['data']['userName'],
                            'userPassword' => $varDataReceive['data']['userPassword'],
                            
                            'additionalData' =>  (
                                \App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                                    $varUserSession,
                                    'additionalData',
                                    $varDataReceive['data']
                                    ) 
                                    ?   (
                                            (
                                            !is_null($varDataReceive['data']['additionalData'])
                                            ) 
                                            ? $varDataReceive['data']['additionalData']
                                            : []
                                        )
                                    : []
                                )
                            ];
                        //var_dump($varData);

                    //---> Method Call
                        $varDataSend = 
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setCallAPIEngine(
                                $varUserSession,
                                $varAPIKey,
                                $varAPIVersion,
                                $varData,
                                null,
                                $varDataReceive
                                );

                    //var_dump($varDataSend);
                
                //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                return
                    \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::setResponse($varUserSession, $varDataSend);
                }

            catch (\Symfony\Component\HttpKernel\Exception\HttpException $ex) {
                return
                    \App\Helpers\ZhtHelper\System\Helper_HTTPError::setResponse($varUserSession, $ex->getStatusCode(), $ex->getMessage());
                }
            }

            
            
            
            
            
/*            
            
        public function getUserAuthentication()
            {
            try {
                //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                
                $varDataReceive = \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession);

                $varAPIKey = 'authentication.general.getUserAuthentication';
                $varAPIKey = 'authentication.general.setLogin';
                $varAPIVersion = $varDataReceive['metadata']['API']['version'];

                $varData = [
                    'userName' => $varDataReceive['data']['userName'],
                    'userPassword' => $varDataReceive['data']['userPassword']
                    ];
*/
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
/*
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
*/
        }
    }
 
?>