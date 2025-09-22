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
            $varProcessExecutionStartDateTime = (new \DateTime());
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
                    //dd($varDataSend);
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----

                    //-----[ UPDATE PROCESSING TIME ]-----( START )-----
                    try {
                        if (
                            (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                                $varUserSession,
                                'process',
                                $varDataSend['data']
                                ) == TRUE
                            )      
                            ) {

                            $varDataSend['data']['process']['overAll']['executionTime'] = [
                                'interval' => null,
                                'startDateTimeTZ' => null,
                                'finishDateTimeTZ' => null
                                ];

                            if (
                                (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                                    $varUserSession,
                                    'DBMS',
                                    $varDataSend['data']['process']
                                    ) == TRUE
                                )      
                                ) {
                                $varProcessDBMS =
                                    $varDataSend['data']['process']['DBMS'];
                                }
                            else
                                {
                                $varProcessDBMS = [
                                    'executionTime' => [
                                        'interval' => null,
                                        'startDateTimeTZ' => null,
                                        'finishDateTimeTZ' => null                                    
                                        ]
                                    ];
                                }

                            unset($varDataSend['data']['process']['DBMS']);
                            $varDataSend['data']['process']['DBMS'] = $varProcessDBMS;

                            $varProcessAPIPreliminarilyStartDateTimeTZString =
                                \App\Helpers\ZhtHelper\General\Helper_DateTime::getConvertPHPDateTimeToDateTimeTZString(
                                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                                    $varProcessExecutionStartDateTime
                                    );

                            $varProcessAPIClosureStartDateTimeTZString =
                                \App\Helpers\ZhtHelper\General\Helper_DateTime::getConvertPHPDateTimeToDateTimeTZString(
                                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                                    (new \DateTime())
                                    );

                            if ($varDataSend['data']['process']['DBMS']['executionTime']['interval'] == null)
                                {
                                $varDataSend['data']['process']['API']['executionTime'] = [
                                    'interval' =>
                                        \App\Helpers\ZhtHelper\General\Helper_DateTime::getDifferenceOfDateTimeTZString(
                                            $varUserSession,
                                            $varProcessAPIPreliminarilyStartDateTimeTZString,
                                            $varProcessAPIClosureStartDateTimeTZString
                                            ),
                                    'startDateTimeTZ' => $varProcessAPIPreliminarilyStartDateTimeTZString,
                                    'finishDateTimeTZ' => $varProcessAPIClosureStartDateTimeTZString
                                    ];

                                $varDataSend['data']['process']['overAll']['executionTime'] = [
                                    'interval' => $varDataSend['data']['process']['API']['executionTime']['interval'],
                                    'startDateTimeTZ' => $varDataSend['data']['process']['API']['executionTime']['startDateTimeTZ'],
                                    'finishDateTimeTZ' => $varDataSend['data']['process']['API']['executionTime']['finishDateTimeTZ']
                                    ];
                                }
                            else
                                {
                                $varDataSend['data']['process']['API']['executionTime'] = [
                                    'interval' =>
                                        \App\Helpers\ZhtHelper\General\Helper_DateTime::getDifferenceOfIntervalString(
                                            $varUserSession,
                                            \App\Helpers\ZhtHelper\General\Helper_DateTime::getDifferenceOfDateTimeTZString(
                                                $varUserSession,
                                                $varProcessAPIPreliminarilyStartDateTimeTZString,
                                                $varProcessAPIClosureStartDateTimeTZString
                                                ),
                                            $varDataSend['data']['process']['DBMS']['executionTime']['interval']
                                            ),
                                    'preliminarilyStartDateTimeTZ' => $varProcessAPIPreliminarilyStartDateTimeTZString,
                                    'preliminarilyFinishDateTimeTZ' => $varDataSend['data']['process']['DBMS']['executionTime']['startDateTimeTZ'],
                                    'closureStartDateTimeTZ' => $varDataSend['data']['process']['DBMS']['executionTime']['finishDateTimeTZ'],
                                    'closureFinishDateTimeTZ' => $varProcessAPIClosureStartDateTimeTZString
                                    ];

                                $varDataSend['data']['process']['overAll']['executionTime'] = [
                                    'interval' =>
                                        \App\Helpers\ZhtHelper\General\Helper_DateTime::getAdditionOfIntervalString(
                                            $varUserSession,
                                            $varDataSend['data']['process']['API']['executionTime']['interval'],
                                            $varDataSend['data']['process']['DBMS']['executionTime']['interval']
                                            ),
                                    'startDateTimeTZ' => $varDataSend['data']['process']['API']['executionTime']['preliminarilyStartDateTimeTZ'],
                                    'finishDateTimeTZ' => $varDataSend['data']['process']['API']['executionTime']['closureFinishDateTimeTZ']
                                    ];
                                }                       
                            }
                        }
                    catch (\Exception $ex) {
                        }
                    //-----[ UPDATE PROCESSING TIME ]-----(  END  )-----
                    $varReturn =
                        \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::setResponse(
                            $varUserSession,
                            $varDataSend
                            );
                    //dd($varReturn);

/*
//------------< BLOCKING >------------------
    dd (
        \App\Helpers\ZhtHelper\General\Helper_DateTime::getDifferenceOfDateTimeTZString(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            \App\Helpers\ZhtHelper\General\Helper_DateTime::getConvertPHPDateTimeToDateTimeTZString(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), $varProcessExecutionStartDateTime),
            \App\Helpers\ZhtHelper\General\Helper_DateTime::getConvertPHPDateTimeToDateTimeTZString(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), (new \DateTime())),
            )
        );
//------------< BLOCKING >------------------
*/
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