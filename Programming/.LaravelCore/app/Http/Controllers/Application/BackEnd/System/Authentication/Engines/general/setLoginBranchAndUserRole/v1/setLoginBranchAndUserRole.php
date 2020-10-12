<?php


namespace App\Http\Controllers\Application\BackEnd\System\Authentication\Engines\general\setLoginBranchAndUserRole\v1
    {
    class setLoginBranchAndUserRole extends \App\Http\Controllers\Controller
        {
        function __construct()
            {
            }


        function main($varUserSession, $varData)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Login Branch And User Role (version 1)');
                try {
                    //---- ( MAIN CODE ) ------------------------------------------------------------------------- [ START POINT ] -----
                    $varAPIWebToken = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession)['APIWebToken'];
                    $varBranchID = $varData['branchID'];
                    $varUserRoleID = $varData['userRoleID'];
                    
                    $varTemp = (new \App\Models\Database\SchSysConfig\General())->setUserSessionBranchAndUserRole($varUserSession, $varUserSession, $varBranchID, $varUserRoleID);
                    //(new \App\Models\Cache\General\APIWebToken())->getDataTTL($varUserSession, $varKey)
                    
//                   $varTemp = (new \App\Models\Database\SchSysConfig\General())->setUserSessionLogout($varUserSession, $varUserSession);        
  //                  $varTemp = (new \App\Models\Cache\General\APIWebToken())->setDataDelete($varUserSession, (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['APIWebToken']);                   
                    $varDataSend = ['message' => 'User Logout Successfully'];
                    $varDataSend = ['message' => $varData];
                    $varDataSend = ['message' => $varAPIWebToken];
                    
                    $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success($varUserSession, $varDataSend);
                    //---- ( MAIN CODE ) --------------------------------------------------------------------------- [ END POINT ] -----
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