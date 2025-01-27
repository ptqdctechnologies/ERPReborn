<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Report\Engines\form\resume\budgeting                             |
|                \getCombinedBudgetSectionSegmentedDetail\v1                                                                       |                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\Report\Engines\form\resume\budgeting\getCombinedBudgetSectionSegmentedDetail\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getCombinedBudgetSectionSegmentedDetail                                                                      |
    | ▪ Description : Menangani API report.form.resume.budgeting.getCombinedBudgetSectionSegmentedDetail Version 1                 |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getCombinedBudgetSectionSegmentedDetail extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-10-21                                                                                           |
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
        | ▪ Last Update     : 2021-10-21                                                                                           |
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
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Combined Budget Section Segmented Detail Report Form Resume (version 1)');
                try {
                    //-----[ MAIN CODE ]----------------------------------------------------------------------------( START POINT )-----
                    try{
/*
                        if(!($varDataSend = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataRead($varUserSession, 
                            $this->dataProcessing(
                                $varUserSession,
                                (new \App\Models\Database\SchData_OLTP_Budgeting\General())->getDataReportFormResume_CombinedBudgetSectionSegmentedDetail(
                                    $varUserSession, 
                                    (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'], 
                                    $varData['parameter']['combinedBudgetSection_RefID']
                                    )
                                )
                            )))*/
                            
                        if(!($varDataSend = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataRead($varUserSession, 
                            $this->dataProcessing(
                                $varUserSession,
                                (new \App\Models\Database\SchData_OLTP_Budgeting\General())->getDataReportFormResume_CombinedBudgetSectionSegmentedDetail(
                                    $varUserSession, 
                                    (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'], 
                                    $varData['parameter']['combinedBudgetSection_RefID']
                                    )
                                )
                            )))
                            {
                            throw new \Exception();
                            }
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success($varUserSession, $varDataSend);
                        } 
                    catch (\Exception $ex) {
                        $varErrorMessage = $ex->getMessage();
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 500, 'Invalid SQL Syntax'.($varErrorMessage ? ' ('.$varErrorMessage.')' : ''));
                        }
                    //-----[ MAIN CODE ]------------------------------------------------------------------------------( END POINT )-----
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


        private function dataProcessing($varUserSession, array $varDataList = null)
            {           
            $varReturn = $this->getNestedData($varUserSession, 0, $varDataList);
            //$varReturn = $varDataList;
            return $varReturn;
            }

            
        private function getNestedData($varUserSession, int $varIndexPosition = 0, array $varDataList = null)
            {
            $varReturn = null;
            $varContent = [];
            $j = 0;
            for ($i = $varIndexPosition; $i!=(count($varDataList)); $i++)
                {
                //---> SameLevel
                if ($varDataList[$varIndexPosition]['Level'] == $varDataList[$i]['Level'])
                    {
                    $varReturn[$j] = [
                        'CombinedBudgetSubSectionLevel1_RefID' => $varDataList[$i]['CombinedBudgetSubSectionLevel1_RefID'],
                        'CombinedBudgetSubSectionLevel2_RefID' => $varDataList[$i]['CombinedBudgetSubSectionLevel2_RefID'],
                        'Level' => $varDataList[$i]['Level'],
                        'Description' => $varDataList[$i]['Description'],
                        'Quantity' => $varDataList[$i]['Quantity'],
                        'UnitPriceBaseCurrencyValue' => $varDataList[$i]['UnitPriceBaseCurrencyValue'],
                        'PriceBaseCurrencyValue' => $varDataList[$i]['PriceBaseCurrencyValue'],
                        'Contents' => null
                        ];
                    //---> SubLevel
                    if (($i < (count($varDataList)-1)) AND ($varDataList[$i]['Level'] == $varDataList[$i+1]['Level'] - 1))
                        {
                        $varReturn[$j]['Contents'] = $this->getNestedData($varUserSession, $i+1, $varDataList);
                        }
                    $j++;
                    }
                elseif ($varDataList[$varIndexPosition]['Level'] > $varDataList[$i]['Level'])
                    {
                    break;
                    }

                }
            return $varReturn;
            }
 
        }
    }

?>