<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\DataPickList\Engines\project\getRedisDataMaster\v1                       |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\RedisDataMaster\Engines\redisMaster\getRedisDataMaster\v1
    {

    use Illuminate\Support\Facades\Redis;
    use Illuminate\Support\Facades\Session;

    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getRedisDataMaster                                                                                                   |
    | ▪ Description : Menangani API dataPickList.project.getRedisDataMaster Version 1                                                      |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getRedisDataMaster extends \App\Http\Controllers\Controller
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
                $userSessionID = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                $branchID = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($userSessionID)['branchID'];

                $varTTL = 43200; // 12 Jam

            // 1
                // GET DATA MASTER PROJECT
                $varProject =
                    (new \App\Models\Database\SchData_OLTP_Project\General())->getDataPickList_Project(
                        $userSessionID,
                        $branchID
                    );

                //SET REDIS PROJECT
    
                \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue(
                    $userSessionID, 
                    "Project", 
                    json_encode($varProject['Data']), 
                    $varTTL
                );

            // 2

                // DATA MASTER WORKER

                $varWorker =
                    (new \App\Models\Database\SchData_OLTP_HumanResource\General())->getDataPickList_WorkerJobsPositionCurrent(
                        $userSessionID,
                        $branchID
                    );

                //SET REDIS WORKER

                \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue(
                    $userSessionID, 
                    "Worker", 
                    json_encode($varWorker['Data']), 
                    $varTTL
                );

            // 3
                // DATA MASTER PRODUCT

                $varProduct =
                    (new \App\Models\Database\SchData_OLTP_Master\General())->getDataList_Product(
                        $userSessionID,
                        $branchID
                    );

                //SET REDIS PRODUCT

                \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue(
                    $userSessionID, 
                    "Product", 
                    json_encode($varProduct), 
                    $varTTL
                );
            
            // 4
                // DATA MASTER DOCUMENT TYPE

                $varDocumentType =
                    (new \App\Models\Database\SchData_OLTP_Master\General())->getDataList_BusinessDocumentType(
                        $userSessionID,
                        $branchID
                    );

                //SET REDIS DOCUMENT TYPE

                \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue(
                    $userSessionID, 
                    "DocumentType", 
                    json_encode($varDocumentType), 
                    $varTTL
                );

                return [];
            }
        }
    }