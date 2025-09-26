<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\System\BackEnd                                                                             |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\System\BackEnd
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
        public static function setCallAPIAuth() {
            $varObjLoginBranchAndUserRole =
                (
                new
                \App\Http\Controllers\Application\BackEnd\System\Authentication\Engines\general\setLoginBranchAndUserRole\v1\setLoginBranchAndUserRole()
                );

            }
        
        */


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setCallAPIGateway                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000001                                                                                       |
        | ▪ Last Update     : 2025-01-06                                                                                           |
        | ▪ Creation Date   : 2021-07-26                                                                                           |
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
        public static function setCallAPIGateway(
            $varUserSession, string $varAPIWebToken,
            string $varAPIKey, $varAPIVersion = null, array $varData = null, bool $varSignDisplayErrorPage = null)
            {
            $varReturn =
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);

            try {
                $varSysDataProcess =
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__,
                        'Call Gateway API'
                        );

                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    //$varAPIWebToken = (new \App\Models\Database\SchSysConfig\General())->getAPIWebToken_SysEngine($varUserSession);
                    //dd($varAPIWebToken);

                        //---> Initializing : varAPIVersion
                            if (!$varAPIVersion) {
                                $varAPIVersion =
                                    'latest';
                                }
                            else {
                                $varAPIVersion =
                                    strtolower(
                                        $varAPIVersion
                                        );
                                }

                        //---> Initializing : varSignDisplayErrorPage
                            if ($varSignDisplayErrorPage === NULL) {
                                $varSignDisplayErrorPage =
                                    TRUE;
                                }

                    //--->
                    if (!$varData)
                        {
                        $varData = [];
                        }
                        
                    if (strcmp($varAPIKey, 'transaction.synchronize.dataAcquisition.setLog_Device_PersonAccess') == 0)
                        {
                        set_time_limit(300);
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

                    $varResponseData =
                        \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::getResponse(
                            $varUserSession,
                            (
                            ((\App\Helpers\ZhtHelper\General\Helper_Network::isHTTPS($varUserSession)) == TRUE ? 'https': 'http').
                                '://'.
                                \App\Helpers\ZhtHelper\General\Helper_Network::getServerIPAddress($varUserSession).
                                '/api/gateway'
                            ),
                            $varDataArray
                            );

                    if ($varResponseData['metadata']['HTTPStatusCode'] == 200)
                        {
                        $varReturn = $varResponseData;
                        }
                    else
                        {
                            {
                                {
                                if ($varSignDisplayErrorPage === TRUE)
                                    {
                                    echo $varResponseData['data']['message'];
                                    }
                                $varResponseData['data']['message'] = explode('</i></b></font></td></tr></table></div></body></html>', (explode('►<b><i> ', $varResponseData['data']['message']))[1])[0];
                                }
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
        }
    }