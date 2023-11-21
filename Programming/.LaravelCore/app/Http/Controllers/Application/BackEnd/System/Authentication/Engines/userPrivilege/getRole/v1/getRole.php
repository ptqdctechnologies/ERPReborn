<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Authentication\Engines\userPrivilege\getRole\v1                  |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\Authentication\Engines\userPrivilege\getRole\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getRole                                                                                                      |
    | ▪ Description : Menangani API authentication.userPrivilege.getRole Version 1                                                 |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getRole extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-07-31                                                                                           |
        | ▪ Creation Date   : 2023-07-31                                                                                           |
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
        | ▪ Last Update     : 2023-07-31                                                                                           |
        | ▪ Creation Date   : 2023-07-31                                                                                           |
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

                $user_RefID = $varData['parameter']['user_RefID'];
                $branch_RefID = $varData['parameter']['branch_RefID'];

                $varTTL = 60; // 60 Detik

            // 1
                //DATA BRANCH

                $varBranch =
                    (new \App\Models\Database\SchSysConfig\General())->getUserPrivilege_InstitutionBranch(
                        $varUserSession,
                        $user_RefID
                    );

                //SET REDIS BRANCH
    
                \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue(
                    $varUserSession, 
                    "Branch", 
                    json_encode($varBranch), 
                    $varTTL
                );

            // 2
                //GET REDIS BRANCH

                $varDataBranch = json_decode(\App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                    "Branch"
                    ),
                    true
                );

                //DATA ROLE

                if(count($varDataBranch) > 1)
                {
                    $varRole =
                    (new \App\Models\Database\SchSysConfig\General())->getDataList_UserRole(
                        $varUserSession,
                        $user_RefID,
                        null
                    );

                    $compactRole = [
                        'CountBranch' => count($varDataBranch),
                        'Data' => $varRole
                    ];
                }
                else{
                    $varRole =
                    (new \App\Models\Database\SchSysConfig\General())->getUserPrivilege_Role(
                        $varUserSession,
                        $user_RefID,
                        $varDataBranch[0]['Sys_ID'],
                        null,
                    );

                    $compactRole = [
                        'CountBranch' => count($varDataBranch),
                        'Data' => $varRole
                    ];
                }

                // //SET REDIS ROLE
    
                \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue(
                    $varUserSession, 
                    "Role", 
                    json_encode($compactRole), 
                    $varTTL
                );
                return [];

            }
        }
    }

?>