<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Report\Engines\form\resume\supplyChain                           |
|                \getPurchaseRequisitionToPurchaseOrder\v1                                                                         |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\Report\Engines\form\resume\supplyChain\getPurchaseRequisitionToPurchaseOrder\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getPurchaseRequisitionToPurchaseOrder                                                                        |
    | ▪ Description : Menangani API report.form.resume.supplyChain.getPurchaseRequisitionToPurchaseOrder Version 1                 |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getPurchaseRequisitionToPurchaseOrder extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-07-04                                                                                           |
        | ▪ Creation date   : 2025-07-04                                                                                           |
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
        | ▪ Last Update     : 2025-07-04                                                                                           |
        | ▪ Creation date   : 2025-07-04                                                                                           |
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
                        'Get Report Form - Purchase Requisition To Purchase Order (version 1)'
                        );

                try {
                    //-----[ MAIN CODE ]----------------------------------------------------------------------------( START POINT )-----
                    try {
                        if (!($varDataSend =
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataRead(
                                $varUserSession,
                                (new \App\Models\Database\SchData_OLTP_SupplyChain\General())->getReport_Form_ResumeJSON_PurchaseRequisitonToPurchaseOrder(
                                    $varUserSession, 
                                    (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'],

                                    (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                                        $varUserSession,
                                        'combinedBudget_RefID',
                                        $varData['parameter']) ? 
                                            ((!is_null($varData['parameter']['combinedBudget_RefID'])) ? 
                                                $varData['parameter']['combinedBudget_RefID'] : 
                                                null
                                                ) : 
                                            null
                                    ),
                                    (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                                        $varUserSession,
                                        'combinedBudgetSection_RefID',
                                        $varData['parameter']) ? 
                                            ((!is_null($varData['parameter']['combinedBudgetSection_RefID'])) ?
                                                $varData['parameter']['combinedBudgetSection_RefID'] :
                                                null
                                                ) : 
                                            null
                                    ),

                                    $varData['SQLStatement']['pick'],
                                    $varData['SQLStatement']['sort'], 
                                    $varData['SQLStatement']['filter'], 
                                    $varData['SQLStatement']['paging']
                                    ),
                                FALSE
                                )
                            ))
                            {
                            throw new \Exception();
                            }

                        $varReturn =
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success(
                                $varUserSession,
                                $varDataSend
                                );
                        }

                    catch (\Exception $ex) {
                        $varErrorMessage = $ex->getMessage();
                        $varReturn =
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                                $varUserSession,
                                500,
                                'Invalid SQL Syntax'.($varErrorMessage ? ' ('.$varErrorMessage.')' : '')
                                );
                        }
                    //-----[ MAIN CODE ]------------------------------------------------------------------------------( END POINT )-----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    }

                catch (\Exception $ex) {
                    $varReturn =
                        \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                            $varUserSession,
                            401,
                            $ex->getMessage()
                            );

                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }

                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                }

            catch (\Exception $ex) {
                }

            return
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }
        }
    }