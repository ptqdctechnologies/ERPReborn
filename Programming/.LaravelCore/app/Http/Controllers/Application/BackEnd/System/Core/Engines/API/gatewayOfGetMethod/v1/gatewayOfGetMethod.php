<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Core\Engines\API\gatewayOfGetMethod\v1                           |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\Core\Engines\API\gatewayOfGetMethod\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : gatewayOfGetMethod                                                                                           |
    | ▪ Description : Menangani API core.API.gatewayOfGetMethod Version 1                                                          |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class gatewayOfGetMethod extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-04                                                                                           |
        | ▪ Creation Date   : 2022-08-04                                                                                           |
        | ▪ Description     : System's Default Constructor                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        function __construct()
            {
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : main                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-04                                                                                           |
        | ▪ Creation Date   : 2022-08-04                                                                                           |
        | ▪ Description     : Fungsi Utama Engine                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varData ► Data                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        function main(string $varAPIWebToken, string $varSignature, string $varEncryptedData)
            {
            $varReturn = null;
            $varUserSession =
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_ByAPIWebToken(
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                        $varAPIWebToken
                        );

            try {
                if(!$varUserSession =
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_ByAPIWebToken(
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                        $varAPIWebToken
                        ))
                    {
                    throw new \Exception();
                    }
                $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
                try {
                    $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Gateway (version 1)');
                    try {
                        //---- ( MAIN CODE ) ------------------------------------------------------------------------- [ START POINT ] -----
                        //var_dump($varAPIWebToken);
                        //var_dump($varSignature);                       
                        $varArrayData = 
                            \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                                $varUserSession, 
                                \App\Helpers\ZhtHelper\General\Helper_Encode::getBase64Decode(
                                    $varUserSession, 
                                    $varEncryptedData
                                    )
                                );
                        //dd($varArrayData);
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_APICall::setCallAPIGateway(
                            $varUserSession, 
                            $varAPIWebToken, 
                            $varArrayData['metadata']['API']['key'], 
                            $varArrayData['metadata']['API']['version'], 
                            $varArrayData['data'], 
                            FALSE
                            );
                        //---- ( MAIN CODE ) --------------------------------------------------------------------------- [ END POINT ] -----
                        \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                        } 
                    catch (\Exception $ex) {
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 401, $ex->getMessage());
                        \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                        }
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                    } 
                catch (\Exception $ex) {
                    }
                return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
                } 
            catch (\Exception $ex) {
                return $varReturn;
                }
            }

        function xxx()
            {

            
            
            
            
            }
        }
    }