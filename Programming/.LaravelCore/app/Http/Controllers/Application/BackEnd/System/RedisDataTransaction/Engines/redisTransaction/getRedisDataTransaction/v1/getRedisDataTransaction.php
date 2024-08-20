<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\DataPickList\Engines\project\getRedisDataTransaction\v1                       |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\RedisDataTransaction\Engines\redisTransaction\getRedisDataTransaction\v1
    {

    use Illuminate\Support\Facades\Redis;
    use Illuminate\Support\Facades\Session;

    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getRedisDataTransaction                                                                                                   |
    | ▪ Description : Menangani API dataPickList.project.getRedisDataTransaction Version 1                                                      |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getRedisDataTransaction extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-08-10                                                                                           |
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
        | ▪ Last Update     : 2021-08-10                                                                                           |
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
            //     $userSessionID = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            //     $branchID = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($userSessionID)['branchID'];

            //     $varTTL = 43200; // 12 Jam

            // // 1
            // if(Redis::get("Budget") == null){
            //     // GET DATA Transaction BUDGET 
            //     $varBudget =
            //         (new \App\Models\Database\SchData_OLTP_Project\General())->getDataPickList_Project(
            //             $userSessionID,
            //             $branchID
            //         );

            //     //SET REDIS BUDGET
    
            //     \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue(
            //         $userSessionID, 
            //         "Budget", 
            //         json_encode($varBudget['data']), 
            //         $varTTL
            //     );
            // }
                return [];
            }
        }
    }