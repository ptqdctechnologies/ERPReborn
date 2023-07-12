<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\System\FrontEnd                                                                            |
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
        | ▪ Method Name     : getUserSessionByAPIWebToken                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-08                                                                                           |
        | ▪ Description     : Mendapatkan User Session berdasarkan API Web Token                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varAPIWebToken ► API Web Token                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getUserSessionByAPIWebToken($varUserSession, string $varAPIWebToken)
            {
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                //\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varUserSession,
                $varAPIWebToken, 
                'environment.general.session.getData', 
                'latest', 
                [
                ]
                );
            $varReturn = $varData['data']['userLoginSessionID'];
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setCallAPIAuthentication                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2021-08-16                                                                                           |
        | ▪ Description     : Memanggil API Authentication                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varUserName ► User Name                                                                                  |
        |      ▪ (string) varUserPassword ► User Password                                                                          |
        |      ▪ (bool)   varSignDisplayErrorPage ► Sign Display Error Page (Optional)                                             |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setCallAPIAuthentication($varUserSession, string $varUserName, string $varUserPassword, bool $varSignDisplayErrorPage = null)
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
                    
                    if($varResponseData['metadata']['HTTPStatusCode']==200)
                        {
                        //var_dump($varResponseData);
                        $varReturn = $varResponseData;
                        }
                    else
                        {
                        if($varSignDisplayErrorPage === TRUE)
                            {
                            echo $varResponseData['data']['message'];
                            }
                        $varResponseData['data']['message'] = explode('</i></b></font></td></tr></table></div></body></html>', (explode('►<b><i> ', $varResponseData['data']['message']))[1])[0];
                        $varReturn = $varResponseData;
                        //die();
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
        | ▪ Method Name     : setCallAPIAuthenticationJQuery                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-05                                                                                           |
        | ▪ Description     : Memanggil API Authentication melalui JQuery                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varUserName ► User Name                                                                                  |
        |      ▪ (string) varUserPassword ► User Password                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setCallAPIAuthenticationJQuery($varUserSession, string $varData=null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Call Authentication API');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if(!$varData)
                        {
                        $varData = '{}';
                        }
                    $varReturn = 
                        'function() '.
                            '{ '.
                            'varReturn = null; '.
                            'try '.
                                '{ '.
                                'varReturn = new zht_JSAPIRequest_Authentication('.
                                    '"'.\App\Helpers\ZhtHelper\System\Helper_Environment::getFrontEndConfigEnvironment(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 'URL_BACKEND_API_AUTH').'", '.
                                    $varData.
                                    '); '.
//                                'alert(JSON.stringify('.$varData.')); '.
                                '} '.
                            'catch(varError) '.
                                '{ '.
                                'alert("ERP Reborn Error Notification\n\nInvalid Data Request\n(" + varError + ")"); '.
                                '} '.
                            'return varReturn.value; '.
                            '}()';
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

            
            
            
            
        public static function setCallAPIAuthenticationJQueryOLD($varUserSession, string $varUserName, string $varUserPassword)
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
                    
                    $varReturn = \App\Helpers\ZhtHelper\General\Helper_JQuery::setSyntaxFunc_AJAX_Post_JSON(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getFrontEndConfigEnvironment($varUserSession, 'URL_BACKEND_API_AUTH'),
                        json_encode($varDataArray),
                        [
                        'User-Agent' => \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxFunc_ClientAgent($varUserSession),
                        'Agent-DateTime' => \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxFunc_ClientCurrentDateTimeUTC($varUserSession),
                        'Expires' => \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxFunc_ClientCurrentDateTimeUTC($varUserSession, (10*60)),
//                        'X-Content-MD5Old' => \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateContentMD5($varUserSession, json_encode(
//                            $varDataArray
//                            )),
                        'X-Content-MD5' => \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxFunc_MD5($varUserSession, 'varJSONObject'),
                        'X-Request-ID' => \App\Helpers\ZhtHelper\General\Helper_RandomNumber::getUniqueID($varUserSession)
                            ]
                        );

/*                    
                    $varResponseData = \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::getResponse(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getFrontEndConfigEnvironment($varUserSession, 'URL_BACKEND_API_AUTH'),
                        $varDataArray
                        );
                    if($varResponseData['metadata']['HTTPStatusCode']==200)
                        {
                        $varReturn = $varResponseData;
                        }
                    else
                        {
                        echo $varResponseData['data']['message'];
                        die();
                        }*/
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


        public static function getURL_APICallByGetMethod($varUserSession, string $varAPIWebToken, string $varAPIKey, $varAPIVersion=null, array $varData=null, string $varExpiredInterval = null, bool $varSignDisplayErrorPage = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Call Gateway API By GET Method');
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

                    if($varSignDisplayErrorPage === NULL)
                        {
                        $varSignDisplayErrorPage = TRUE;
                        }

                    if(!$varData)
                        {
                        $varData = [];
                        }
                        
                    if(!$varExpiredInterval)
                        {
                        $varExpiredInterval = '5 minutes';
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

                    $varReturn = 
                        \App\Helpers\ZhtHelper\General\Helper_Network::getCurrentProtocol($varUserSession).
                        \App\Helpers\ZhtHelper\General\Helper_Network::getServerIPAddress($varUserSession).
                        '/'.
                        'api'.
                        '/'.
                        'gatewayOfGetMethod'.
                        '/'.
                        $varAPIWebToken.
                        '/'.
                        (new \App\Models\Database\SchSysConfig\TblRotateLog_APIRequestByGet_Signature())->setDataInsert(
                            $varUserSession, 
                            $varAPIWebToken, 
                            \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(
                                $varUserSession,
                                $varDataArray
                                ), 
                            $varExpiredInterval
                            ).
                        '/'.
                        \App\Helpers\ZhtHelper\General\Helper_Encode::getBase64Encode(
                            $varUserSession, 
                            \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(
                                $varUserSession,
                                $varDataArray
                                )
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


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setCallAPIGateway                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-26                                                                                           |
        | ▪ Description     : Memanggil API Gateway                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varAPIWebToken ► API WebToken                                                                            |
        |      ▪ (string) varAPIKey ► API Key                                                                                      |
        |      ▪ (mixed)  varAPIVersion ► API Version                                                                              |
        |      ▪ (array)  varData ► Data                                                                                           |
        |      ▪ (bool)   varSignDisplayErrorPage ► Sign Display Error Page (Optional)                                             |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setCallAPIGateway($varUserSession, string $varAPIWebToken, string $varAPIKey, $varAPIVersion=null, array $varData=null, bool $varSignDisplayErrorPage = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Call Gateway API');
                try {
                    //dd($varData['SQLStatement']['filter']);
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if(!$varAPIVersion)
                        {
                        $varAPIVersion = 'latest';
                        }
                    else
                        {
                        $varAPIVersion = strtolower($varAPIVersion);
                        }

                    if($varSignDisplayErrorPage === NULL)
                        {
                        $varSignDisplayErrorPage = TRUE;
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
                            if($varSignDisplayErrorPage === TRUE)
                                {
                                echo $varResponseData['data']['message'];
                                }
                            $varResponseData['data']['message'] = explode('</i></b></font></td></tr></table></div></body></html>', (explode('►<b><i> ', $varResponseData['data']['message']))[1])[0];
                            $varReturn = $varResponseData;
                            //die();
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
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2021-01-04                                                                                           |
        | ▪ Description     : Memanggil API Gateway melalui JQuery                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varAPIWebToken ► API WebToken                                                                            |
        |      ▪ (string) varAPIKey ► API Key                                                                                      |
        |      ▪ (mixed)  varAPIVersion ► API Version                                                                              |
        |      ▪ (string) varData ► Data Array (Non JSON Object agar bisa mereferensi kepada objek DOM)                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setCallAPIGatewayJQuery($varUserSession, string $varAPIWebToken, string $varAPIKey, $varAPIVersion = null, string $varData=null, int $varTimeOut = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Call Gateway API');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if(!$varAPIVersion) {
                        $varAPIVersion = 'latest';
                        }
                    else {
                        $varAPIVersion = strtolower($varAPIVersion);
                        }

                    if(!$varData) {
                        $varData = '{}';
                        }
                    $varData = htmlspecialchars_decode($varData);
                    
                    if(!$varTimeOut) {
                        $varTimeOut = 5000;
                        }
                    
//                   dd($varData);
//                    dd(\App\Helpers\ZhtHelper\System\Helper_Environment::getFrontEndConfigEnvironment(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 'URL_BACKEND_API_GATEWAY'));
                    $varReturn = 
                        'function() '.
                            '{ '.
                            'varReturn = null; '.
                            'varReturnValue = null; '.
                            'try '.
                                '{ '.
                                'varJSONData = JSON.parse(JSON.stringify('.$varData.')); '.
                                //'alert(JSON.stringify(varJSONData)); '.
                                'varReturn = new zht_JSAPIRequest_Gateway('.
                                    '"'.$varAPIWebToken.'", '.
                                    '"'.\App\Helpers\ZhtHelper\System\Helper_Environment::getFrontEndConfigEnvironment(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 'URL_BACKEND_API_GATEWAY').'", '.
                                    '"'.$varAPIKey.'", '.
                                    '"'.$varAPIVersion.'", '.
                                    'varJSONData, '.
                                    ''.$varTimeOut.''.
                                    '); '.
//                                'alert(varJSONData); '.
//                                'alert("done"); '.
                                'varReturnValue = varReturn.value; '.
                                '} '.
                            'catch(varError) '.
                                '{ '.
                                'alert("ERP Reborn Error Notification\n\nInvalid Data Request\n(" + varError + ")"); '.
                                '} '.
//                            'return varReturn.value; '.
                            'return varReturnValue; '.
                            '}()';
//                    dd($varReturn);
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
        | ▪ Description     : Memanggil API Gateway melalui JQuery                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varAPIWebToken ► API WebToken                                                                            |
        |      ▪ (string) varAPIKey ► API Key                                                                                      |
        |      ▪ (mixed)  varAPIVersion ► API Version                                                                              |
        |      ▪ (string) varJSDataArray ► JS Data Array (Non JSON agar bisa mereferensi kepada objek DOM)                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
/*        public static function setCallAPIGatewayJQueryOLD($varUserSession, string $varAPIWebToken, string $varAPIKey, $varAPIVersion = null, string $varData=null)
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
                        $varData = '';
                        }

                    $varReturn = \App\Helpers\ZhtHelper\General\Helper_JQuery::setSyntaxFunc_AJAX_Post_JSON(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getFrontEndConfigEnvironment($varUserSession, 'URL_BACKEND_API_GATEWAY'),
                           
                        '{'.
                        '"metadata":'.
                            '{'.
                            '"API":'.
                                '{'.
                                '"key":"'.$varAPIKey.'", '.
                                '"version":"'.$varAPIVersion.'"'.
                                '}'.
                            '},'.
                        '"data":'.
                            '{'.
                            $varData.
                            '}'.
                        '}',
//
//                       json_encode([
//                            'metadata' => [
//                                'API' => [
//                                    'key' => $varAPIKey,
//                                    'version' => $varAPIVersion
//                                    ]
//                                ],
//                            'data' => $varData
//                            //'_token' => \App\Helpers\ZhtHelper\System\Helper_Environment::getCSRFToken($varUserSession)
//                            ]),
//                             
                            
                            
                        [
                        'Authorization' => 'Bearer '.$varAPIWebToken,
                        'User-Agent' => \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxFunc_ClientAgent($varUserSession),
                        //'User-Agent' => $_SERVER['HTTP_USER_AGENT'],
                        'Agent-DateTime' => \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxFunc_ClientCurrentDateTimeUTC($varUserSession),
                        'Expires' => \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxFunc_ClientCurrentDateTimeUTC($varUserSession, (10*60)),
                        'X-Content-MD5' => \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxFunc_MD5($varUserSession, 'varJSONObject'),
                        'X-Request-ID' => \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxFunc_UniqueID($varUserSession, $varAPIWebToken),
                        //'X-Request-ID' => \App\Helpers\ZhtHelper\General\Helper_RandomNumber::getUniqueID($varUserSession)
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
*/
            
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setCallAPIGatewayDownloadExcel                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-01-21                                                                                           |
        | ▪ Description     : Memanggil API Report Gateway untuk Download Excel                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varAPIWebToken ► API WebToken                                                                            |
        |      ▪ (string) varAPIKey ► API Key                                                                                      |
        |      ▪ (mixed)  varAPIVersion ► API Version                                                                              |
        |      ▪ (array)  varData ► Data                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (mixed)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setCallAPIGatewayDownloadExcel($varUserSession, string $varAPIWebToken, string $varAPIKey, $varAPIVersion = null, array $varData = null)
            {
            $varExcelStreamPlain = null;

            $varUserSession = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::getUserSessionByAPIWebToken(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken);

            $varDataReturn = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                $varUserSession,
                $varAPIWebToken, 
                $varAPIKey,
                $varAPIVersion,
                $varData
                );
            
            try {
                switch($varDataReturn['data']['encodeMethod'])
                    {
                    case 'Base64':
                        {
                        $varExcelStreamPlain = \App\Helpers\ZhtHelper\General\Helper_Encode::getBase64Decode(
                            $varUserSession,
                            $varDataReturn['data']['encodedStreamData']
                            );
                        break;
                        }
                    default:
                        {
                        throw new \Exception('encoding method not recognized');
                        break;
                        }
                    }
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Cache-Control: must-revalidate');
                header('Expires: 0');
                header('Pragma: public');
                header('Content-Disposition: attachment; filename="'.$varData['outputFileName'].'"');
                echo $varExcelStreamPlain;
                die();
                } 
            catch (\Exception $ex) {
//                echo $ex->getMessage();
                var_dump($varDataReturn);
//                echo $varDataReturn['data']['Response'];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setCallAPIGatewayReport                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-08                                                                                           |
        | ▪ Description     : Memanggil API Report Gateway                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varAPIWebToken ► API WebToken                                                                            |
        |      ▪ (string) varAPIKey ► API Key                                                                                      |
        |      ▪ (mixed)  varAPIVersion ► API Version                                                                              |
        |      ▪ (array)  varData ► Data                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (mixed)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setCallAPIGatewayReport($varUserSession, string $varAPIWebToken, string $varAPIKey, $varAPIVersion = null, array $varData = null)
            {
            try {
                if(!$varData['outputFileName'])
                    {
                    $varOutputFileName = 'output.pdf';
                    }
                else
                    {
                    $varOutputFileName = $varData['outputFileName'];
                    }

                $varUserSession = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::getUserSessionByAPIWebToken(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken);

                $varDataReturn = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    $varUserSession,
                    $varAPIWebToken, 
                    $varAPIKey,
                    $varAPIVersion,
                    $varData
                    );
                
                try {
                    $varPDFStreamPlain = null;
                    switch($varDataReturn['data']['encodeMethod'])
                        {
                        case 'Base64':
                            {
                            $varPDFStreamPlain = \App\Helpers\ZhtHelper\General\Helper_Encode::getBase64Decode(
                                $varUserSession,
                                $varDataReturn['data']['encodedStreamData']
                                );
                            break;
                            }
                        default:
                            {
                            throw new \Exception('encoding method not recognized');
                            break;
                            }
                        }

                    \App\Helpers\ZhtHelper\Report\Helper_PDF::setDataStreamToDisplay(
                        $varUserSession, 
                        $varPDFStreamPlain, 
                        $varOutputFileName
                        );
                    die();                    
                    } 
                catch (\Exception $ex) {
                    echo $varDataReturn['data']['Response'];
                    }
                } 
            catch (\Exception $ex) {
                $varErrorMessage = $ex->getMessage();
                $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                    $varUserSession, 
                    500, 
                    $varErrorMessage
                    );
                return $varReturn;
                }
            }
        }
    }

?>