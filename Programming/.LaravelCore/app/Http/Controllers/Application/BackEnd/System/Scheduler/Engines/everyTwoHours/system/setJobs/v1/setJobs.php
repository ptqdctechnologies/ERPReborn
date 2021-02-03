<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Scheduler\Engines\everyTwoHours\system\setJobs\v1                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\Scheduler\Engines\everyTwoHours\system\setJobs\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : setJobs                                                                                                      |
    | ▪ Description : Menangani API scheduler.everyTwoHours.system.setJobs Version 1                                               |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class setJobs extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | Class Properties                                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private $varAPIIdentity;
        private $varShedule;


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-01-26                                                                                           |
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
            $this->varAPIIdentity = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getAPIIdentityFromClassFullName(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), __CLASS__);
            $this->varSheduleIdentity = ((explode('.', ($this->varAPIIdentity)['Key']))[1]);

            $varFilePath = '/zhtConf/log/lastSession/scheduledTask/'.$this->varSheduleIdentity.'/core.log';
            shell_exec("touch ".$varFilePath);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : main                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-01-26                                                                                           |
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
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Create Blood Aglutinogen Type Data (version 1)');
                try {
                    //---- ( MAIN CODE ) ------------------------------------------------------------------------- [ START POINT ] -----
                    try {
                        } 
                    catch (\Exception $ex) {
                        $varErrorMessage = $ex->getMessage();
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 500, 'Data Retrieval Failed'.($varErrorMessage ? ' ('.$varErrorMessage.')' : ''));
                        }
                    //---- ( MAIN CODE ) --------------------------------------------------------------------------- [ END POINT ] -----
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


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : loadAllJobs                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-01-26                                                                                           |
        | ▪ Description     : loadAllJobs                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function loadAllJobs(int $varUserSession)
            {
            $varReturn = true;
            
            $varAPIWebToken = (new \App\Models\Database\SchSysConfig\General())->getAPIWebToken_SysEngine($varUserSession);

            /*
            ..... Call all functions will be loaded .....
            */

            //---> API Call : Exchange Rate
            $varFilePath = '/zhtConf/log/lastSession/scheduledTask/'.$this->varSheduleIdentity.'/jobs/transaction.synchronize.master.setCurrencyExchangeRateTax';
            shell_exec("touch ".$varFilePath);
            $varData = \App\Helpers\ZhtHelper\System\BackEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.synchronize.master.setCurrencyExchangeRateTax', 
                'latest', 
                [
                ]
                );
           
            //---> API Call : Person Access Device Log
            $varFilePath = '/zhtConf/log/lastSession/scheduledTask/'.$this->varSheduleIdentity.'/jobs/transaction.synchronize.sysConfig.setLog_Device_PersonAccess';
            shell_exec("touch ".$varFilePath);
            $varData = \App\Helpers\ZhtHelper\System\BackEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.synchronize.sysConfig.setLog_Device_PersonAccess', 
                'latest', 
                [
                ]
                );

            return $varReturn;
            }

/*
        private function getTaxExchangeRate(int $varUserSession)
            {
            $varAPIWebToken = (new \App\Models\Database\SchSysConfig\General())->getAPIWebToken_SysEngine($varUserSession);

            $varCurrentDate = (new \App\Models\Database\SchSysConfig\General())->getCurrentDateTimeTZ($varUserSession);
//            $varCurrentDate = substr((new \App\Models\Database\SchSysConfig\General())->getCurrentDateTimeTZ($varUserSession), 0, 10).' 00:00:00';
//            $varCurrentDate = '2017-01-01';
//            $varCurrentDate = '2011-01-01';
//            $varCurrentDate = '2021-01-01';
            $varCurrentDate = '2013-01-02 00:00:00 +07';
            $varCurrentDate = '2019-12-25 00:00:00 +07';
            $varCurrentDate = '2021-02-03 00:00:00 +07';
 //           echo $varCurrentDate;
 //           echo "\n\n";
            

            $varCurrenDateTimeTZUnixTime = \App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varCurrentDate);
            //echo date("Y-m-d H:i:s +07", $varCurrenDateTimeTZUnixTime);
            //echo "\n";

//            for($i=0; $i!=(7*52); $i++)
            for($i=0; $i!=(4); $i++)
                {
                echo date("Y-m-d H:i:s +07", $varCurrenDateTimeTZUnixTime);
                $varCurrentDate = date("Y-m-d H:i:s +07", $varCurrenDateTimeTZUnixTime);
                echo "\n";
//                echo '
//
//                    ';                

                try
                    {
                    $varData = \App\Helpers\ZhtHelper\System\BackEnd\Helper_APICall::setCallAPIGateway(
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                        $varAPIWebToken, 
                        'instruction.server.externalServer.webSiteScraper.fiskal_kemenkeu_go_id.getDataExhangeRate',
                        'latest', 
                        [
                        'entities' => [
                            'date' => substr($varCurrentDate, 0, 10)
                            ]
                        ]
                        );
//                    var_dump($varData);
                    

                    $varKMKNumber = $varData['data']['KMK']['number'];
                    $varValidStartDateTimeTZ = $varData['data']['KMK']['startDateTimeTZ'];
                    $varValidFinishDateTimeTZ = $varData['data']['KMK']['finishDateTimeTZ'];

                    foreach($varData['data']['exchangeRate'] as $varISOCode => $varExchangeRate) {
                        (new \App\Models\Database\SchData_OLTP_Master\TblCurrencyExchangeRateTax())->setDataImport($varUserSession, substr($varCurrentDate, 0, 10), $varISOCode, $varExchangeRate, $varValidStartDateTimeTZ, $varValidFinishDateTimeTZ, $varKMKNumber);
                        }

                    } 
                catch (\Exception $ex) {

                    }




                $varCurrenDateTimeTZUnixTime+=(7*24*60*60);
                }
            
/*            
            try
                {
                $varData = \App\Helpers\ZhtHelper\System\BackEnd\Helper_APICall::setCallAPIGateway(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken, 
                    'instruction.server.externalServer.webSiteScraper.fiskal_kemenkeu_go_id.getDataExhangeRate',
                    'latest', 
                    [
                    'entities' => [
                        'date' => $varCurrentDate
                        ]
                    ]
                    );
                
                $varKMKNumber = $varData['data']['KMK']['number'];
                $varValidStartDateTimeTZ = $varData['data']['KMK']['startDateTimeTZ'];
                $varValidFinishDateTimeTZ = $varData['data']['KMK']['finishDateTimeTZ'];
                
                foreach($varData['data']['exchangeRate'] as $varISOCode => $varExchangeRate) {
                    (new \App\Models\Database\SchData_OLTP_Master\TblCurrencyExchangeRateTax())->setDataImport($varUserSession, $varCurrentDate, $varISOCode, $varExchangeRate, $varValidStartDateTimeTZ, $varValidFinishDateTimeTZ, $varKMKNumber);
                    }
                
                } 
            catch (\Exception $ex) {

                }
            

//            (new \App\Models\Database\SchData_OLTP_Master\TblCurrencyExchangeRateTax())->setDataImport($varUserSession, 'USD', $varCurrentDate, $varExchangeRate);
            }
*/
        }
    }