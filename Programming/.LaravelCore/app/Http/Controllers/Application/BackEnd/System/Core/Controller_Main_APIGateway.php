<?php

namespace App\Http\Controllers\Application\BackEnd\System\Core
    {
    //use Illuminate\Http\Request;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;

    class Controller_Main_APIGateway extends \App\Http\Controllers\Controller
        {
        public function __construct()
            {
            $this->middleware(
                \App\Http\Middleware\Application\BackEnd\API\Gateway\RequestHandler::class,
                [
                'only' => ['main'],
                'except' => []
                ]
                );

            $this->middleware(
                \App\Http\Middleware\Application\BackEnd\API\Gateway\ResponseHandler::class,
                [
                'only' => ['main'],
                'except' => []
                ]
                );

            $this->middleware(
                \App\Http\Middleware\Application\BackEnd\API\Gateway\TerminateHandler::class,
                [
                'only' => ['main'],
                'except' => []
                ]
                );
            }
        
        public function init()
            {
            }

            
        public function main()
            {
//------------< BLOCKING >------------------
            $varAPIExecutionStartDateTime = (new \DateTime());
//------------< BLOCKING >------------------
            try {
                //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                $varUserSession = '';
                //$varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();

//dd(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
                /*
                $varUserSession = (
                    \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken(
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System()
                        )
                    )['userLoginSessionID'];
                */
                
                $varUserSession =
                    \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionIDByAPIWebToken(
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System()
                        );



//$varRequest = request()->header();
/*
abort(
    403, 
    $varUserSession

        //\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System()
        //'xxx'
        //\App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession)
        //\App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest_HeaderAPIWebToken($varUserSession)

//$varRequest->bearerToken()
        //\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken(
        //    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System()
        //    )

//(\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken(
//                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System()
//                        )
//                    )['userLoginSessionID']
        
//(string) \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getHeader($varUserSession)
        
        );
die();
*/
                
                if (!($varDataReceive = \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession)))
                    {
                    abort(403, 'API Web Token does not exist');
                    }
                else
                    {
                    //$varDataReceive = \App\Helpers\ZhtHelper\General\Helper_Array::setRemoveElementByKey($varUserSession, 'header', $varDataReceive);
                    //dd($varDataReceive);

                    $varAPIKey = 'core.API.gateway';
                    $varAPIVersion = 'latest';

                    $varData = [
                        'metadata' => $varDataReceive['metadata'],
                        'data' => $varDataReceive['data']
                        ];

                    $varDataReceive = [
                        'metadata' => [
                            'API' => [
                                'key' => $varAPIKey,
                                'version' => $varAPIVersion
                                ]
                            ],
                        'data' => $varData
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
                    $varDataSend = 
                        \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setCallAPIEngine(
                            $varUserSession,
                            $varAPIKey,
                            $varAPIVersion,
                            $varData,
                            null,
                            $varDataReceive
                            );

/*
//------------< BLOCKING >------------------
    dd (
        \App\Helpers\ZhtHelper\General\Helper_DateTime::getDifferenceOfDateTimeTZString(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            \App\Helpers\ZhtHelper\General\Helper_DateTime::getConvertPHPDateTimeToDateTimeTZString(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), $varAPIExecutionStartDateTime),
            \App\Helpers\ZhtHelper\General\Helper_DateTime::getConvertPHPDateTimeToDateTimeTZString(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), (new \DateTime())),
            )
        );
//------------< BLOCKING >------------------
*/

                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----                   
                    $varReturn =
                        \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::setResponse(
                            $varUserSession,
                            $varDataSend
                            );

                    $varReturn['data']['process']['API']['executionInterval'] = null;

                    try {
                        $varReturn['data']['process']['API']['startDateTimeTZ'] =
                            $varReturn['data']['process']['DBMS']['finishDateTimeTZ'];                    
                        }
                    catch (\Exception $ex) {
                        $varReturn['data']['process']['API']['startDateTimeTZ'] =
                            \App\Helpers\ZhtHelper\General\Helper_DateTime::getConvertPHPDateTimeToDateTimeTZString(
                                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                                $varAPIExecutionStartDateTime
                                );
                        }

                    $varReturn['data']['process']['API']['executionInterval'] = (
                        \App\Helpers\ZhtHelper\General\Helper_DateTime::getDifferenceOfDateTimeTZString(
                            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                            \App\Helpers\ZhtHelper\General\Helper_DateTime::getConvertPHPDateTimeToDateTimeTZString(
                                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                                $varAPIExecutionStartDateTime
                                ),
                            \App\Helpers\ZhtHelper\General\Helper_DateTime::getConvertPHPDateTimeToDateTimeTZString(
                                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                                (new \DateTime())
                                ),
                            )
                        );

                    if (
                        (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                            $varUserSession,
                            'DBMS',
                            $varReturn['data']['process']
                            ) == TRUE
                        )      
                        ) {
                        $varReturn['data']['process']['API']['executionInterval'] = (
                            \App\Helpers\ZhtHelper\General\Helper_DateTime::getDifferenceOfIntervalString(
                                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                                $varReturn['data']['process']['API']['executionInterval'],
                                $varReturn['data']['process']['DBMS']['executionInterval']
                                )
                            );
                        }

                    $varReturn['data']['process']['API']['finishDateTimeTZ'] = (
                        \App\Helpers\ZhtHelper\General\Helper_DateTime::getAdditionOfDateTimeTZStringWithIntervalString(
                            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                            $varReturn['data']['process']['API']['startDateTimeTZ'],
                            $varReturn['data']['process']['API']['executionInterval']
                            )
                        );

                    return
                        $varReturn;
                    }
                } 
//            catch (\Exception $ex) {
//                return \App\Helpers\ZhtHelper\System\Helper_HTTPError::setResponse($varUserSession, 422, $ex->getMessage());
//                }

            catch (\Symfony\Component\HttpKernel\Exception\HttpException $ex) {
                return
                    \App\Helpers\ZhtHelper\System\Helper_HTTPError::setResponse($varUserSession, $ex->getStatusCode(), $ex->getMessage());
                }
            }

        public function mainJQuery()
            {
            $varUserSession = (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System()))['userLoginSessionID'];
            
            $varDataSend = ['ccc' => 'xxxx'];

            //return \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::setResponse($varUserSession, $varDataSend);
            $varReturn = $varDataSend;
            return $varReturn;
            }
        }
    }