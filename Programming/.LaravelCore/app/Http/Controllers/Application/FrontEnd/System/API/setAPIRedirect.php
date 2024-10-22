<?php

namespace App\Http\Controllers\Application\FrontEnd\System\API
    {
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
 
    class setAPIRedirect extends \App\Http\Controllers\Controller
        {
        public function __construct()
            {
            }
        
        public function main()
            {
            $varAPIWebToken = 
                \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System();
            
            $varUserSession =
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_ByAPIWebToken(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken
                    );
            $varUserSession = 1;

            $varData = 
                [
                'dataWarehouse.dataCheck.recordIDExistantion.acquisition.getFileUpload_Pointer', 
                'latest', 
                [
                'parameter' => [
                    'recordID' => 91000000000001
                    ]
                ]
                ];

            $varData =
                [
                'dataPickList.master.getBank', 
                'latest',
                [
                'parameter' => [
                    ]
                ]
                ];

            $varHeaders = [
                'Authorization' => (((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'header', $varData) == true) && (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'authorization', $varData['header']) == true)) ? $varData['header']['authorization'] : null),
                'User-Agent' => (empty($_SERVER['HTTP_USER_AGENT'])? 'Non Browser' : $_SERVER['HTTP_USER_AGENT']),
                'Agent-DateTime' => \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateDate($varUserSession),
                'Expires' => \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateExpires($varUserSession, (10*60)),
                'Content-Type' => \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateContentType($varUserSession, json_encode($varData)),
                'X-Content-MD5' => \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateContentMD5(
                    $varUserSession, 
                    json_encode(
                        \App\Helpers\ZhtHelper\General\Helper_Array::setRemoveElementByKey(
                            \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateDate($varUserSession), 
                            'header', 
                            $varData
                            )
                        )
                    ),
                'X-Request-ID' => \App\Helpers\ZhtHelper\General\Helper_RandomNumber::getUniqueID($varUserSession)
                ];


            $ObjClient = new \GuzzleHttp\Client();
            $varResponse = null;
            $varResponseData = null;
            try {
                $varResponse =
                    $ObjClient->request(
                        'POST',
                        'http://172.28.0.4/api/getAPIRedirect',
                        [
                        'verify' => false,
                        'headers' => $varHeaders,
                        'body' =>  json_encode($varData, true),
                        'timeout' => 5,
                        'connect_timeout' => 2
                        ]
                        );

                
//dd(\App\Helpers\ZhtHelper\System\Helper_Environment::getFrontEndConfigEnvironment($varUserSession, 'URL_FRONTEND_JQUERY_API_GATEWAY_HTTPSPROXY'));
//dd(\App\Helpers\ZhtHelper\System\Helper_Environment::getFrontEndConfigEnvironment($varUserSession, 'URL_BACKEND_API_GATEWAY'));

//dd($varResponse);
                $varResponseData =
                    \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::getResponse_BodyContent(
                        $varUserSession,
                        $varResponse
                        );
                } 
            catch (\GuzzleHttp\Exception\BadResponseException $ex) {
                $response = $ex->getResponse();
                $responseBodyAsString = $response->getBody()->getContents();
                }

dd($varResponseData);
            }
        }
    }