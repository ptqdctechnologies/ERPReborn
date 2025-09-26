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
    use Illuminate\Support\Facades\Redis;

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
                $varSysDataProcess =
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__,
                        'Get Login Branch And User Role (version 1)'
                        );

                try {
                    //-----[ MAIN CODE ]----------------------------------------------------------------------------( START POINT )-----
                        //---> Initializing : varAPIWebToken
                            if (
                                \App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                                    $varUserSession,
                                    'APIWebToken',
                                    $varData
                                    ) == TRUE
                                ) {
                                $varAPIWebToken =
                                    $varData['APIWebToken'];
                                }
                            else
                                {
                                $varAPIWebToken =
                                    \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken(
                                        $varUserSession
                                        )['APIWebToken'];                                
                                }
                            //dd($varAPIWebToken);

                        //---> Check Web Token is Exist
                        if (
                            \App\Helpers\ZhtHelper\Cache\Helper_Redis::isExist(
                                $varUserSession,
                                'ERPReborn::APIWebToken::'.$varAPIWebToken
                                ) == FALSE
                            ) {
                            $varReturn =
                                \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                                    $varUserSession,
                                    403,
                                    'API Web Token is not exist'
                                    );
                            }
                        //---> Check Web Token has Expired
                        elseif (
                            \App\Helpers\ZhtHelper\Cache\Helper_Redis::isExpired(
                                $varUserSession,
                                'ERPReborn::APIWebToken::'.$varAPIWebToken
                                ) == TRUE
                            ) {
                            $varReturn =
                                \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                                    $varUserSession,
                                    403,
                                    'API Web Token has expired'
                                    );
                            }
                        //---> Web Token is valid
                        else {
//                        if (1 == 1) {
                            //---> Initializing : varRedisData
                                $varRedisData = 
                                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                                        $varUserSession,
                                        \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                                            $varUserSession,
                                            'ERPReborn::APIWebToken::'.$varAPIWebToken
                                            )
                                        );

                            if (
//                                (1 == 2)
                                ($varRedisData['userRole_RefID'] != null) AND ($varRedisData['branch_RefID'] != null)                                    
                                ) {
                                $varReturn =
                                    \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                                        $varUserSession,
                                        403,
                                        'Branch ID and User Role ID already choosen'
                                        );
                                }
                            else
                                {
                                //---> Initializing : varBranchID
                                    $varBranchID =
                                        $varData['branchID'];
                                    //dd($varBranchID);

                                //---> Initializing : varUserID
                                    $varUserID =
                                        \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken(
                                            $varUserSession,
                                            $varAPIWebToken
                                            )['userID'];
                                    //dd($varUserID);

                                //---> Initializing : varUserRoleID
                                    $varUserRoleID =
                                        $varData['userRoleID'];
                                    //dd($varUserRoleID);

                                //---> Initializing : varDataUserAccessPrivileges
                                    $varDataUserAccessPrivileges =
                                         \App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationUserPrivileges(
                                            $varUserSession,
                                            $varUserID
                                            );

                                    $varDataUserAccessPrivileges = [
                                        'branch' => [
                                            'IDList   ' => $varDataUserAccessPrivileges['branchIDList']
                                            ],
                                        'userRole' => [
                                            'IDList' => $varDataUserAccessPrivileges['userRoleIDList'],
                                            'nameList' => $varDataUserAccessPrivileges['userRoleNameList']
                                            ],
                                        'combinedBudget' => [
                                            'IDList' => $varDataUserAccessPrivileges['combinedBudgetIDList'],
                                            'codeList' => $varDataUserAccessPrivileges['combinedBudgetCodeList'],
                                            'nameList' => $varDataUserAccessPrivileges['combinedBudgetNameList'],
                                            'fullNameList' => $varDataUserAccessPrivileges['combinedBudgetFullNameList']
                                            ],
                                        'menu' => [
                                            'IDList' => $varDataUserAccessPrivileges['menuIDList'],
                                            'keyList' => $varDataUserAccessPrivileges['menuKeyList'],
                                            'captionList' => $varDataUserAccessPrivileges['menuCaptionList'],
                                            'fullCaptionList' => $varDataUserAccessPrivileges['menuFullCaptionList'],
                                            ],
                                        'menuAction' => [
                                            'IDList' => $varDataUserAccessPrivileges['menuActionIDList'],
                                            'keyList' => $varDataUserAccessPrivileges['menuKeyList'],
                                            'captionList' => $varDataUserAccessPrivileges['menuCaptionList'],
                                            'fullCaptionList' => $varDataUserAccessPrivileges['menuActionFullCaptionList'],
                                            ]
                                        ];
                                    //dd($varDataUserAccessPrivileges);

                                //---> Reinitializing : Redis
                                    $varRedisData['userRole_RefID'] =
                                        $varUserRoleID;

                                    $varRedisData['branch_RefID'] =
                                        $varBranchID;

                                    $varRedisData['userAccessPrivileges'] =
                                        $varDataUserAccessPrivileges;

                                    //dd($varRedisData);

                                    \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValueRenewal(
                                        $varUserSession,
                                        'ERPReborn::APIWebToken::'.$varAPIWebToken,
                                        \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(
                                            $varUserSession,
                                            $varRedisData
                                            )
                                        );

                                //---> Update Database
                                    (new \App\Models\Database\SchSysConfig\General())->setUserSessionBranchAndUserRole(
                                        $varUserSession,
                                        $varUserSession,
                                        $varBranchID,
                                        $varUserRoleID
                                        );

//                                $x = \App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationUserSession_AllData($varUserSession);
//                                dd($x);

/*
                            if (self::isSet($varUserSession, $varAPIWebToken) == true) {
                                $varReturn =
                                    \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                                        $varUserSession,
                                        403,
                                        'Branch ID and User Role ID already choosen'
                                        );
                                //dd(\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession));
                                //dd(\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession)['userIdentities']['workerCareerInternal_RefID']);
                                }


                            dd($varUserRoleID);
*/




                                $varDataSend = ['message' => 'Chosen Branch ID and User Role ID have been saved'];
                                
                                $varReturn =
                                    \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success(
                                        $varUserSession,
                                        $varDataSend
                                        );
                                }
                            }

                    //-----[ MAIN CODE ]------------------------------------------------------------------------------( END POINT )-----

                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');    
                    }

                catch (\Exception $ex) {
                    }

                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                }

            catch (\Exception $ex) {
                }

            return
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            

        function mainOLD($varUserSession, $varData)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);

            try {
                $varSysDataProcess =
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__,
                        'Get Login Branch And User Role (version 1)'
                        );

                /*
                try {
                    //-----[ MAIN CODE ]----------------------------------------------------------------------------( START POINT )-----
                    $varAPIWebToken =
                        \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession)['APIWebToken'];

                    $varBranchID =
                        $varData['branchID'];

                    $varUserID =
                        \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession)['userID'];

                    $varUserRoleID =
                        $varData['userRoleID'];

                    if (Redis::get("RedisSetMenu" . $varUserRoleID) == null) {
                                            
                        //SET REDIS MENU

                        \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue(
                            $varUserSession,
                            "RedisSetMenu" . $varUserRoleID,
                            true
                        );

                        $varMenu =
                            (new \App\Models\Database\SchSysConfig\General())->getUserPrivilege_MenuLayout(
                                $varUserSession,
                                $varBranchID,
                                $varUserID
                            );

                        \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue(
                            $varUserSession,
                            "RedisGetMenu" . $varUserID,
                            json_encode($varMenu)
                        );
                    }

                    
                    (new \App\Models\Database\SchSysConfig\General())->setUserSessionBranchAndUserRole($varUserSession, $varUserSession, $varBranchID, $varUserRoleID);
                    //---> Update Redis
                    $varDataRedis = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode($varUserSession, (new \App\Models\Cache\General\APIWebToken())->getDataRecord($varUserSession, $varAPIWebToken));
                    // $varUserIdentity = $varDataRedis['userIdentities'];
                    $varDataRedis['branch_RefID'] = $varBranchID;

                    (new \App\Models\Cache\General\APIWebToken())->setDataUpdate($varUserSession, $varAPIWebToken, \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode($varUserSession, $varDataRedis));
                    //--->
                    $varDataSend = ['message' => 'Chosen Branch ID and User Role ID have been saved'];

                    $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success($varUserSession, $varDataSend);

                    //-----[ MAIN CODE ]------------------------------------------------------------------------------( END POINT )-----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                }
                */

                try {
                    //-----[ MAIN CODE ]----------------------------------------------------------------------------( START POINT )-----
                    $varAPIWebToken =
                        \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken(
                            $varUserSession
                            )['APIWebToken'];

                    $varBranchID =
                        $varData['branchID'];

                    $varUserID =
                        \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken(
                            $varUserSession
                            )['userID'];

                    $varUserRoleID =
                        $varData['userRoleID'];


                //     //                   $varTemp = (new \App\Models\Database\SchSysConfig\General())->setUserSessionLogout($varUserSession, $varUserSession);        
                //     //                  $varTemp = (new \App\Models\Cache\General\APIWebToken())->setDataDelete($varUserSession, (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['APIWebToken']);                   
                //     //                    $varDataSend = ['message' => 'User Logout Successfully'];
                //     //                  $varDataSend = ['message' => $varData];
                //     //                $varDataSend = ['message' => $varAPIWebToken];

                //     //--->
                //     //dd((new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession())->getDataRecord($varUserSession, $varUserSession)[0]['OptionsList']);
                //     //$varDataOptionList = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode($varUserSession, (new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession())->getDataRecord($varUserSession, $varUserSession)[0]['OptionsList']);
                //     //dd($varDataOptionList);
                     
                    $varDataOptionList =
                        $this->getUserPrivilegeMenuAccess(
                            $varUserSession,
                            $varUserID,
                            $varBranchID,
                            $varUserRoleID
                        );
                    //dd($varDataOptionList);

                    if ($varDataOptionList == null) {
                        $varReturn =
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                                $varUserSession,
                                403,
                                'User Role ID mismatch'
                                );
                        }
                    else {
                        $varCachedData = [];
                        for ($i = 0; $i != count($varDataOptionList); $i++) {
                            $varDataBranchList[$i] = $varDataOptionList[$i]['branch_RefID'];

                            for ($j = 0, $jMax = count($varDataOptionList[$i]['userRole']); $j != $jMax; $j++) {
                                $varDataUserRoleList[$varDataOptionList[$i]['branch_RefID']][$j] = $varDataOptionList[$i]['userRole'][$j]['userRole_RefID'];

                                //---> Cached Data Combined Budget
                                for ($k = 0, $kMax = count($varDataOptionList[$i]['userRole'][$j]['combinedBudget']); $k != $kMax; $k++) {
                                    $varCachedData[$varDataBranchList[$i]][($varDataOptionList[$i]['userRole'][$j]['userRole_RefID'])]['combinedBudget']['keyList'][] = $varDataOptionList[$i]['userRole'][$j]['combinedBudget'][$k]['recordID'];
                                    $varCachedData[$varDataBranchList[$i]][($varDataOptionList[$i]['userRole'][$j]['userRole_RefID'])]['combinedBudget']['dataTable'][] =
                                        [
                                            'sys_ID' => $varDataOptionList[$i]['userRole'][$j]['combinedBudget'][$k]['recordID'],
                                            'sys_TEXT' => $varDataOptionList[$i]['userRole'][$j]['combinedBudget'][$k]['entities']['name']
                                        ];
                                    }

                                 //---> Cached Data Menu
                                for ($k = 0, $kMax = count($varDataOptionList[$i]['userRole'][$j]['menu']); $k != $kMax; $k++) {
                                    $varCachedData[$varDataBranchList[$i]][($varDataOptionList[$i]['userRole'][$j]['userRole_RefID'])]['menu']['keyList'][] = $varDataOptionList[$i]['userRole'][$j]['menu'][$k]['entities']['key'];
                                    $varCachedData[$varDataBranchList[$i]][($varDataOptionList[$i]['userRole'][$j]['userRole_RefID'])]['menu']['dataTable'][] =
                                        [
                                        'sys_ID' => $varDataOptionList[$i]['userRole'][$j]['menu'][$k]['entities']['key'],
                                        'sys_TEXT' => $varDataOptionList[$i]['userRole'][$j]['menu'][$k]['entities']['caption']
                                        ];
                                    }
                                }
                            }
                //         //dd($varCachedData);
                //         //dd($varCachedData[$varUserRoleID]['menu']['index']);
                //         //dd($varCachedData_CombinedBudget);
                //         //dd($varDataOptionList);
                //         //$varDataBranchList=333;
                //         //$varDataUserRoleList=333;


                         //var_dump($varUserRoleID);
                         //var_dump($varDataUserRoleList);
                        if (\App\Helpers\ZhtHelper\General\Helper_Array::isElementExist(
                            $varUserSession,
                            $varBranchID,
                            $varDataBranchList
                            ) == false) {
                            $varReturn =
                                \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                                    $varUserSession,
                                    403,
                                    'Branch ID was not found in the register list'
                                    );
                            }
                        elseif (\App\Helpers\ZhtHelper\General\Helper_Array::isElementExist(
                            $varUserSession,
                            $varUserRoleID,
                            $varDataUserRoleList[$varBranchID]) == false
                            ) {
                            $varReturn =
                                \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                                    $varUserSession,
                                    403,
                                    'User Role ID was not found in the register list'
                                    );
                            }
                        elseif (self::isSet($varUserSession, $varAPIWebToken) == true) {
                            $varReturn =
                                \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                                    $varUserSession,
                                    403,
                                    'Branch ID and User Role ID already choosen'
                                    );
                            //dd(\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession));
                            //dd(\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession)['userIdentities']['workerCareerInternal_RefID']);
                            }

                         if (!$varReturn) {
                            //---> Mendapatkan User Privileges Menu
                             // $varUserPrivilegesMenu =
                             //     \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(
                             //         $varUserSession,
                             //         \App\Helpers\ZhtHelper\General\Helper_Array::getArrayKeyRename_CamelCase(
                             //             $varUserSession,
                             //             \App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationUserRolePrivilegesMenu($varUserSession, $varUserRoleID, $varBranchID)
                             //             //            \App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationUserRolePrivilegesMenu($varUserSession, 95000000000003, 11000000000004)
                             //         )
                             //     );

                            //---> Update Database
                            (new \App\Models\Database\SchSysConfig\General())->setUserSessionBranchAndUserRole(
                                $varUserSession,
                                $varUserSession,
                                $varBranchID,
                                $varUserRoleID
                                );

                            //---> Update Redis
                            $varDataRedis =
                                \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                                    $varUserSession,
                                    (new \App\Models\Cache\General\APIWebToken())->getDataRecord(
                                        $varUserSession,
                                        $varAPIWebToken
                                        )
                                    );
                            
                            // $varUserIdentity = $varDataRedis['userIdentities'];
                            $varDataRedis['branch_RefID'] = $varBranchID;

                             //                        $varDataRedis['userRole_RefID'] = $varUserRoleID;
                             // $varDataRedis['userIdentities'] =
                             //     \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserIdentity(
                             //         $varUserSession,
                             //         \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession)['userIdentities']['LDAPUserID']
                             //     );
                             //$varDataRedis['userPrivilegesMenu'] = $varUserPrivilegesMenu;
                             // $varDataRedis['environment']['userPrivileges']['menu'] = [
                             //     'keyList' => $varCachedData[$varBranchID][$varUserRoleID]['menu']['keyList'],
                             //     'dataTable' => $varCachedData[$varBranchID][$varUserRoleID]['menu']['dataTable']
                             // ];
                             // $varDataRedis['environment']['userPrivileges']['combinedBudget'] = [
                             //     'keyList' => $varCachedData[$varBranchID][$varUserRoleID]['combinedBudget']['keyList'],
                             //     'dataTable' => $varCachedData[$varBranchID][$varUserRoleID]['combinedBudget']['dataTable']
                             // ];
                             //$varDataRedis['userIdentities'] = $varUserIdentity;

                            (new \App\Models\Cache\General\APIWebToken())->setDataUpdate(
                                $varUserSession,
                                $varAPIWebToken,
                                \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(
                                    $varUserSession,
                                    $varDataRedis
                                    )
                                );
                            
                            //--->
                            $varDataSend = ['message' => 'Chosen Branch ID and User Role ID have been saved'];

                //             //REDIS KEY MENU LIST

                //             // \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue(
                //             //     \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                //             //     "RedisGetMenu".$varDataRedis['userIdentities']['workerCareerInternal_RefID'], 
                //             //     json_encode($varDataRedis['environment']['userPrivileges']['menu']['keyList'])
                //             // );


                            $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success($varUserSession, $varDataSend);
                            }
                        }
                    //-----[ MAIN CODE ]------------------------------------------------------------------------------( END POINT )-----

                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    }

                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, ' . $ex->getMessage());
                    }

                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                }

            catch (\Exception $ex) {
                }

            return
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
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
            $varReturn = 
                (new \App\Models\Database\SchSysConfig\General())->isSet_UserSessionBranchAndUserRole(
                    $varUserSession,
                    $varAPIWebToken
                    );
            
            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getUserPrivilegeMenuAccess                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-08-03                                                                                           |
        | ▪ Creation Date   : 2023-08-03                                                                                           |
        | ▪ Description     : Mendapatkan Akses Menu berdasarkan User Privilege                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varData ► Data                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private function getUserPrivilegeMenuAccess($varUserSession, int $varUserID, int $varBranchID, int $varUserRoleID = null)
            {
            $varData =
                (new \App\Models\Database\SchSysConfig\General())->getUserRolePrivilegeMenuAndBudget(
                    $varUserSession,
                    $varUserID,
                    $varBranchID,
                    $varUserRoleID
                    );
            
            if (is_null($varData)) {
                $varReturn = NULL;
                }
            else {
                for ($i = 0, $iMax = count($varData); $i != $iMax; $i++) {
                    $varReturn[$i]['branch_RefID'] = $varData[$i]['branch_RefID'];
                    $varReturn[$i]['branchName'] = $varData[$i]['branchName'];
                    for ($j = 0, $jMax = count($varData[$i]['userRole']); $j != $jMax; $j++) {
                        $varReturn[$i]['userRole'][$j]['userRole_RefID'] = $varData[$i]['userRole'][$j]['userRole_RefID'];
                        $varReturn[$i]['userRole'][$j]['userRoleName'] = $varData[$i]['userRole'][$j]['userRoleName'];
                        $varReturn[$i]['userRole'][$j]['userRoleStatus'] = $varData[$i]['userRole'][$j]['userRoleStatus'];
                        for ($k = 0, $kMax = count($varData[$i]['userRole'][$j]['combinedBudget']); $k != $kMax; $k++) {
                            $varReturn[$i]['userRole'][$j]['combinedBudget'][$k]['recordID'] = $varData[$i]['userRole'][$j]['combinedBudget'][$k]['combinedBudget_RefID'];
                            $varReturn[$i]['userRole'][$j]['combinedBudget'][$k]['entities']['name'] = $varData[$i]['userRole'][$j]['combinedBudget'][$k]['combinedBudgetFullName'];
                            //dd($varReturn[$i]['userRole'][$j]['combinedBudget'][$k]);
                            }
                        for ($k = 0, $kMax = count($varData[$i]['userRole'][$j]['menu']); $k != $kMax; $k++) {
                            $varReturn[$i]['userRole'][$j]['menu'][$k]['recordID'] = $varData[$i]['userRole'][$j]['menu'][$k]['menu_RefID'];
                            $varReturn[$i]['userRole'][$j]['menu'][$k]['entities']['key'] = $varData[$i]['userRole'][$j]['menu'][$k]['menuKey'];
                            $varReturn[$i]['userRole'][$j]['menu'][$k]['entities']['caption'] = $varData[$i]['userRole'][$j]['menu'][$k]['menuCaption'];
                            //dd($varReturn[$i]['userRole'][$j]['menu'][$k]);
                            }
                        }
                    }
                }

            return
                $varReturn;
            }
        }
    }
