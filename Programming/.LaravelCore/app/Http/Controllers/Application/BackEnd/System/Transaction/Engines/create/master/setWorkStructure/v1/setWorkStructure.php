<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Transaction\Engines\create\master\setWorkStructure\v1                 |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2026 Wisnu (wisnu.wirayuda01@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\Transaction\Engines\create\master\setWorkStructure\v1 {
    use App\Http\Controllers\Controller;
    use App\Helpers\ZhtHelper\Logger\Helper_SystemLog;
    use App\Helpers\ZhtHelper\System\BackEnd\Helper_API;
    use App\Helpers\ZhtHelper\General\Helper_SystemParameter;
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : setWorkStructure                                                                                                  |
    | ▪ Description : Menangani API transaction.create.master.setWorkStructure Version 1                                                |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class setWorkStructure extends Controller
    {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-08-04                                                                                           |
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
        | ▪ Last Update     : 2026-08-04                                                                                           |
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
            $varReturn = Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Create Work Structure Data (version 1)');
                try {
                    //-----[ MAIN CODE ]----------------------------------------------------------------------------( START POINT )-----
                    try {
                        if (
                            !($varDataSend = Helper_API::getEngineDataSend_DataCreate($varUserSession, (new \App\Models\Database\SchData_OLTP_Master\TblWorkStructure())->setDataInsert(
                                $varUserSession,
                                null,
                                null,
                                (Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'],
                                (Helper_SystemParameter::getApplicationParameter_BaseCurrencyID(
                                    $varUserSession,
                                    (Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'],
                                    'Env.System.BaseCurrency.ID'
                                )),
                                $varData['entities']['code'],
                                $varData['entities']['name']
                            )))
                        ) {
                            throw new \Exception();
                        }
                        $varReturn = Helper_API::setEngineResponseDataReturn_Success($varUserSession, $varDataSend);
                    } catch (\Exception $ex) {
                        $varErrorMessage = $ex->getMessage();
                        $varReturn = Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 500, 'Invalid SQL Syntax' . ($varErrorMessage ? ' (' . $varErrorMessage . ')' : ''));
                    }
                    //-----[ MAIN CODE ]------------------------------------------------------------------------------( END POINT )-----
                    Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                } catch (\Exception $ex) {
                    $varReturn = Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 401, $ex->getMessage());
                    Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, ' . $ex->getMessage());
                }
                Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
            } catch (\Exception $ex) {
                //throw $th;
            }
            return Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
        }
    }
}