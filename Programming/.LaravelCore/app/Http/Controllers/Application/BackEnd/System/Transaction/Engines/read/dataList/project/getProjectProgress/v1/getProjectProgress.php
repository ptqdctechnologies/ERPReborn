<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\read\dataList\project\getProjectProgress    |
|                \v1                                                                                                               |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2026 wisnu (wisnu.wirayuda01@gmail.com)                                                                               |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\Transaction\Engines\read\dataList\project\getProjectProgress\v1 {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getProjectProgress                                                                                          |
    | ▪ Description : Menangani API transaction.read.dataList.project.getProjectProgress Version 1                                |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getProjectProgress extends \App\Http\Controllers\Controller
    {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-10-09                                                                                           |
        | ▪ Creation Date   : 2026-10-09                                                                                           |
        | ▪ Description     : System's Default Constructor                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function __construct()
        {
        }


        /*
       +--------------------------------------------------------------------------------------------------------------------------+
       | ▪ Method Name     : main                                                                                                 |
       +--------------------------------------------------------------------------------------------------------------------------+
       | ▪ Version         : 1.0000.0000000                                                                                       |
       | ▪ Last Update     : 2026-10-09                                                                                           |
       | ▪ Creation Date   : 2026-10-09                                                                                           |
       | ▪ Description     : Fungsi Utama Engine                                                                                  |
       +--------------------------------------------------------------------------------------------------------------------------+
       | ▪ Input Variable  :                                                                                                      |
       |      ▪ (mixed)  varUserSession ► User Session                                                                            |
       |      ▪ (array)  varData ► Data                                                                                           |
       | ▪ Output Variable :                                                                                                      |
       |      ▪ (string) varReturn                                                                                                |
       +--------------------------------------------------------------------------------------------------------------------------+
       */
        public function main($varUserSession, $varData)
        {
            $varReturn =
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader(
                    $varUserSession,
                    null,
                    __CLASS__,
                    __FUNCTION__
                );

            try {
                $varSysDataProcess =
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader(
                        $varUserSession,
                        __CLASS__,
                        __FUNCTION__,
                        'Get Project Progress Detail Data List (version 1)'
                    );

                try {
                    if (
                        !empty($varData['SQLStatement']['filter']) &&
                        \App\Helpers\ZhtHelper\Database\Helper_SQLValidation::isSecure_FilterStatement(
                            $varUserSession,
                            $varData['SQLStatement']['filter']
                        ) === false
                    ) {
                        throw new \InvalidArgumentException(
                            'SQL Injection Threat Prevention'
                        );
                    }

                    if (
                        !isset(
                        $varData['parameter']['projectProgress_RefID']
                    ) ||
                        !is_numeric(
                            $varData['parameter']['projectProgress_RefID']
                        ) ||
                        (int) $varData['parameter']['projectProgress_RefID'] <= 0
                    ) {
                        throw new \InvalidArgumentException(
                            'Invalid projectProgress_RefID'
                        );
                    }

                    $varModelResult =
                        (new \App\Models\Database\SchData_OLTP_Project\TblProjectProgress())
                            ->getDataList_ProjectProgressDetail(
                                $varUserSession,
                                (int) $varData['parameter']['projectProgress_RefID']
                            );

                    $varDataSend =
                        \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataRead(
                            $varUserSession,
                            $varModelResult,
                            false
                        );

                    if ($varDataSend === false || $varDataSend === null) {
                        throw new \RuntimeException(
                            'Failed to build ProjectProgress API response'
                        );
                    }

                    $varReturn =
                        \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success(
                            $varUserSession,
                            $varDataSend
                        );

                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus(
                        $varUserSession,
                        $varSysDataProcess,
                        'Success'
                    );

                } catch (\InvalidArgumentException $ex) {
                    $varReturn =
                        \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                            $varUserSession,
                            400,
                            $ex->getMessage()
                        );

                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus(
                        $varUserSession,
                        $varSysDataProcess,
                        'Failed, ' . $ex->getMessage()
                    );

                } catch (\Throwable $ex) {
                    $varReturn =
                        \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                            $varUserSession,
                            500,
                            'Failed to retrieve ProjectProgress data'
                        );

                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus(
                        $varUserSession,
                        $varSysDataProcess,
                        'Failed, ' . $ex->getMessage()
                    );
                }

                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter(
                    $varUserSession,
                    $varSysDataProcess
                );

            } catch (\Throwable $ex) {

            }

            return
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter(
                    $varUserSession,
                    $varReturn,
                    __CLASS__,
                    __FUNCTION__
                );
        }
    }
}

?>