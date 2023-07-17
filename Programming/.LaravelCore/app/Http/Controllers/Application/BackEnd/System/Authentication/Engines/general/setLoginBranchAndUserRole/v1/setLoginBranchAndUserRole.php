<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Authentication\Engines\general\setLoginBranchAndUserRole\v1      |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\Authentication\Engines\general\setLoginBranchAndUserRole\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : setLoginBranchAndUserRole                                                                                    |
    | ▪ Description : Menangani API authentication.general.setLoginBranchAndUserRole Version 1                                     |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class setLoginBranchAndUserRole extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-13                                                                                           |
        | ▪ Creation Date   : 2020-11-13                                                                                           |
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
        | ▪ Last Update     : 2020-11-13                                                                                           |
        | ▪ Creation Date   : 2020-11-13                                                                                           |
        | ▪ Description     : Fungsi Utama Engine                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varData ► Data                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
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
                    
//                   $varTemp = (new \App\Models\Database\SchSysConfig\General())->setUserSessionLogout($varUserSession, $varUserSession);        
  //                  $varTemp = (new \App\Models\Cache\General\APIWebToken())->setDataDelete($varUserSession, (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['APIWebToken']);                   
//                    $varDataSend = ['message' => 'User Logout Successfully'];
  //                  $varDataSend = ['message' => $varData];
    //                $varDataSend = ['message' => $varAPIWebToken];
                    
                    //--->
                    //dd((new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession())->getDataRecord($varUserSession, $varUserSession)[0]['OptionsList']);
                    $varDataOptionList = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode($varUserSession, (new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession())->getDataRecord($varUserSession, $varUserSession)[0]['OptionsList']);
                    for($i=0; $i!=count($varDataOptionList); $i++)
                        {
                        $varCachedData = [];
                        $varDataBranchList[$i] = $varDataOptionList[$i]['branch_RefID'];
                        for($j=0, $jMax = count($varDataOptionList[$i]['userRole']); $j!=$jMax; $j++)
                            {
                            $varDataUserRoleList[$varDataOptionList[$i]['branch_RefID']][$j] = $varDataOptionList[$i]['userRole'][$j]['userRole_RefID'];
                            //dd($varDataOptionList[$i]['branch_RefID']);
                            //dd($varDataOptionList[$i]['userRole']);
                            
                            //---> Cached Data Combined Budget
                            for($k=0, $kMax=count($varDataOptionList[$i]['userRole'][$j]['combinedBudget']); $k!=$kMax; $k++)
                                {
                                $varCachedData[($varDataOptionList[$i]['userRole'][$j]['userRole_RefID'])]['combinedBudget']['keyList'][] = $varDataOptionList[$i]['userRole'][$j]['combinedBudget'][$k]['recordID'];
                                $varCachedData[($varDataOptionList[$i]['userRole'][$j]['userRole_RefID'])]['combinedBudget']['dataTable'][] = 
                                    [
                                    'sys_ID' => $varDataOptionList[$i]['userRole'][$j]['combinedBudget'][$k]['recordID'],
                                    'sys_TEXT' => $varDataOptionList[$i]['userRole'][$j]['combinedBudget'][$k]['entities']['name']
                                    ];
                                }

                            //---> Cached Data Menu
                            for($k=0, $kMax=count($varDataOptionList[$i]['userRole'][$j]['menu']); $k!=$kMax; $k++)
                                {
                                $varCachedData[($varDataOptionList[$i]['userRole'][$j]['userRole_RefID'])]['menu']['keyList'][] = $varDataOptionList[$i]['userRole'][$j]['menu'][$k]['entities']['key'];
                                $varCachedData[($varDataOptionList[$i]['userRole'][$j]['userRole_RefID'])]['menu']['dataTable'][] = 
                                    [
                                    'sys_ID' => $varDataOptionList[$i]['userRole'][$j]['menu'][$k]['entities']['key'],
                                    'sys_TEXT' => $varDataOptionList[$i]['userRole'][$j]['menu'][$k]['entities']['caption']
                                    ];
                                }

                            }
                        }
                    
                    //dd($varCachedData);
                    //dd($varCachedData[$varUserRoleID]['menu']['index']);
                    //dd($varCachedData_CombinedBudget);
                    //dd($varDataOptionList);
