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
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (string) varFullClassName ► Full Class Name (include namespace)                                                   |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setCallAPIAuthentication($varUserSession, string $varUserName, string $varUserPassword)
            {
            \App\Helpers\ZhtHelper\General\Helper_Session::delete(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());
            $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();

            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Send Authentication Request');
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
                        var_dump($varResponseData);
                        }
                    else
                        {
                        echo $varResponseData['data']['message'];
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
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        public static function setCallAPIGateway($varUserSession, $varAPIWebToken, $varAPIKey, $varAPIVersion=null, $varData=null)
            {
            $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            if(!$varAPIVersion)
                {
                $varAPIVersion = 'latest';
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
                var_dump($varResponseData);
                }
            else
                {
                echo $varResponseData['data']['message'];
                }
            }
        }
    }

?>