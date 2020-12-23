<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\System\BackEnd                                                                             |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\System\FrontEnd
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_APICall                                                                                               |
    | ▪ Description : Menangani segala parameter yang terkait API Call                                                             |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_APICall
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setCallAPIAuthentication                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-05                                                                                           |
        | ▪ Description     : Memanggil API Authentication                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varUserName ► User Name                                                                                  |
        |      ▪ (string) varUserPassword ► User Password                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setCallAPIAuthentication($varUserSession, string $varUserName, string $varUserPassword)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Call Authentication API');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    $varDataArray = [
                        'metadata' => [
                            'API' => [
                                'version' => 'latest'
                                ]
                            ],
                        'data' => [
                            'userName' => $varUserName,
                            'userPassword' => $varUserPassword
                            ]
                        ];
                    $varResponseData = \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::getResponse(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getFrontEndConfigEnvironment($varUserSession, 'URL_BACKEND_API_AUTH'),
                        $varDataArray
                        );
//dd($varResponseData);
                    
                    if($varResponseData['metadata']['HTTPStatusCode']==200)
                        {
                        //var_dump($varResponseData);
                        $varReturn = $varResponseData;
                        }
                    else
                        {
                        echo $varResponseData['data']['message'];
                        die();
                        }
//                        \App\Helpers\ZhtHelper\General\Helper_DateTime::getTimeStampTZConvert_GMTToOtherTimeZone($varUserSession, 'Tue, 25 Aug 2020 08:23:38 GMT', 7);                   
//phpinfo();
//                    echo "RESPON DATA : ";
//                    echo "<br>~~~~~~~~~~~~~~~~~~~~~~~<br>";
//                    $x = \App\Helpers\ZhtHelper\General\Helper_File::getFilesListInFolder($varUserSession, getcwd().'/./../app/Http/Controllers/Application/BackEnd/System/Authentication/Engines/general/getUserAuthentication');
//                    var_dump($x);
//                    echo "<br>~~~~~~~~~~~~~~~~~~~~~~~<br>";
//                    var_dump(headers_list());
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setCallAPIGateway                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-05                                                                                           |
        | ▪ Description     : Memanggil API Gateway                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varAPIWebToken ► API WebToken                                                                            |
        |      ▪ (string) varAPIKey ► API Key                                                                                      |
        |      ▪ (mixed)  varAPIVersion ► API Version                                                                              |
        |      ▪ (array)  varData ► Data                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setCallAPIGateway($varUserSession, string $varAPIWebToken, string $varAPIKey, $varAPIVersion=null, array $varData=null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Call Gateway API');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if(!$varAPIVersion)
                        {
                        $varAPIVersion = 'latest';
                        }
                    else
                        {
                        $varAPIVersion = strtolower($varAPIVersion);
                        }
        
                    if(!$varData)
                        {
                        $varData = [];
                        }
                    $varDataArray = [
                        'header' => [
                            'authorization' => 'Bearer'.' '.$varAPIWebToken,
                            ],
                        'metadata' => [
                            'API' => [
                                'key' => $varAPIKey,
                                'version' => $varAPIVersion
                                ]
                            ],
                        'data' => $varData
                        ];
                    $varResponseData = \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::getResponse(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getFrontEndConfigEnvironment($varUserSession, 'URL_BACKEND_API_GATEWAY'),
                        $varDataArray
                        );
                    
                    if($varResponseData['metadata']['HTTPStatusCode']==200)
                        {
                        $varReturn = $varResponseData;
                        }
                    else
                        {
                        $varRequesterSegment = (request()->segments())[0];
                        //---> Jika Requester berasal dari Gateway JQuery
                        if(strcmp($varRequesterSegment, "APIGatewayJQuery_setRequest") == 0)
                            {
                            $varReturn = $varResponseData;
                            }
                        //---> Jika Requester berasal dari Gateway PHP
                        else
                            {
                            echo $varResponseData['data']['message'];
                            die();
                            }                        
                        }
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setCallAPIGatewayJQuery                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-12-18                                                                                           |
        | ▪ Description     : Memanggil API Gateway JQuery                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varAPIWebToken ► API WebToken                                                                            |
        |      ▪ (string) varAPIKey ► API Key                                                                                      |
        |      ▪ (mixed)  varAPIVersion ► API Version                                                                              |
        |      ▪ (array)  varData ► Data                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setCallAPIGatewayJQuery($varUserSession, string $varAPIWebToken, string $varAPIKey, $varAPIVersion = null, array $varData=null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Call Gateway API');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if(!$varAPIVersion)
                        {
                        $varAPIVersion = 'latest';
                        }
                    else
                        {
                        $varAPIVersion = strtolower($varAPIVersion);
                        }
        
                    if(!$varData)
                        {
                        $varData = [];
                        }

                    $varReturn = \App\Helpers\ZhtHelper\General\Helper_JQuery::setSyntaxFunc_AJAX_Post_JSON(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getFrontEndConfigEnvironment($varUserSession, 'URL_BACKEND_API_GATEWAY'),
                        json_encode([
                            'metadata' => [
                                'API' => [
                                    'key' => $varAPIKey,
                                    'version' => $varAPIVersion
                                    ]
                                ],
                            'data' => $varData
                            //'_token' => \App\Helpers\ZhtHelper\System\Helper_Environment::getCSRFToken($varUserSession)
                            ]),
                        [
                        //'Agentx-DateTime' => \App\Helpers\ZhtHelper\General\Helper_JavaScript::setSyntaxFunction_ClientCurrentDateTimeUTC($varUserSession),
                        'Authorization' => 'Bearer '.$varAPIWebToken,
                        'User-Agent' => $_SERVER['HTTP_USER_AGENT'],
                        'Agent-DateTime' => \App\Helpers\ZhtHelper\General\Helper_JavaScript::setSyntaxFunc_ClientCurrentDateTimeUTC($varUserSession),
                        'Expires' => \App\Helpers\ZhtHelper\General\Helper_JavaScript::setSyntaxFunc_ClientCurrentDateTimeUTC($varUserSession, (10*60)),
                        'Content-MD5' => \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateContentMD5($varUserSession, json_encode(
                            [
                            //'header' => [],
                            'metadata' => [
                                'API' => [
                                    'key' => $varAPIKey,
                                    'version' => $varAPIVersion
                                    ]
                                ],
                            'data' => $varData
                            ]
                            )),
                        'X-Request-ID' => \App\Helpers\ZhtHelper\General\Helper_RandomNumber::getUniqueID($varUserSession)
                            ]
                        );
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }
        }
    }

?>