//$varDataBranchList=333;
//$varDataUserRoleList=333;


var_dump($varUserRoleID);
var_dump($varDataUserRoleList);
                    if(\App\Helpers\ZhtHelper\General\Helper_Array::isElementExist($varUserSession, $varBranchID, $varDataBranchList) == false)
                        {
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 403, 'Branch ID was not found in the register list');
                        }
                    elseif(\App\Helpers\ZhtHelper\General\Helper_Array::isElementExist($varUserSession, $varUserRoleID, $varDataUserRoleList[$varBranchID]) == false)
                        {
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 403, 'User Role ID was not found in the register list');
                        }
                    elseif(self::isSet($varUserSession, $varAPIWebToken) == true)
                        {
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 403, 'Branch ID and User Role ID already choosen');
//dd(\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession));
//dd(\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession)['userIdentity']['workerCareerInternal_RefID']);
                        }
                        
                    if(!$varReturn)
                        {
                        //---> Mendapatkan User Privileges Menu
                        $varUserPrivilegesMenu = 
                            \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(
                                $varUserSession, 
                                \App\Helpers\ZhtHelper\General\Helper_Array::getArrayKeyRename_CamelCase(
                                    $varUserSession, 
                                    \App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationUserRolePrivilegesMenu($varUserSession, $varUserRoleID, $varBranchID)
                        //            \App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationUserRolePrivilegesMenu($varUserSession, 95000000000003, 11000000000004)
                                    )
                                );
                        //---> Update Database
                        (new \App\Models\Database\SchSysConfig\General())->setUserSessionBranchAndUserRole($varUserSession, $varUserSession, $varBranchID, $varUserRoleID);
                        //---> Update Redis
                        $varDataRedis = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode($varUserSession, (new \App\Models\Cache\General\APIWebToken())->getDataRecord($varUserSession, $varAPIWebToken));
                        $varUserIdentity = $varDataRedis['userIdentity'];
                        $varDataRedis['branch_RefID'] = $varBranchID;
//                        $varDataRedis['userRole_RefID'] = $varUserRoleID;
                        $varDataRedis['userIdentity'] = 
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserIdentity(
                                $varUserSession, 
                                \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession)['userIdentity']['LDAPUserID']
                                );
                        //$varDataRedis['userPrivilegesMenu'] = $varUserPrivilegesMenu;
                        $varDataRedis['environment']['userPrivileges']['menu'] = [
                            'keyList' => $varCachedData[$varUserRoleID]['menu']['keyList'],
                            'dataTable' => $varCachedData[$varUserRoleID]['menu']['dataTable']
                            ];
                        $varDataRedis['environment']['userPrivileges']['combinedBudget'] = [
                            'keyList' => $varCachedData[$varUserRoleID]['combinedBudget']['keyList'],
                            'dataTable' => $varCachedData[$varUserRoleID]['combinedBudget']['dataTable']
                            ];
                        //$varDataRedis['userIdentity'] = $varUserIdentity;
                        (new \App\Models\Cache\General\APIWebToken())->setDataUpdate($varUserSession, $varAPIWebToken, \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode($varUserSession, $varDataRedis));
                        //--->
                        $varDataSend = ['message' => 'Chosen Branch ID and User Role ID have been saved'];
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success($varUserSession, $varDataSend);                        
                        }
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


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isSet                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-06-24                                                                                           |
        | ▪ Description     : Mengecek apakah sudah dilakukan pengesetan UserSessionBranch dan UserRole                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varData ► Data                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private function isSet($varUserSession, string $varAPIWebToken)
            {
            $varReturn = (new \App\Models\Database\SchSysConfig\General())->isSet_UserSessionBranchAndUserRole($varUserSession, $varAPIWebToken);
            return $varReturn;
            }
        }
    }